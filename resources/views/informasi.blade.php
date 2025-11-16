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

        <section class="relative h-[60vh] max-h-[500px] bg-cover bg-center"
            style="background-image: url('{{ asset('images/unimal1.png') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div
                class="container mx-auto px-6 relative z-10 flex flex-col justify-center items-center h-full text-center text-white">
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold leading-tight">
                    Dapatkan Informasi Akademik Cepat & Terpercaya
                </h1>
                <p class="mt-4 text-base sm:text-lg text-gray-200 max-w-2xl">
                    Pantau info KRS, dan jadwal akademik dengan cepat dan mudah.
                </p>
            </div>
        </section>

        <div class="bg-slate-100 py-16">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

                    <div class="lg:col-span-2">
                        <h2 class="text-3xl font-bold text-gray-800 mb-8">Papan Pengumuman Akademik</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 flex flex-col">
                                <div class="flex items-center mb-3">
                                    <svg class="w-6 h-6 text-yellow-600 mr-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                        </path>
                                    </svg>
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-bold px-3 py-1 rounded-full">PENTING</span>
                                </div>
                                <h3 class="font-bold text-lg text-gray-800 flex-grow">Jadwal Pengisian KRS Manual
                                    Semester Ganjil 2025/2026</h3>
                                <div class="flex justify-between items-center mt-4">
                                    <p class="text-sm text-gray-500">03/06/2025</p>
                                    <a href="#"
                                        class="text-sm font-semibold bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg transition">Lihat
                                        Detail</a>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 flex flex-col">
                                <div class="flex items-center mb-3">
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-bold px-3 py-1 rounded-full">PENTING</span>
                                </div>
                                <h3 class="font-bold text-lg text-gray-800 flex-grow">Perubahan Kurikulum Baru Tahun
                                    Ajaran 2027/2028</h3>
                                <div class="flex justify-between items-center mt-4">
                                    <p class="text-sm text-gray-500">06/09/2027</p>
                                    <a href="#"
                                        class="text-sm font-semibold bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg transition">Lihat
                                        Detail</a>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 flex flex-col">
                                <div class="flex items-center mb-3">
                                    <svg class="w-6 h-6 text-green-600 mr-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full">DOKUMEN</span>
                                </div>
                                <h3 class="font-bold text-lg text-gray-800 flex-grow">Prosedur Pengajuan Surat
                                    Keterangan Aktif Kuliah</h3>
                                <div class="flex justify-between items-center mt-4">
                                    <p class="text-sm text-gray-500">Teknik Informatika</p>
                                    <a href="#"
                                        class="text-sm font-semibold bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg transition">Lihat
                                        Detail</a>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 flex flex-col">
                                <div class="flex items-center mb-3">
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full">DOKUMEN</span>
                                </div>
                                <h3 class="font-bold text-lg text-gray-800 flex-grow">Formulir Pengajuan dan Pendaftaran
                                    Wisuda Mahasiswa</h3>
                                <div class="flex justify-between items-center mt-4">
                                    <p class="text-sm text-gray-500">Teknik Informatika</p>
                                    <a href="#"
                                        class="text-sm font-semibold bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg transition">Lihat
                                        Detail</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- kalender --}}
                    <div class="lg:col-span-1">
                        <h2 class="text-3xl font-bold text-gray-800 mb-8">Kalender Akademik</h2>
                        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                            <div class="flex items-center justify-between mb-4">
                                <button class="p-1 rounded-full hover:bg-gray-100"><svg class="w-5 h-5 text-gray-600"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7"></path>
                                    </svg></button>
                                <h4 class="font-bold text-gray-800">Oktober 2024</h4>
                                <button class="p-1 rounded-full hover:bg-gray-100"><svg class="w-5 h-5 text-gray-600"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg></button>
                            </div>
                            <div class="grid grid-cols-7 gap-2 text-center text-sm">
                                <div class="text-gray-500 font-semibold">Sen</div>
                                <div class="text-gray-500 font-semibold">Sel</div>
                                <div class="text-gray-500 font-semibold">Rab</div>
                                <div class="text-gray-500 font-semibold">Kam</div>
                                <div class="text-gray-500 font-semibold">Jum</div>
                                <div class="text-gray-500 font-semibold">Sab</div>
                                <div class="text-gray-500 font-semibold">Min</div>
                                <div class="text-gray-400">30</div>
                                <div class="text-gray-800">1</div>
                                <div class="text-gray-800">2</div>
                                <div class="text-gray-800">3</div>
                                <div class="text-gray-800">4</div>
                                <div class="text-gray-800">5</div>
                                <div class="text-gray-800">6</div>
                                <div class="text-gray-800">7</div>
                                <div class="text-gray-800">8</div>
                                <div class="text-gray-800">9</div>
                                <div class="text-blue-600 font-bold">10</div>
                                <div class="text-blue-600 font-bold">11</div>
                                <div class="text-gray-800">12</div>
                                <div class="text-gray-800">13</div>
                                <div class="text-gray-800">14</div>
                                <div class="text-gray-800">15</div>
                                <div class="text-gray-800">16</div>
                                <div class="text-gray-800">17</div>
                                <div
                                    class="bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center mx-auto">
                                    18</div>
                                <div class="text-gray-800">19</div>
                                <div class="text-gray-800">20</div>
                                <div class="text-gray-800">21</div>
                                <div class="text-gray-800">22</div>
                                <div class="text-gray-800">23</div>
                                <div class="text-gray-800">24</div>
                                <div class="text-gray-800">25</div>
                                <div class="text-gray-800">26</div>
                                <div class="text-gray-800">27</div>
                                <div class="text-gray-800">28</div>
                                <div class="text-gray-800">29</div>
                                <div class="text-gray-800">30</div>
                                <div class="text-blue-600 font-bold">31</div>
                            </div>
                            <div class="mt-4 pt-4 border-t text-xs text-gray-500">
                                <p class="font-bold mb-1">Legenda</p>
                                <div class="flex items-center mb-1"><span
                                        class="w-2 h-2 bg-blue-600 rounded-full mr-2"></span> Batas Akhir Pembayaran
                                    UKT</div>
                                <div class="flex items-center"><span
                                        class="w-2 h-2 bg-transparent border border-blue-600 rounded-full mr-2"></span>
                                    Batas Akhir Pengisian KRS</div>
                            </div>
                        </div>
                        <div class="mt-8 text-sm text-center text-gray-600 bg-white p-4 rounded-lg shadow-sm border">
                            Untuk informasi lebih lanjut, hubungi: <br>
                            <strong class="text-gray-800">0833-6633-3399 atau 0815-1551-5115.</strong>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </main>

    {{-- Memanggil Footer --}}
    @include('layout.footer')

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
