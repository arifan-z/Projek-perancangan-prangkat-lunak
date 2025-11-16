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

                {{-- Di aplikasi nyata, Anda akan menggunakan @foreach loop di sini --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div
                        class="relative bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <div class="absolute left-0 top-0 bottom-0 w-2 bg-blue-500"></div>
                        <div class="pl-8 pr-6 py-6">
                            <div class="flex justify-between items-start">
                                <p class="text-sm text-gray-500">ID Laporan: <span
                                        class="font-semibold text-gray-700">#2025-000123</span></p>
                                <span
                                    class="text-xs font-bold px-3 py-1 bg-blue-100 text-blue-800 rounded-full">Baru</span>
                            </div>
                            <h3 class="font-bold text-lg text-gray-900 mt-2">Gangguan Internet Ruang 4 INF</h3>
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-sm text-gray-500">Tanggal Diajukan: 27 April 2025</p>
                                <a href="#"
                                    class="text-sm font-medium bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg transition">Lihat
                                    Detail</a>
                            </div>
                        </div>
                    </div>

                    <div
                        class="relative bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <div class="absolute left-0 top-0 bottom-0 w-2 bg-yellow-500"></div>
                        <div class="pl-8 pr-6 py-6">
                            <div class="flex justify-between items-start">
                                <p class="text-sm text-gray-500">ID Laporan: <span
                                        class="font-semibold text-gray-700">#2025-000124</span></p>
                                <span
                                    class="text-xs font-bold px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full">Diproses</span>
                            </div>
                            <h3 class="font-bold text-lg text-gray-900 mt-2">Pintu Kamar Mandi Rusak Gedung Informatika
                            </h3>
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-sm text-gray-500">Tanggal Diajukan: 27 Juli 2025</p>
                                <a href="#"
                                    class="text-sm font-medium bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg transition">Lihat
                                    Detail</a>
                            </div>
                        </div>
                    </div>

                    <div
                        class="relative bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <div class="absolute left-0 top-0 bottom-0 w-2 bg-red-500"></div>
                        <div class="pl-8 pr-6 py-6">
                            <div class="flex justify-between items-start">
                                <p class="text-sm text-gray-500">ID Laporan: <span
                                        class="font-semibold text-gray-700">#2025-000123</span></p>
                                <span
                                    class="text-xs font-bold px-3 py-1 bg-red-100 text-red-800 rounded-full">Prioritas</span>
                            </div>
                            <h3 class="font-bold text-lg text-gray-900 mt-2">Gangguan Internet Ruang 4 INF</h3>
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-sm text-gray-500">Tanggal Diajukan: 27 April 2025</p>
                                <a href="#"
                                    class="text-sm font-medium bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg transition">Lihat
                                    Detail</a>
                            </div>
                        </div>
                    </div>

                    <div
                        class="relative bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <div class="absolute left-0 top-0 bottom-0 w-2 bg-gray-500"></div>
                        <div class="pl-8 pr-6 py-6">
                            <div class="flex justify-between items-start">
                                <p class="text-sm text-gray-500">ID Laporan: <span
                                        class="font-semibold text-gray-700">#2025-000123</span></p>
                                <span
                                    class="text-xs font-bold px-3 py-1 bg-gray-200 text-gray-800 rounded-full">Selesai</span>
                            </div>
                            <h3 class="font-bold text-lg text-gray-900 mt-2">Gangguan Internet Ruang 4 INF</h3>
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-sm text-gray-500">Tanggal Diajukan: 27 April 2025</p>
                                <a href="#"
                                    class="text-sm font-medium bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg transition">Lihat
                                    Detail</a>
                            </div>
                        </div>
                    </div>

                    {{-- Tambahkan lebih banyak card laporan di sini --}}
                </div>
            </div>
        </div>
    </main>

    {{-- Memanggil Footer --}}
    @include('layout.footer')

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
