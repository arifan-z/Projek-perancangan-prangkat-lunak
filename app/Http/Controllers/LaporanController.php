<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Tempat;
use App\Models\Fakultas;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $laporanBaru = Laporan::where('status', 'menunggu')->count();
        $laporanDiproses = Laporan::where('status', 'diproses')->count();
        $laporanSelesai = Laporan::where('status', 'selesai')->count();
        $totalLaporan = Laporan::count();

        $filter   = $request->get('filter', 'semua');
        $kategori = $request->get('kategori');
        $sort     = $request->get('sort', 'desc'); // default urutan terbaru

        $fakultasList = Fakultas::all();
        $prodiList    = Prodi::all();
        $tempatList   = Tempat::all();

        // ===== ROLE BASED VISIBILITY =====
        if (in_array($user->role, ['admin', 'staf', 'user'])) {
            //bisa lihat SEMUA laporan
            $query = Laporan::query();
        }
        // ===== FILTERING =====
        if ($filter === 'milik-anda') {
            $query->where('user_id', $user->id);
        }

        if ($kategori) {
            $query->where('nama_fakultas', $kategori);
        }

        // ===== SORTING =====
        if ($sort === 'asc') {
            $query->orderBy('tanggal_lapor', 'asc');
        } else {
            $query->orderBy('tanggal_lapor', 'desc');
        }

        $laporans = $query->get();

        return view("{$user->role}.laporan", compact(
            'laporans',
            'fakultasList',
            'prodiList',
            'tempatList',
            'user',
            'filter',
            'kategori',
            'sort',
            'laporanBaru',
            'laporanDiproses',
            'laporanSelesai',
            'totalLaporan'
        ));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->role === 'staf') {
            abort(403, 'Staf tidak diizinkan menambah laporan.');
        }

        $request->validate([
            'judul'         => 'required|string|max:255',
            'isi'           => 'required|string',
            'gambar'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nama_fakultas' => 'required|string',
            'nama_prodi'    => 'nullable|string',
            'nama_lokasi'   => 'nullable|string',
        ]);

        $data = $request->only([
            'judul',
            'isi',
            'nama_fakultas',
            'nama_prodi',
            'nama_lokasi'
        ]);
        $data['user_id'] = $user->id;
        $data['status'] = 'menunggu';
        $data['tanggal_lapor'] = now();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/laporan'), $fileName);
            $data['gambar'] = $fileName;
        }


        Laporan::create($data);

        return redirect()->route("{$user->role}.laporan.index")->with('success', 'Laporan berhasil ditambahkan.');
    }

    public function show($id, Request $request)
    {
        $laporan = Laporan::with('user:id,name')->findOrFail($id);
        $user = Auth::user();

        // Cegah user lain melihat laporan bukan miliknya
        // if ($user->role === 'user' && $laporan->user_id !== $user->id) {
        //     abort(403, 'Anda tidak berhak melihat laporan ini.');
        // }

        // ============================
        // 👁️ TAMBAH VIEW COUNT
        // ============================
        $laporan->increment('view_count');
        // Tambahkan URL gambar
        $laporan->gambar_url = $laporan->gambar
            ? asset('uploads/laporan/' . $laporan->gambar)
            : null;

        // Selalu kirim dalam bentuk JSON untuk popup
        return response()->json($laporan);
    }

    public function update(Request $request, $id)
    {
        \Log::info("MASUK CONTROLLER UPDATE LAPORAN, ID = $id");

        $laporan = Laporan::findOrFail($id);
        $user = Auth::user();

        // =====================
        // 1. ADMIN → BEBAS EDIT
        // =====================
        if ($user->role === 'admin') {
            \Log::info("ROLE = ADMIN, BEBAS EDIT");

            $request->validate([
                'judul'         => 'nullable|string|max:255',
                'isi'           => 'nullable|string',
                'status'        => 'nullable|in:menunggu,diproses,selesai,arsip',
                'nama_fakultas' => 'nullable|string',
                'nama_prodi'    => 'nullable|string',
                'nama_lokasi'   => 'nullable|string',
                'gambar'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $data = $request->only([
                'judul',
                'isi',
                'status',
                'nama_fakultas',
                'nama_prodi',
                'nama_lokasi'
            ]);

            if ($request->status === 'selesai') {
                $data['tanggal_selesai'] = now();
            }
        }

        // =====================
        // 2. STAF → BOLEH EDIT
        // =====================
        elseif ($user->role === 'staf') {
            \Log::info("ROLE = STAF, BOLEH EDIT");

            $request->validate([
                'judul'  => 'nullable|string|max:255',
                'isi'    => 'nullable|string',
                'status' => 'nullable|in:menunggu,diproses,selesai,arsip',
            ]);

            $data = $request->only(['judul', 'isi', 'status']);

            if ($request->status === 'selesai') {
                $data['tanggal_selesai'] = now();
            }
        }

        // ============================
        // 3. USER → HANYA BOLEH EDIT
        //    LAPORAN MILIKNYA SENDIRI
        // ============================
        else {
            \Log::info("ROLE = USER, CEK PEMILIK LAPORAN");

            if ($laporan->user_id !== $user->id) {
                \Log::warning("403: LAPORAN BUKAN MILIK USER");
                abort(403, 'Anda hanya dapat mengedit laporan Anda sendiri.');
            }

            $request->validate([
                'judul'  => 'nullable|string|max:255',
                'isi'    => 'nullable|string',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $data = $request->only(['judul', 'isi']);
        }

        // ==========================================================
        // UPLOAD GAMBAR
        // ==========================================================
        if ($request->hasFile('gambar')) {
            if ($laporan->gambar && file_exists(public_path('uploads/laporan/' . $laporan->gambar))) {
                unlink(public_path('uploads/laporan/' . $laporan->gambar));
            }

            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/laporan'), $fileName);

            $data['gambar'] = $fileName;
        }

        // ==========================================================
        // UPDATE DATA
        // ==========================================================
        $laporan->update($data);

        return back()->with('success', 'Laporan berhasil diperbarui.');
    }

    public function destroy(Laporan $laporan)
    {
        $user = Auth::user();

        // Admin boleh hapus semua
        if ($user->role === 'admin') {
            $this->hapusFile($laporan);
            $laporan->delete();
            return response()->json(['success' => true, 'message' => 'Laporan dihapus oleh admin.']);
        }

        // Staf tidak boleh hapus
        if ($user->role === 'staf') {
            abort(403, 'Staf tidak diizinkan menghapus laporan.');
        }

        // User hanya boleh hapus miliknya sendiri
        if ($user->role === 'user' && $laporan->user_id === $user->id) {
            $this->hapusFile($laporan);
            $laporan->delete();
            return response()->json(['success' => true, 'message' => 'Laporan Anda berhasil dihapus.']);
        }

        abort(403, 'Anda tidak memiliki izin untuk menghapus laporan ini.');
    }

    private function hapusFile($laporan)
    {
        if ($laporan->gambar) {
            $filePath = public_path('uploads/laporan/' . $laporan->gambar);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }
}
