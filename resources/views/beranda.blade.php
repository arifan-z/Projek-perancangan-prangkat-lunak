<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi & Pengaduan - Universitas Malikussaleh</title>
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Beranda | Lapor Ga Sih?' }}</title>

</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

    {{-- Memanggil Header --}}
    @include('layout.header')

    {{-- Konten utama dari setiap halaman --}}
    <main class="flex-grow">
        <section class="relative h-[80vh] max-h-[600px]">

            <div class="absolute inset-0 bg-cover bg-center sm:hidden"
                style="background-image: url('{{ asset('images/unimal-potret.png') }}');">
            </div>

            <div class="absolute inset-0 bg-cover bg-center hidden sm:block"
                style="background-image: url('{{ asset('images/unimal.png') }}');">
            </div>

            <div class="absolute inset-0 bg-black bg-opacity-40"></div>

            <div class="container mx-auto px-6 relative z-10 flex items-center h-full">
                <div class="w-full text-center lg:text-left lg:w-3/5 xl:w-1/2">
                    <h1
                        class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-4">
                        Sampaikan Pengaduan dengan Mudah dan Aman
                    </h1>
                    <p class="text-base sm:text-lg md:text-xl text-gray-200 max-w-xl mx-auto lg:mx-0">
                        Salurkan aspirasi Anda untuk mendukung perbaikan layanan kampus.
                    </p>
                    {{-- <div class="mt-8">
                        <a href="#"
                            class="bg-green-600 text-white font-bold py-3 px-8 rounded-lg hover:bg-green-700 transition-colors">
                            Buat Laporan
                        </a>
                    </div> --}}
                </div>
            </div>
        </section>

        {{-- Informasi Terkini --}}
        <section class="container mx-auto px-10 py-16">
            {{-- Section Informasi & Laporan --}}

            <h2 class="text-3xl font-bold text-gray-800 mb-8">Informasi Terkini</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                {{-- Card Berita 1 --}}
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                    {{-- Placeholder Gambar --}}
                    <div class="bg-gray-200 h-48 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span
                                class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">Berita</span>
                            <span class="text-xs text-gray-500">10 Nov 2023</span>
                        </div>
                        <h3 class="font-bold text-lg mb-2 text-gray-800">Ikuti Kemah Budaya Kaum Muda 2023,
                            Mahasiswa Informatika Unimal Kembangkan Situs Penerjemah Bahasa Daerah</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Haris Yunanda Rangkuti, mahasiswa Program Studi Teknik Informatika, Fakultas Teknik,
                            Universitas Malikussaleh menjadi ...
                        </p>
                        <a href="#"
                            class="text-green-600 hover:text-green-800 text-sm font-semibold flex items-center justify-end">
                            Baca selengkapnya
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Card Berita 2 (Sama untuk contoh) --}}
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="bg-gray-200 h-48 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span
                                class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">Berita</span>
                            <span class="text-xs text-gray-500">10 Nov 2023</span>
                        </div>
                        <h3 class="font-bold text-lg mb-2 text-gray-800">Ikuti Kemah Budaya Kaum Muda 2023,
                            Mahasiswa Informatika Unimal Kembangkan Situs Penerjemah Bahasa Daerah</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Haris Yunanda Rangkuti, mahasiswa Program Studi Teknik Informatika, Fakultas Teknik,
                            Universitas Malikussaleh menjadi ...
                        </p>
                        <a href="#"
                            class="text-green-600 hover:text-green-800 text-sm font-semibold flex items-center justify-end">
                            Baca selengkapnya
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Card Berita 3 (Sama untuk contoh) --}}
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="bg-gray-200 h-48 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span
                                class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">Berita</span>
                            <span class="text-xs text-gray-500">10 Nov 2023</span>
                        </div>
                        <h3 class="font-bold text-lg mb-2 text-gray-800">Ikuti Kemah Budaya Kaum Muda 2023,
                            Mahasiswa Informatika Unimal Kembangkan Situs Penerjemah Bahasa Daerah</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Haris Yunanda Rangkuti, mahasiswa Program Studi Teknik Informatika, Fakultas Teknik,
                            Universitas Malikussaleh menjadi ...
                        </p>
                        <a href="#"
                            class="text-green-600 hover:text-green-800 text-sm font-semibold flex items-center justify-end">
                            Baca selengkapnya
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            </div>

        </section>

        {{-- Laporan Pengaduan --}}
        <section class="container mx-auto px-10 mt-16">

            <h2 class="text-3xl font-bold text-gray-800 mb-8">Laporan Pengaduan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                {{-- Card Laporan 1 --}}
                <div class="bg-white rounded-lg shadow-md p-8 text-center">
                    <p class="text-7xl font-bold text-gray-800 mb-2">123</p>
                    <h3 class="text-xl font-semibold text-gray-700">Jumlah Laporan</h3>
                    <p class="text-gray-500 mt-1 mb-6">Total seluruh pengaduan yang telah diterima sistem.</p>
                    <a href="#"
                        class="bg-green-400 text-white font-bold py-3 px-8 rounded-lg hover:bg-green-500 transition-colors duration-300">
                        Lihat Sekarang
                    </a>
                </div>

                {{-- Card Laporan 2 (Sama untuk contoh) --}}
                <div class="bg-white rounded-lg shadow-md p-8 text-center">
                    <p class="text-7xl font-bold text-gray-800 mb-2">123</p>
                    <h3 class="text-xl font-semibold text-gray-700">Jumlah Laporan</h3>
                    <p class="text-gray-500 mt-1 mb-6">Total seluruh pengaduan yang telah diterima sistem.</p>
                    <a href="#"
                        class="bg-green-400 text-white font-bold py-3 px-8 rounded-lg hover:bg-green-500 transition-colors duration-300">
                        Lihat Sekarang
                    </a>
                </div>

                {{-- Card Laporan 3 (Sama untuk contoh) --}}
                <div class="bg-white rounded-lg shadow-md p-8 text-center">
                    <p class="text-7xl font-bold text-gray-800 mb-2">123</p>
                    <h3 class="text-xl font-semibold text-gray-700">Jumlah Laporan</h3>
                    <p class="text-gray-500 mt-1 mb-6">Total seluruh pengaduan yang telah diterima sistem.</p>
                    <a href="#"
                        class="bg-green-400 text-white font-bold py-3 px-8 rounded-lg hover:bg-green-500 transition-colors duration-300">
                        Lihat Sekarang
                    </a>
                </div>

            </div>
        </section>

        {{-- Section Statistik & Laporan Terkini --}}


        {{-- Statistik Laporan Pengaduan --}}
        <section class="container mx-auto px-10 py-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Statistik Laporan pengaduan</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                {{-- Card Pie Chart --}}
                <div class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center">
                    {{-- Placeholder untuk Pie Chart --}}
                    {{-- Di aplikasi nyata, ini akan di-generate oleh library seperti Chart.js --}}
                    <div class="w-48 h-48 mb-4">
                        <svg viewBox="0 0 36 36" class="w-full h-full">
                            <path class="text-teal-400" fill="currentColor"
                                d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                stroke-dasharray="30, 100" />
                            <path class="text-yellow-400" fill="currentColor"
                                d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                stroke-dasharray="20, 100" stroke-dashoffset="-30" />
                            <path class="text-orange-400" fill="currentColor"
                                d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                stroke-dasharray="25, 100" stroke-dashoffset="-50" />
                            <path class="text-emerald-300" fill="currentColor"
                                d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                stroke-dasharray="25, 100" stroke-dashoffset="-75" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Jumlah Laporan</h3>
                    {{-- Legenda Chart --}}
                    <div class="flex space-x-6 text-sm text-gray-600">
                        <div class="flex items-center"><span class="w-3 h-3 bg-teal-400 rounded-full mr-2"></span>Q1
                            30%</div>
                        <div class="flex items-center"><span class="w-3 h-3 bg-yellow-400 rounded-full mr-2"></span>Q2
                            20%</div>
                        <div class="flex items-center"><span
                                class="w-3 h-3 bg-emerald-300 rounded-full mr-2"></span>Q3 25%</div>
                        <div class="flex items-center"><span class="w-3 h-3 bg-orange-400 rounded-full mr-2"></span>Q4
                            25%</div>
                    </div>
                </div>

                {{-- Card Bar Chart --}}
                <div class="bg-white rounded-xl shadow-md p-6">
                    {{-- Placeholder untuk Bar Chart --}}
                    <div class="w-full h-full flex flex-col justify-between">
                        <div class="flex-grow flex items-end space-x-4 px-4">
                            <div class="flex-1 text-center">
                                <div class="bg-teal-400 rounded-t-lg mx-auto" style="height: 80%; width: 50%;"><span
                                        class="font-bold text-white relative -top-6">80</span></div>
                            </div>
                            <div class="flex-1 text-center">
                                <div class="bg-yellow-400 rounded-t-lg mx-auto" style="height: 50%; width: 50%;"><span
                                        class="font-bold text-white relative -top-6">50</span></div>
                            </div>
                            <div class="flex-1 text-center">
                                <div class="bg-emerald-400 rounded-t-lg mx-auto" style="height: 70%; width: 50%;">
                                    <span class="font-bold text-white relative -top-6">70</span>
                                </div>
                            </div>
                            <div class="flex-1 text-center">
                                <div class="bg-orange-400 rounded-t-lg mx-auto" style="height: 30%; width: 50%;"><span
                                        class="font-bold text-white relative -top-6">30</span></div>
                            </div>
                        </div>
                        <div
                            class="border-t border-gray-200 mt-2 pt-2 flex justify-around text-sm font-semibold text-gray-500">
                            <span>Q1</span>
                            <span>Q2</span>
                            <span>Q3</span>
                            <span>Q4</span>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        {{-- Laporan Terkini --}}
        <section class="container mx-auto px-10 mt-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Laporan Terkini</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                {{-- Card Laporan 1 --}}
                <div x-data="{ modalOpen: false }" class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="{{ asset('images/proyektor-rusak.png') }}" alt="Proyektor Rusak"
                        class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-1 text-gray-900">Proyektor Rusak di Ruang 3 INF
                        </h3>
                        <p class="text-sm text-gray-500 mb-3">Gedung INF - Ruang 3</p>
                        <p class="text-gray-600 text-sm mb-4">
                            Saya melaporkan proyektor di ruang kuliah rusak dan tidak bisa digunakan.
                            Mohon segera diperbaiki.
                        </p>
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <p class="font-semibold text-gray-800">Gufran Fikriza</p>
                                <p class="text-sm text-gray-500">Teknik Informatika</p>
                            </div>
                            <button @click="modalOpen = true"
                                class="bg-green-100 text-green-800 font-semibold py-2 px-5 rounded-lg hover:bg-green-200 transition-colors">
                                Selengkapnya
                            </button>
                        </div>
                        <div class="border-t border-gray-100 pt-3 flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            69hari yang lalu 09:06:01
                        </div>
                    </div>

                    <div x-show="modalOpen" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60 p-4"
                        style="display: none;">

                        <div @click.away="modalOpen = false"
                            class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl mx-auto overflow-hidden">
                            <div class="p-8 text-center">
                                <h2 class="text-3xl font-bold text-gray-800">Detail Pengaduan</h2>
                                <p class="text-gray-500 mt-1">Pantau setiap perkembangan laporan Anda secara
                                    transparan.</p>
                            </div>

                            <div class="px-8 pb-8">
                                <div class="bg-slate-50 border border-slate-200 rounded-lg p-6">
                                    <div class="text-center mb-4">
                                        <p class="text-gray-600">ID Laporan: <span
                                                class="font-mono font-semibold">#2025-000123</span></p>
                                        <span
                                            class="mt-2 inline-block bg-orange-500 text-white text-sm font-bold px-4 py-1 rounded-full">Status
                                            Laporan : Prioritas</span>
                                    </div>

                                    <div class="grid grid-cols-3 gap-x-4 gap-y-2 text-sm">
                                        <strong class="col-span-1 text-gray-500">Subjek Laporan</strong>
                                        <p class="col-span-2 text-gray-800 font-semibold">Proyektor Rusak di Ruang INF
                                            303</p>
                                        <strong class="col-span-1 text-gray-500">Kategori</strong>
                                        <p class="col-span-2 text-gray-800">Fasilitas</p>
                                        <strong class="col-span-1 text-gray-500">Tanggal Dilaporkan</strong>
                                        <p class="col-span-2 text-gray-800">20 November 2026</p>
                                        <strong class="col-span-1 text-gray-500">Pelapor</strong>
                                        <p class="col-span-2 text-gray-800">Gufran Fikriza</p>
                                        <strong class="col-span-1 text-gray-500">Deskripsi Singkat</strong>
                                        <p class="col-span-2 text-gray-800">Proyektor di Ruang INF 303 Mati Total
                                            Sehingga Tidak Bisa Digunakan, Mohon Segera diperbaiki</p>
                                    </div>
                                </div>

                                {{-- Ganti bagian gambar di dalam modal Anda dengan ini --}}

                                {{-- <div class="mt-6 flex justify-center">
                                    <img src="{{ asset('images/proyektor-rusak.jpg') }}" alt="Bukti Laporan"
                                        class="w-full max-w-[600px] h-[300px] rounded-lg object-contain bg-gray-100 border border-gray-200">
                                </div> --}}

                                {{-- Kode setelahnya (tombol, dll) biarkan seperti semula --}}
                                <div class="flex items-center justify-center space-x-4 mt-8">
                                    <button
                                        class="bg-green-200 text-green-800 font-bold py-3 px-8 rounded-lg hover:bg-green-300 transition-colors">Berikan
                                        Ulasan</button>
                                    <button @click="modalOpen = false"
                                        class="bg-gray-200 text-gray-800 font-bold py-3 px-8 rounded-lg hover:bg-gray-300 transition-colors">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Ulangi struktur di atas untuk Card Laporan 2 dan seterusnya --}}
                <div x-data="{ modalOpen: false }" class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="{{ asset('images/proyektor-rusak.png') }}" alt="Proyektor Rusak"
                        class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-1 text-gray-900">Proyektor Rusak di Ruang 3 INF
                        </h3>
                        <p class="text-sm text-gray-500 mb-3">Gedung INF - Ruang 3</p>
                        <p class="text-gray-600 text-sm mb-4">
                            Saya melaporkan proyektor di ruang kuliah rusak dan tidak bisa digunakan.
                            Mohon segera diperbaiki.
                        </p>
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <p class="font-semibold text-gray-800">Gufran Fikriza</p>
                                <p class="text-sm text-gray-500">Teknik Informatika</p>
                            </div>
                            <button @click="modalOpen = true"
                                class="bg-green-100 text-green-800 font-semibold py-2 px-5 rounded-lg hover:bg-green-200 transition-colors">
                                Selengkapnya
                            </button>
                        </div>
                        <div class="border-t border-gray-100 pt-3 flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            69hari yang lalu 09:06:01
                        </div>
                    </div>

                    <div x-show="modalOpen" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60 p-4"
                        style="display: none;">

                        <div @click.away="modalOpen = false"
                            class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl mx-auto overflow-hidden">
                            <div class="p-8 text-center">
                                <h2 class="text-3xl font-bold text-gray-800">Detail Pengaduan</h2>
                                <p class="text-gray-500 mt-1">Pantau setiap perkembangan laporan Anda secara
                                    transparan.</p>
                            </div>

                            <div class="px-8 pb-8">
                                <div class="bg-slate-50 border border-slate-200 rounded-lg p-6">
                                    <div class="text-center mb-4">
                                        <p class="text-gray-600">ID Laporan: <span
                                                class="font-mono font-semibold">#2025-000123</span></p>
                                        <span
                                            class="mt-2 inline-block bg-orange-500 text-white text-sm font-bold px-4 py-1 rounded-full">Status
                                            Laporan : Prioritas</span>
                                    </div>

                                    <div class="grid grid-cols-3 gap-x-4 gap-y-2 text-sm">
                                        <strong class="col-span-1 text-gray-500">Subjek Laporan</strong>
                                        <p class="col-span-2 text-gray-800 font-semibold">Proyektor Rusak di Ruang INF
                                            303</p>
                                        <strong class="col-span-1 text-gray-500">Kategori</strong>
                                        <p class="col-span-2 text-gray-800">Fasilitas</p>
                                        <strong class="col-span-1 text-gray-500">Tanggal Dilaporkan</strong>
                                        <p class="col-span-2 text-gray-800">20 November 2026</p>
                                        <strong class="col-span-1 text-gray-500">Pelapor</strong>
                                        <p class="col-span-2 text-gray-800">Gufran Fikriza</p>
                                        <strong class="col-span-1 text-gray-500">Deskripsi Singkat</strong>
                                        <p class="col-span-2 text-gray-800">Proyektor di Ruang INF 303 Mati Total
                                            Sehingga Tidak Bisa Digunakan, Mohon Segera diperbaiki</p>
                                    </div>
                                </div>

                                {{-- Ganti bagian gambar di dalam modal Anda dengan ini --}}

                                {{-- <div class="mt-6 flex justify-center">
                                    <img src="{{ asset('images/proyektor-rusak.jpg') }}" alt="Bukti Laporan"
                                        class="w-full max-w-[600px] h-[300px] rounded-lg object-contain bg-gray-100 border border-gray-200">
                                </div> --}}

                                {{-- Kode setelahnya (tombol, dll) biarkan seperti semula --}}
                                <div class="flex items-center justify-center space-x-4 mt-8">
                                    <button
                                        class="bg-green-200 text-green-800 font-bold py-3 px-8 rounded-lg hover:bg-green-300 transition-colors">Berikan
                                        Ulasan</button>
                                    <button @click="modalOpen = false"
                                        class="bg-gray-200 text-gray-800 font-bold py-3 px-8 rounded-lg hover:bg-gray-300 transition-colors">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Pastikan setiap Card memiliki x-data-nya sendiri --}}

            </div>
        </section>

        {{-- akses lainnya --}}
        <section class="container mx-auto px-10 mt-16">
            <div class="bg-slate-50/50 pt-12 pb-20">
                <h2 class="text-3xl font-bold text-gray-800 mb-8">Akses Lainnya</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    <div
                        class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 flex flex-col items-center text-center">
                        <div class="bg-green-400/80 w-24 h-24 rounded-full flex items-center justify-center mb-5">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Status Pengaduan</h3>
                        <p class="text-gray-500 mb-6">Pantau proses tindak lanjut laporanmu di
                            sini!</p>
                        <a href="#"
                            class="w-full bg-emerald-800 text-white font-semibold py-3 px-6 rounded-lg hover:bg-emerald-700 transition-colors duration-300">
                            Lihat Proses
                        </a>
                    </div>

                    <div
                        class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 flex flex-col items-center text-center">
                        <div class="w-24 h-24 flex items-center justify-center mb-5">
                            <svg class="w-20 h-20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 10C3 6.68629 5.68629 4 9 4H15C18.3137 4 21 6.68629 21 10V14C21 17.3137 18.3137 20 15 20H9C5.68629 20 3 17.3137 3 14V10Z"
                                    stroke="#4A5568" stroke-width="1.5" />
                                <path d="M7 4V2.5" stroke="#4A5568" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M12 4V2.5" stroke="#4A5568" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M17 4V2.5" stroke="#4A5568" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M3 8H21" stroke="#6EE7B7" stroke-width="1.5" />
                                <path d="M8 12L11 15L13 13L16 16" stroke="#4A5568" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Informasi Akademik</h3>
                        <p class="text-gray-500 mb-6">Akses info penting prodi TI</p>
                        <a href="#"
                            class="w-full bg-emerald-800 text-white font-semibold py-3 px-6 rounded-lg hover:bg-emerald-700 transition-colors duration-300">
                            Lihat Sekarang
                        </a>
                    </div>
                </div>
            </div>
            </div>
        </section>

    </main>

    {{-- Memanggil Footer --}}
    @include('layout.footer')

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
