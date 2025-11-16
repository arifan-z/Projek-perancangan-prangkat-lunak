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

    <div class="p-4">

        {{-- JUDUL --}}
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-bold">Papan Pengumuman Akademik</h2>
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
    {{-- ================================   MODAL DETAIL   ====================================== --}}
    {{-- ======================================================================================== --}}

    <div id="modalDetail" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50 p-4">
        <div class="bg-white p-6 rounded-xl w-full max-w-lg">

            <h2 class="text-xl font-bold mb-3">Detail Informasi</h2>

            <div id="detailContent" class="space-y-2"></div>

            <div class="flex mt-4">
                <button onclick="closeDetail()" class="w-full bg-gray-300 py-2 rounded">Tutup</button>
            </div>

        </div>
    </div>


    {{-- ======================================================================================== --}}
    {{-- ================================   JAVASCRIPT   ========================================= --}}
    {{-- ======================================================================================== --}}

    <script>
        function openDetail(id) {
            fetch(`/user/informasi/${id}`)
                .then(res => res.json())
                .then(data => {
                    document.getElementById('detailContent').innerHTML = `
                    <p><strong>Judul:</strong> ${data.judul}</p>
                    <p><strong>Pengirim:</strong> ${data.nama_pengirim}</p>
                    <p><strong>Jenis:</strong> ${data.jenis}</p>
                    <p class="mt-2"><strong>Isi:</strong><br>${data.isi ?? '-'}</p>
                    ${data.gambar ? `<img src="/uploads/informasi/${data.gambar}" class="mt-3 rounded-lg">` : ''}
                `;

                    modalDetail.classList.remove('hidden');
                    modalDetail.classList.add('flex');
                });
        }

        function closeDetail() {
            modalDetail.classList.add('hidden');
        }
    </script>

@endsection
