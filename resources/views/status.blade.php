<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi & Pengaduan - Universitas Malikussaleh</title>
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Beranda | Lapor Ga Sih?' }}</title>

</head>

<body class="bg-gray-100 flex flex-col min-h-screen" x-data="{ open: false }">


    {{-- Memanggil Header --}}
    @include('layout.header')

    <main>
        <section class="relative bg-gray-800">
            <div class="absolute inset-0 bg-cover bg-center"
                style="background-image: url('{{ asset('images/unimal1.png') }}');">
            </div>
            <div class="absolute inset-0 bg-black bg-opacity-20"></div>

            <div class="relative container mx-auto px-6 py-16 text-center text-white">
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">
                    Lacak Laporan Anda dengan Mudah
                </h1>
                <p class="mt-4 text-lg text-white">
                    Informasi transparan untuk semua pengaduan Anda, dari pengajuan hingga tindak lanjut.
                </p>

                <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 max-w-4xl mx-auto">
                    <div
                        class="bg-white/95 backdrop-blur-sm text-gray-800 p-4 rounded-xl shadow-lg border-l-8 border-blue-500">
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
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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

                    <div
                        class="bg-white/95 backdrop-blur-sm text-gray-800 p-4 rounded-xl shadow-lg border-l-8 border-red-500">
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
            </div>
        </section>

        <div class="bg-slate-50 py-12">
            <div class="container mx-auto px-6">

                <div x-data="{ activeTab: 'semua' }" class="flex flex-col sm:flex-row items-center justify-between mb-8">
                    <div class="flex flex-wrap space-x-2 sm:space-x-4 border-b pb-2">
                        <button @click="activeTab = 'semua'"
                            :class="{ 'text-green-600 border-green-600 font-semibold': activeTab === 'semua', 'text-gray-500 border-transparent': activeTab !== 'semua' }"
                            class="px-3 py-2 border-b-2 transition">Semua</button>
                        <button @click="activeTab = 'baru'"
                            :class="{ 'text-green-600 border-green-600 font-semibold': activeTab === 'baru', 'text-gray-500 border-transparent': activeTab !== 'baru' }"
                            class="px-3 py-2 border-b-2 transition">Baru</button>
                        <button @click="activeTab = 'diproses'"
                            :class="{ 'text-green-600 border-green-600 font-semibold': activeTab === 'diproses', 'text-gray-500 border-transparent': activeTab !== 'diproses' }"
                            class="px-3 py-2 border-b-2 transition">Diproses</button>
                        <button @click="activeTab = 'selesai'"
                            :class="{ 'text-green-600 border-green-600 font-semibold': activeTab === 'selesai', 'text-gray-500 border-transparent': activeTab !== 'selesai' }"
                            class="px-3 py-2 border-b-2 transition">Selesai</button>
                        <button @click="activeTab = 'prioritas'"
                            :class="{ 'text-green-600 border-green-600 font-semibold': activeTab === 'prioritas', 'text-gray-500 border-transparent': activeTab !== 'prioritas' }"
                            class="px-3 py-2 border-b-2 transition">Prioritas</button>
                        <button @click="activeTab = 'kategori'"
                            :class="{ 'text-green-600 border-green-600 font-semibold': activeTab === 'kategori', 'text-gray-500 border-transparent': activeTab !== 'kategori' }"
                            class="px-3 py-2 border-b-2 transition">Kategori</button>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <button
                            class="text-gray-500 hover:text-green-600 p-2 rounded-full hover:bg-gray-200 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v10a1 1 0 01-1 1H4a1 1 0 01-1-1V10zM15 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>


                {{-- LIST LAPORAN --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    @foreach ($laporans as $laporan)
                        <div class="relative bg-white rounded-lg shadow-sm hover:shadow-lg overflow-hidden transition">

                            @php
                                $color =
                                    [
                                        'menunggu' => 'blue-500',
                                        'diproses' => 'yellow-500',
                                        'prioritas' => 'red-500',
                                        'selesai' => 'gray-500',
                                    ][$laporan->status] ?? 'gray-500';
                            @endphp

                            <div class="absolute left-0 top-0 bottom-0 w-2 bg-{{ $color }}"></div>

                            <div class="pl-8 pr-6 py-6">
                                <div class="flex justify-between items-start">

                                    <p class="text-sm text-gray-500">
                                        ID Laporan:
                                        <span class="font-semibold text-gray-700">#{{ $laporan->id }}</span>
                                    </p>

                                    @php
                                        $badge = [
                                            'menunggu' => 'bg-blue-100 text-blue-800',
                                            'diproses' => 'bg-yellow-100 text-yellow-800',
                                            'prioritas' => 'bg-red-100 text-red-800',
                                            'selesai' => 'bg-gray-200 text-gray-800',
                                        ];
                                    @endphp

                                    <span
                                        class="text-xs font-bold px-3 py-1 rounded-full {{ $badge[$laporan->status] }}">
                                        {{ ucfirst($laporan->status) }}
                                    </span>
                                </div>

                                <h3 class="font-bold text-lg mt-2 text-gray-900">
                                    {{ Str::limit($laporan->judul, 80) }}
                                </h3>

                                <p class="text-gray-600 mt-2 text-sm">
                                    {{ Str::limit($laporan->isi, 120) }}
                                </p>

                                <div class="flex justify-between items-center mt-4">
                                    <p class="text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($laporan->tanggal_lapor)->format('d F Y') }}
                                    </p>

                                    <button onclick="openDetailModal(this)" data-id="{{ $laporan->id }}"
                                        data-judul="{{ $laporan->judul }}" data-isi="{{ $laporan->isi }}"
                                        data-status="{{ $laporan->status }}"
                                        data-pelapor="{{ $laporan->user->name }}"
                                        data-tanggal="{{ $laporan->tanggal_lapor }}"
                                        data-gambar="{{ asset('uploads/laporan/' . $laporan->gambar) }}"
                                        class="text-sm font-medium bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg">
                                        Lihat Detail
                                    </button>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($laporans->isEmpty())
                    <p class="text-center text-gray-600">Belum ada laporan.</p>
                @endif
            </div>
        </div>

    </main>

    @include('layout.footer')

    <!-- MODAL DETAIL -->
    <div id="detailModal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">

        <div class="bg-white p-6 rounded-lg shadow-xl w-full max-w-xl relative">

            <h2 class="text-xl font-semibold mb-3">Detail Laporan</h2>

            <div class="space-y-2">
                <p><strong>Judul:</strong> <span id="modalJudul"></span></p>

                <div>
                    <p class="font-medium">Isi:</p>
                    <p id="modalIsi" class="text-gray-700"></p>
                </div>

                <p><strong>Status:</strong> <span id="modalStatus"></span></p>
                <p><strong>Pelapor:</strong> <span id="modalPelapor"></span></p>
                <p><strong>Tanggal:</strong> <span id="modalTanggal"></span></p>

                <div>
                    <p><strong>Gambar:</strong></p>

                    <img id="modalGambar" class="w-full max-h-96 object-contain mt-2 border rounded hidden"
                        alt="Gambar Laporan"
                        onerror="this.classList.add('hidden'); document.getElementById('gambarFallback').classList.remove('hidden');">

                    <p id="gambarFallback" class="hidden text-gray-500 text-sm">
                        Tidak ada gambar atau gagal dimuat.
                    </p>
                </div>
            </div>

            <!-- Tombol Close kanan bawah -->
            <div class="mt-6 flex justify-end">
                <button onclick="closeDetailModal()" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                    Close
                </button>
            </div>

        </div>
    </div>


    {{-- SCRIPT --}}
    <script>
        function openDetailModal(button) {
            document.getElementById('modalJudul').textContent = button.dataset.judul;
            document.getElementById('modalIsi').textContent = button.dataset.isi;
            document.getElementById('modalStatus').textContent = button.dataset.status;
            document.getElementById('modalPelapor').textContent = button.dataset.pelapor;
            document.getElementById('modalTanggal').textContent = button.dataset.tanggal;

            let img = document.getElementById('modalGambar');

            if (button.dataset.gambar) {
                img.src = button.dataset.gambar;
                img.classList.remove('hidden');
            } else {
                img.classList.add('hidden');
            }

            document.getElementById('detailModal').classList.remove('hidden');
        }

        function closeDetailModal() {
            document.getElementById('detailModal').classList.add('hidden');
        }
    </script>
</body>

</html>
