@extends('admin.template')

@section('title', 'Informasi Akademik')

@section('content')
    {{-- Wrapper utama --}}
    <div class="bg-gray-100 min-h-screen p-6">

        {{-- Header Banner --}}
        {{-- Kartu Banner Utama --}}
        {{-- <div class="lg:col-span-3 rounded-xl shadow-lg p-6 flex items-center bg-cover bg-center"
            style="background-image: url('https://images.unsplash.com/photo-1554224155-1696413565d3?q=80&w=2940&auto=format&fit=crop');">
            <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 max-w-4xl mx-auto">

                
                <div class="bg-white/95 backdrop-blur-sm text-gray-800 p-4 rounded-xl shadow-lg border-l-8 border-blue-500">
                    <div class="flex items-center justify-center bg-blue-100 rounded-full w-12 h-12 mx-auto">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <p class="text-3xl font-bold mt-3">33</p>
                    <p class="text-sm text-gray-600 font-semibold">Laporan Baru</p>
                </div>

                <div
                    class="bg-white/95 backdrop-blur-sm text-gray-800 p-4 rounded-xl shadow-lg border-l-8 border-yellow-500">
                    <div class="flex items-center justify-center bg-yellow-100 rounded-full w-12 h-12 mx-auto">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-3xl font-bold mt-3">66</p>
                    <p class="text-sm text-gray-600 font-semibold">Dalam Diproses</p>
                </div>

                <div
                    class="bg-white/95 backdrop-blur-sm text-gray-800 p-4 rounded-xl shadow-lg border-l-8 border-green-500">
                    <div class="flex items-center justify-center bg-green-100 rounded-full w-12 h-12 mx-auto">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-3xl font-bold mt-3">99</p>
                    <p class="text-sm text-gray-600 font-semibold">Laporan Selesai</p>
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
                    <p class="text-3xl font-bold mt-3">369</p>
                    <p class="text-sm text-gray-600 font-semibold">Laporan Prioritas</p>
                </div>

            </div>
        </div> --}}

        {{-- Spacer agar kartu tidak menabrak banner --}}
        <div class="h-10"></div>

        {{-- Papan Pengumuman --}}

        {{-- HEADER --}}
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-bold">Papan Pengumuman Akademik</h2>

            <button onclick="openTambah()" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow hover:bg-green-600">
                Tambah
            </button>
        </div>

        {{-- LIST INFORMASI --}}
        <div class="grid md:grid-cols-3 gap-4">

            @foreach ($informasi as $info)
                <div class="bg-white shadow p-4 rounded-lg border">

                    {{-- LABEL JENIS --}}
                    <span class="text-xs font-bold px-2 py-1 rounded bg-yellow-200 text-yellow-900 flex items-center gap-1">
                        <i class="fa-solid fa-bullhorn"></i> {{ $info->jenis }}
                    </span>

                    <h3 class="mt-2 font-bold text-lg">{{ $info->judul }}</h3>

                    <p class="text-sm text-gray-600">{{ $info->nama_pengirim }}</p>

                    <button onclick="openDetail({{ $info->id }})"
                        class="mt-3 inline-block px-3 py-1 text-sm rounded bg-green-100 text-green-700 hover:bg-green-200">
                        Lihat Detail
                    </button>

                </div>
            @endforeach

        </div>
    </div>


    {{-- ======================================================================================== --}}
    {{-- ================================   MODAL TAMBAH   ====================================== --}}
    {{-- ======================================================================================== --}}

    <div id="modalTambah" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50 p-4">
        <div class="bg-white rounded-xl p-6 w-full max-w-lg">

            <h2 class="text-xl font-bold mb-4">Tambah Informasi</h2>

            <form action="{{ route('admin.informasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="font-semibold text-sm">Judul</label>
                    <input name="judul" class="w-full border p-2 rounded" required>
                </div>

                <div class="mb-3">
                    <label class="font-semibold text-sm">Nama Pengirim</label>
                    <input name="nama_pengirim" class="w-full border p-2 rounded" required>
                </div>

                <div class="mb-3">
                    <label class="font-semibold text-sm">Jenis</label>
                    <select name="jenis" class="w-full border p-2 rounded">
                        <option value="PENTING">PENTING</option>
                        <option value="DOKUMEN">DOKUMEN</option>
                        <option value="LAINNYA">LAINNYA</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="font-semibold text-sm">Isi Informasi</label>
                    <textarea name="isi" class="w-full border p-2 rounded"></textarea>
                </div>

                <div class="mb-3">
                    <label class="font-semibold text-sm">Gambar (opsional)</label>
                    <input type="file" name="gambar" class="w-full">
                </div>

                <div class="flex gap-2 mt-4">
                    <button class="w-1/2 bg-green-600 text-white py-2 rounded">Simpan</button>
                    <button type="button" onclick="closeTambah()" class="w-1/2 bg-gray-200 py-2 rounded">Batal</button>
                </div>

            </form>

        </div>
    </div>


    {{-- ======================================================================================== --}}
    {{-- ================================   MODAL DETAIL   ====================================== --}}
    {{-- ======================================================================================== --}}

    <div id="modalDetail" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50 p-4">
        <div class="bg-white p-6 rounded-xl w-full max-w-lg">

            <h2 class="text-xl font-bold mb-3">Detail Informasi</h2>

            <div id="detailContent" class="space-y-2"></div>

            <div class="flex gap-2 mt-4">

                {{-- TOMBOL EDIT --}}
                <button onclick="goEdit()" class="w-1/3 bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
                    Edit
                </button>

                {{-- TOMBOL HAPUS --}}
                <form id="hapusForm" method="POST" class="w-1/3">
                    @csrf
                    @method('DELETE')
                    <button class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600">
                        Hapus
                    </button>
                </form>

                {{-- TUTUP --}}
                <button onclick="closeDetail()" class="w-1/3 bg-gray-300 py-2 rounded">Tutup</button>

            </div>

        </div>
    </div>


    {{-- ======================================================================================== --}}
    {{-- ================================   MODAL EDIT   ======================================== --}}
    {{-- ======================================================================================== --}}

    <div id="modalEdit" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50 p-4">
        <div class="bg-white p-6 rounded-xl w-full max-w-lg">

            <h2 class="text-xl font-bold mb-4">Edit Informasi</h2>

            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="font-semibold text-sm">Judul</label>
                    <input id="edit_judul" name="judul" class="w-full border p-2 rounded">
                </div>

                <div class="mb-3">
                    <label class="font-semibold text-sm">Pengirim</label>
                    <input id="edit_pengirim" name="nama_pengirim" class="w-full border p-2 rounded">
                </div>

                <div class="mb-3">
                    <label class="font-semibold text-sm">Jenis</label>
                    <select id="edit_jenis" name="jenis" class="w-full border p-2 rounded">
                        <option value="PENTING">PENTING</option>
                        <option value="DOKUMEN">DOKUMEN</option>
                        <option value="LAINNYA">LAINNYA</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="font-semibold text-sm">Isi Informasi</label>
                    <textarea id="edit_isi" name="isi" class="w-full border p-2 rounded"></textarea>
                </div>

                <div class="mb-3">
                    <label class="font-semibold text-sm">Gambar Baru (opsional)</label>
                    <input type="file" name="gambar" class="w-full">
                </div>

                <div class="flex gap-2 mt-4">
                    <button class="w-1/2 bg-blue-600 text-white py-2 rounded">Update</button>
                    <button type="button" onclick="closeEdit()" class="w-1/2 bg-gray-200 py-2 rounded">Batal</button>
                </div>

            </form>
        </div>
    </div>


    {{-- ======================================================================================== --}}
    {{-- ================================   JAVASCRIPT   ========================================= --}}
    {{-- ======================================================================================== --}}

    <script>
        let selectedID = null;

        function openTambah() {
            modalTambah.classList.remove('hidden');
            modalTambah.classList.add('flex')
        }

        function closeTambah() {
            modalTambah.classList.add('hidden')
        }

        function openDetail(id) {
            selectedID = id;

            fetch(`/admin/informasi/${id}/edit`)
                .then(res => res.json())
                .then(data => {

                    document.getElementById('detailContent').innerHTML = `
                <p><strong>Judul:</strong> ${data.judul}</p>
                <p><strong>Pengirim:</strong> ${data.nama_pengirim}</p>
                <p><strong>Jenis:</strong> ${data.jenis}</p>
                <p class="mt-2"><strong>Isi:</strong><br>${data.isi ?? '-'}</p>
                ${data.gambar ? `<img src="/uploads/informasi/${data.gambar}" class="mt-3 rounded-lg">` : ''}
            `;

                    document.getElementById('hapusForm').action = `/admin/informasi/${id}`;
                    modalDetail.classList.remove('hidden');
                    modalDetail.classList.add('flex');
                });
        }

        function closeDetail() {
            modalDetail.classList.add('hidden')
        }

        function goEdit() {
            fetch(`/admin/informasi/${selectedID}/edit`)
                .then(res => res.json())
                .then(data => {
                    document.getElementById('edit_judul').value = data.judul;
                    document.getElementById('edit_pengirim').value = data.nama_pengirim;
                    document.getElementById('edit_jenis').value = data.jenis;
                    document.getElementById('edit_isi').value = data.isi;

                    document.getElementById('editForm').action = `/admin/informasi/${selectedID}`;

                    modalDetail.classList.add('hidden');
                    modalEdit.classList.remove('hidden');
                    modalEdit.classList.add('flex');
                });
        }

        function closeEdit() {
            modalEdit.classList.add('hidden')
        }
    </script>

@endsection
