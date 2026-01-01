<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformasiController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        // ADMIN
        if ($user->role == 'admin') {
            return view('admin.informasi', [
                'informasi' => Informasi::orderBy('created_at', 'desc')->get(),
                'countPenting' => Informasi::where('jenis', 'PENTING')->count(),
                'countDokumen' => Informasi::where('jenis', 'DOKUMEN')->count(),
                'countSemua' => Informasi::count(),
            ]);
        }

        // STAF
        if ($user->role == 'staf') {
            return view('staf.informasi', [
                'informasi' => Informasi::orderBy('created_at', 'desc')->get(),
                'countPenting' => Informasi::where('jenis', 'PENTING')->count(),
                'countDokumen' => Informasi::where('jenis', 'DOKUMEN')->count(),
                'countSemua' => Informasi::count(),
            ]);
        }

        // USER (read-only)
        return view('user.informasi', [
            'informasi' => Informasi::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function indexUser()
    {
        return view('user.informasi', [
            'informasi' => Informasi::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function indexStaf()
    {
        return view('staf.informasi', [
            'informasi' => Informasi::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function show($id)
    {
        $info = Informasi::findOrFail($id);
        return response()->json($info);
    }

    // ====== CREATE DIPAKAI MODAL ======
    public function create()
    {
        return response()->json(['status' => true]);
    }

    public function store(Request $request)
    {
        // CEK ROLE — USER TIDAK BOLEH MENAMBAH
        if (!in_array(Auth::user()->role, ['admin', 'staf'])) {
            return abort(403, 'Anda tidak memiliki hak akses.');
        }

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $filename = time() . '_' . $request->gambar->getClientOriginalName();
            $request->gambar->move(public_path('uploads/informasi'), $filename);
            $data['gambar'] = $filename;
        }

        Informasi::create($data);

        return redirect()->route('admin.informasi.index')
            ->with('success', 'Informasi berhasil ditambahkan');
    }

    // ====== EDIT (RETURN JSON UNTUK POPUP) ======
    public function edit($id)
    {
        if (!in_array(Auth::user()->role, ['admin', 'staf'])) {
            return abort(403, 'Tidak boleh edit.');
        }

        $info = Informasi::findOrFail($id);
        return response()->json($info);
    }

    public function update(Request $request, $id)
    {
        if (!in_array(Auth::user()->role, ['admin', 'staf'])) {
            return abort(403, 'Tidak boleh update.');
        }

        $info = Informasi::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $filename = time() . '_' . $request->gambar->getClientOriginalName();
            $request->gambar->move(public_path('uploads/informasi'), $filename);
            $data['gambar'] = $filename;
        }

        $info->update($data);

        return redirect()->route('admin.informasi.index')
            ->with('success', 'Informasi berhasil diupdate');
    }

    public function destroy($id)
    {
        if (!in_array(Auth::user()->role, ['admin', 'staf'])) {
            return abort(403, 'Tidak boleh hapus.');
        }

        Informasi::findOrFail($id)->delete();

        return redirect()->route('admin.informasi.index')
            ->with('success', 'Informasi berhasil dihapus');
    }
    public function beranda()
    {
        return view('beranda', [
            'informasi' => Informasi::orderBy('created_at', 'desc')->take(6)->get()
        ]);
    }
    public function informasi()
    {
        return view('informasi', [
            'informasi' => Informasi::orderBy('created_at', 'desc')->take(6)->get()
        ]);
    }
}
