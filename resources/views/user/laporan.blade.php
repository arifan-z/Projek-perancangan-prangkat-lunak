@extends('user.template')

@section('title', 'Laporan Saya')

@section('content')
    {{-- Banner Selamat Datang --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="md:col-span-2 bg-gray-700 rounded-xl shadow-lg p-8 flex flex-col justify-center text-white relative overflow-hidden bg-cover bg-center"
            style="background-image: url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=2940&auto=format&fit=crop');">
            <div class="absolute inset-0 bg-black/60"></div>
            <div class="relative z-10">
                <h1 class="text-3xl font-bold">Selamat Datang, {{ Auth::user()->name ?? 'Pengguna' }}!</h1>
                <p class="text-gray-300 mt-1">Berikut adalah dasbor Laporan Pengaduan anda.</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center justify-center text-center">
            <div class="bg-emerald-100 p-4 rounded-full mb-4">
                <img src="https://img.icons8.com/fluency/48/guarantee.png" alt="Shield Icon" />
            </div>
            <h2 class="text-lg font-bold text-gray-800">Sampaikan Pengaduan dengan Mudah dan Aman</h2>
            <button onclick="toggleModal('laporanModal', true)"
                class="mt-4 w-full px-4 py-3 border-2 border-emerald-600 text-emerald-600 font-semibold rounded-full hover:bg-emerald-600 hover:text-white transition-colors duration-300">
                Laporkan Segera
            </button>
        </div>
    </div>

    {{-- Filter dan Tombol Tambah --}}
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
        <div class="flex items-center space-x-1 bg-gray-200 p-1.5 rounded-full shadow-sm w-full md:w-auto overflow-x-auto">
            <a href="{{ route('user.laporan.index') }}"
                class="px-5 py-2 text-sm font-semibold rounded-full flex-shrink-0 
           {{ request('filter') == null ? 'bg-emerald-600 text-white' : 'text-gray-600 hover:bg-white' }}">
                Semua
            </a>
            <a href="{{ route('user.laporan.index', ['filter' => 'baru']) }}"
                class="px-5 py-2 text-sm font-semibold rounded-full flex-shrink-0 
           {{ request('filter') == 'baru' ? 'bg-emerald-600 text-white' : 'text-gray-600 hover:bg-white' }}">
                Baru
            </a>
            <a href="{{ route('user.laporan.index', ['filter' => 'milik']) }}"
                class="px-5 py-2 text-sm font-semibold rounded-full flex-shrink-0 
           {{ request('filter') == 'milik' ? 'bg-emerald-600 text-white' : 'text-gray-600 hover:bg-white' }}">
                Milik Anda
            </a>
            <div class="relative inline-block">
                <button id="kategoriBtn"
                    class="px-5 py-2 text-sm font-semibold text-gray-600 hover:bg-white rounded-full flex-shrink-0">
                    Kategori ⏷
                </button>
                <div id="kategoriDropdown" class="hidden absolute mt-1 bg-white border rounded shadow-lg w-40 z-10">
                    @foreach ($fakultasList as $fakultas)
                        <a href="{{ route('user.laporan.index', ['filter' => 'kategori', 'kategori' => $fakultas->nama_fakultas]) }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            {{ $fakultas->nama_fakultas }}
                        </a>
                    @endforeach
                </div>

            </div>
        </div>


        <button onclick="toggleModal('laporanModal', true)"
            class="w-full md:w-auto flex items-center justify-center gap-2 px-5 py-3 bg-emerald-600 text-white font-semibold rounded-full hover:bg-emerald-700 transition-colors duration-300 shadow-lg flex-shrink-0">
            <i class="fas fa-plus-circle"></i>
            <span>Tambah Laporan</span>
        </button>
    </div>
    {{-- Daftar Laporan --}}
    <div class="space-y-4">
        @forelse ($laporans as $laporan)
            @php
                $statusColor = match ($laporan->status) {
                    'menunggu' => 'yellow',
                    'diproses' => 'blue',
                    'selesai' => 'green',
                    default => 'gray',
                };
            @endphp
            <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all hover:shadow-xl flex">
                <div class="w-2 bg-{{ $statusColor }}-500"></div>
                <div class="p-4 md:p-6 flex-1">
                    <div class="flex flex-col md:flex-row justify-between md:items-start gap-3">
                        <div>
                            <div class="flex items-center gap-3">
                                <p class="text-sm font-semibold text-gray-500">#{{ $laporan->id }}</p>
                                <span
                                    class="px-2.5 py-0.5 text-xs font-semibold rounded-full bg-{{ $statusColor }}-100 text-{{ $statusColor }}-800">
                                    {{ ucfirst($laporan->status) }}
                                </span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 mt-1">{{ $laporan->judul }}</h3>
                            <p class="text-xs text-gray-500 mt-2">Diajukan:
                                {{ \Carbon\Carbon::parse($laporan->tanggal_lapor)->format('d M Y') }}
                            </p>
                        </div>
                        <div class="flex-shrink-0 flex items-center md:justify-end gap-2 mt-2 md:mt-0">
                            <button type="button" onclick="showDetailModal({{ $laporan->id }})"
                                class="px-4 py-2 text-sm font-semibold text-white bg-emerald-500 rounded-full hover:bg-emerald-600 transition">
                                Detail
                            </button>
                            <form action="{{ route('user.laporan.destroy', $laporan->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                                @csrf
                                @method('DELETE')
                                @if (Auth::user()->id === $laporan->user_id || Auth::user()->role === 'admin')
                                    <button type="submit"
                                        class="px-4 py-2 text-sm font-semibold text-white bg-red-500 rounded-full hover:bg-red-600 transition">
                                        Hapus
                                    </button>
                                @endif
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-xl shadow-md p-8 text-center">
                <p class="text-gray-500">Belum ada laporan yang dikirim.</p>
            </div>
        @endforelse
    </div>
    {{-- Modal Detail Laporan --}}
    <div id="detailModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
        <div
            class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl p-8 relative transform transition-all duration-300 scale-95">
            <button onclick="toggleModal('detailModal', false)"
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-xl font-bold">
                ✖
            </button>
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Detail Laporan</h2>
            <div id="detailContent" class="space-y-5 text-gray-700">
                <p class="text-center text-gray-400">Memuat data...</p>
            </div>
            <div class="mt-6 flex justify-end gap-3 border-t pt-4">
                <button type="button" onclick="openEditModal()"
                    class="px-4 py-2 rounded-lg bg-yellow-500 text-white font-semibold hover:bg-yellow-600 transition">
                    Edit
                </button>
                <button type="button" onclick="deleteLaporan()"
                    class="px-4 py-2 rounded-lg bg-red-500 text-white font-semibold hover:bg-red-600 transition">
                    Hapus
                </button>
            </div>
        </div>
    </div>

    {{-- Modal Edit Laporan --}}
    <div id="editModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl p-8 relative">
            <button onclick="toggleModal('editModal', false)"
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">✖</button>
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Edit Laporan</h2>

            <form id="editForm" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_id" name="id">

                <div>
                    <label class="block font-semibold mb-1">Judul</label>
                    <input type="text" id="edit_judul" name="judul" class="w-full border rounded-lg p-2" required>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Isi Laporan</label>
                    <textarea id="edit_isi" name="isi" rows="4" class="w-full border rounded-lg p-2" required></textarea>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Status</label>
                    <select id="edit_status" name="status" class="w-full border rounded-lg p-2">
                        <option value="menunggu">Menunggu</option>
                        <option value="diproses">Diproses</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Gambar Baru (Opsional)</label>
                    <input type="file" name="gambar" accept="image/*" class="w-full border rounded-lg p-2">
                </div>

                <div class="flex justify-end mt-6">
                    <button type="button" onclick="toggleModal('editModal', false)"
                        class="px-5 py-2 rounded-lg border border-gray-400 text-gray-600 hover:bg-gray-100 mr-2">Batal</button>
                    <button type="submit"
                        class="px-5 py-2 rounded-lg bg-emerald-600 text-white font-semibold hover:bg-emerald-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>



    {{-- Modal Tambah Laporan --}}
    <div id="laporanModal"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl p-8 relative">
            <button onclick="toggleModal('laporanModal', false)"
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">✖</button>
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Tambah Laporan Baru</h2>

            <form action="{{ route('user.laporan.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                <div>
                    <label class="block font-semibold mb-1">Judul</label>
                    <input type="text" name="judul" class="w-full border rounded-lg p-2" required>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Isi Laporan</label>
                    <textarea name="isi" rows="4" class="w-full border rounded-lg p-2" required></textarea>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Upload Gambar (Opsional)</label>
                    <input type="file" name="gambar" accept="image/*" class="w-full border rounded-lg p-2">
                </div>

                <div>
                    <label class="block font-semibold mb-1">Fakultas</label>
                    <select name="nama_fakultas" class="w-full border rounded-lg p-2" required>
                        <option value="" disabled selected>Pilih Fakultas</option>
                        @foreach ($fakultasList as $fakultas)
                            <option value="{{ $fakultas->nama_fakultas }}">{{ $fakultas->nama_fakultas }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Program Studi</label>
                    <select name="nama_prodi" class="w-full border rounded-lg p-2">
                        <option value="" disabled selected>Pilih Prodi</option>
                        @foreach ($prodiList as $prodi)
                            <option value="{{ $prodi->nama_prodi }}">{{ $prodi->nama_prodi }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Lokasi</label>
                    <select name="nama_lokasi" class="w-full border rounded-lg p-2">
                        <option value="" disabled selected>Pilih Lokasi</option>
                        @foreach ($tempatList as $tempat)
                            <option value="{{ $tempat->nama_tempat }}">{{ $tempat->nama_tempat }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="px-5 py-2 rounded-lg bg-emerald-600 text-white font-semibold hover:bg-emerald-700">Kirim</button>
                </div>
            </form>

        </div>
    </div>

    {{-- Script Lihat Detail, Edit, Tambah dan Hapus Laporan --}}
    <script>
        // === Fungsi toggle modal umum ===
        function toggleModal(id, show) {
            const modal = document.getElementById(id);
            if (!modal) return;
            modal.classList.toggle('hidden', !show);
            modal.classList.toggle('flex', show);
        }

        let selectedLaporanId = null;

        // === Tampilkan modal detail ===
        async function showDetailModal(id) {
            selectedLaporanId = id;
            toggleModal('detailModal', true);

            const detailBox = document.getElementById('detailContent');
            detailBox.innerHTML = `<p class="text-center text-gray-400">Memuat data...</p>`;

            try {
                // 🔹 PERBAIKAN URL — gunakan prefix 'user'
                const res = await fetch(`/user/laporan/${id}`);
                if (!res.ok) throw new Error('Gagal mengambil data laporan');
                const data = await res.json();

                detailBox.innerHTML = `
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                <div>
                   <p><strong>Pengirim:</strong> ${data.user?.name ?? '-'}</p>
                        <p><strong>Judul:</strong> ${data.judul}</p>
                        <p><strong>Isi:</strong> ${data.isi}</p>
                        <p><strong>Status:</strong> ${data.status}</p>
                        <p><strong>Fakultas:</strong> ${data.nama_fakultas}</p>
                        <p><strong>Program Studi:</strong> ${data.nama_prodi ?? '-'}</p>
                        <p><strong>Lokasi:</strong> ${data.nama_lokasi ?? '-'}</p>
                        <p><strong>Tanggal Lapor:</strong> ${data.tanggal_lapor}</p>
                        <p><strong>Tanggal Selesai:</strong> ${data.tanggal_selesai ?? '-'}</p>
                        <p><strong>Dilihat:</strong> ${data.view_count} kali</p>
                </div>
                <div>
                    ${data.gambar 
                        ? `<img src="/uploads/laporan/${data.gambar}" class="rounded-lg shadow-md w-full">` 
                        : `<p class="italic text-gray-400 text-sm">Tidak ada gambar</p>`
                    }
                </div>
            </div>`;

                // 🔹 Isi form edit otomatis
                document.getElementById('edit_id').value = data.id;
                document.getElementById('edit_judul').value = data.judul;
                document.getElementById('edit_isi').value = data.isi;
                // document.getElementById('edit_status').value = data.status;
                document.getElementById('editForm').action = `/user/laporan/${data.id}`;

            } catch (err) {
                console.error(err);
                detailBox.innerHTML =
                    `<p class="text-center text-red-500">Terjadi kesalahan saat memuat detail laporan.</p>`;
            }
        }

        function openEditModal() {
            toggleModal('detailModal', false);
            toggleModal('editModal', true);
        }

        async function deleteLaporan() {
            if (!confirm("Yakin ingin menghapus laporan ini?")) return;
            if (!selectedLaporanId) return;

            try {
                // 🔹 PERBAIKAN URL — gunakan prefix 'user'
                const res = await fetch(`/user/laporan/${selectedLaporanId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                if (res.ok) {
                    alert('Laporan berhasil dihapus');
                    location.reload();
                } else {
                    alert('Gagal menghapus laporan');
                }
            } catch (error) {
                console.error(error);
                alert('Terjadi kesalahan saat menghapus laporan');
            }
        }
    </script>


@endsection
