<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <link href="styles.css" rel="stylesheet" />
    <!-- titel di bagian atas -->
    <title>
        UPT Bahasa, Kehumasan, dan Penerbitan Universitas Malikussaleh
    </title>
    @include('layout.header')
</head>

<section class="container mx-auto px-10 mt-16">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Laporan Terkini</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        {{-- Card Laporan 1 --}}
        <div x-data="{ modalOpen: false }" class="bg-white rounded-xl shadow-md overflow-hidden">
            <img src="{{ asset('images/proyektor-rusak.png') }}" alt="Proyektor Rusak" class="w-full h-56 object-cover">
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
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90"
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
            <img src="{{ asset('images/proyektor-rusak.png') }}" alt="Proyektor Rusak" class="w-full h-56 object-cover">
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
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90"
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
</body>
@include('layout.footer')

</html>
