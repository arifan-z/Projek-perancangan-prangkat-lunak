@extends('admin.template')

@section('title', 'Laporan Saya')

@section('content')
    {{-- Header Banner --}}
    {{-- Kartu Banner Utama --}}
    <div class="lg:col-span-3 rounded-xl shadow-lg p-6 flex items-center bg-cover bg-center"
        style="background-image: url('https://images.unsplash.com/photo-1554224155-1696413565d3?q=80&w=2940&auto=format&fit=crop');">
        <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 max-w-4xl mx-auto">

            {{-- <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 max-w-4xl mx-auto"> --}}
            <div class="bg-white/95 backdrop-blur-sm text-gray-800 p-4 rounded-xl shadow-lg border-l-8 border-blue-500">
                <div class="flex items-center justify-center bg-blue-100 rounded-full w-12 h-12 mx-auto">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <p class="text-3xl font-bold mt-3">{{ $totalLaporan }}</p>
                <p class="text-sm text-gray-600 font-semibold">Laporan</p>
            </div>

            <div class="bg-white/95 backdrop-blur-sm text-gray-800 p-4 rounded-xl shadow-lg border-l-8 border-yellow-500">
                <div class="flex items-center justify-center bg-yellow-100 rounded-full w-12 h-12 mx-auto">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <p class="text-3xl font-bold mt-3">{{ $laporanBaru }}</p>
                <p class="text-sm text-gray-600 font-semibold">Dalam Diproses</p>
            </div>

            <div class="bg-white/95 backdrop-blur-sm text-gray-800 p-4 rounded-xl shadow-lg border-l-8 border-green-500">
                <div class="flex items-center justify-center bg-green-100 rounded-full w-12 h-12 mx-auto">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <p class="text-3xl font-bold mt-3">{{ $laporanDiproses }}</p>
                <p class="text-sm text-gray-600 font-semibold">Laporan Diperoses</p>
            </div>

            <div class="bg-white/95 backdrop-blur-sm text-gray-800 p-4 rounded-xl shadow-lg border-l-8 border-red-500">
                <div class="flex items-center justify-center bg-red-100 rounded-full w-12 h-12 mx-auto">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                        </path>
                    </svg>
                </div>
                <p class="text-3xl font-bold mt-3">{{ $laporanSelesai }}</p>
                <p class="text-sm text-gray-600 font-semibold">Laporan Selesai</p>
            </div>

        </div>
    </div>
    {{-- Spacer agar kartu tidak menabrak banner --}}
    <div class="h-10"></div>
    {{-- Filter dan Tombol Tambah --}}
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
        <div class="flex items-center space-x-1 bg-gray-200 p-1.5 rounded-full shadow-sm w-full md:w-auto overflow-x-auto">
            <a href="{{ route('admin.laporan.index') }}"
                class="px-5 py-2 text-sm font-semibold rounded-full flex-shrink-0 
           {{ request('filter') == null ? 'bg-emerald-600 text-white' : 'text-gray-600 hover:bg-white' }}">
                Semua
            </a>
            <a href="{{ route('admin.laporan.index', ['filter' => 'baru']) }}"
                class="px-5 py-2 text-sm font-semibold rounded-full flex-shrink-0 
           {{ request('filter') == 'baru' ? 'bg-emerald-600 text-white' : 'text-gray-600 hover:bg-white' }}">
                Baru
            </a>
            <a href="{{ route('admin.laporan.index', ['filter' => 'milik']) }}"
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
                        <a href="{{ route('admin.laporan.index', ['filter' => 'kategori', 'kategori' => $fakultas->nama_fakultas]) }}"
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
                            <p class="text-xs text-gray-500 mt-2">
                                Diajukan: {{ \Carbon\Carbon::parse($laporan->tanggal_lapor)->format('d M Y') }}
                            </p>
                        </div>

                        <div class="flex-shrink-0 flex items-center md:justify-end gap-2 mt-2 md:mt-0">
                            {{-- Tombol Detail untuk AJAX Modal --}}
                            <button type="button" onclick="showDetailModal({{ $laporan->id }})"
                                class="px-4 py-2 text-sm font-semibold text-white bg-emerald-500 rounded-full hover:bg-emerald-600 transition">
                                Detail
                            </button>

                            {{-- Tombol Hapus (khusus admin/user sesuai hak akses) --}}
                            <form action="{{ route(auth()->user()->role . '.laporan.destroy', $laporan->id) }}"
                                method="POST" onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-4 py-2 text-sm font-semibold text-white bg-red-500 rounded-full hover:bg-red-600 transition">
                                    Hapus
                                </button>
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

            <form action="{{ route('admin.laporan.store') }}" method="POST" enctype="multipart/form-data"
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

        // 🔥 Role aktif (admin/staf/user)
        const rolePrefix = "{{ Auth::user()->role }}";

        // === Tampilkan modal detail ===
        async function showDetailModal(id) {
            selectedLaporanId = id;
            toggleModal('detailModal', true);

            const detailBox = document.getElementById('detailContent');
            detailBox.innerHTML = `<p class="text-center text-gray-400">Memuat data...</p>`;

            try {
                const url = `/${rolePrefix}/laporan/${id}`;
                const res = await fetch(url);
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
                        ${data.gambar_url 
                            ? `<img src="${data.gambar_url}" class="rounded-lg shadow-md w-full">` 
                            : `<p class="italic text-gray-400 text-sm">Tidak ada gambar</p>`}
                    </div>
                </div>
            `;

                // isi form edit
                document.getElementById('edit_id').value = data.id;
                document.getElementById('edit_judul').value = data.judul;
                document.getElementById('edit_isi').value = data.isi;
                document.getElementById('edit_status').value = data.status;
                document.getElementById('editForm').action = `/${rolePrefix}/laporan/${data.id}`;

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

        // 🔥 Hapus laporan (dinamis sesuai role)
        async function deleteLaporan() {
            if (!confirm("Yakin ingin menghapus laporan ini?")) return;
            if (!selectedLaporanId) return;

            try {
                const res = await fetch(`/${rolePrefix}/laporan/${selectedLaporanId}`, {
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

    {{-- Dropdown kategori --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('kategoriBtn');
            const dropdown = document.getElementById('kategoriDropdown');

            if (btn && dropdown) {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    dropdown.classList.toggle('hidden');
                });

                document.addEventListener('click', () => {
                    dropdown.classList.add('hidden');
                });
            }
        });
    </script>


@endsection
