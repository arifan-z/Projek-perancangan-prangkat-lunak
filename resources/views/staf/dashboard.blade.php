@extends('admin.template')

@section('title', 'Profil Saya')

@section('content')

    <!-- ========== KONTEN UTAMA ========== -->


    <main class="p-6 md:p-8">
        {{-- Header Konten --}}

        <div class="mb-8 flex justify-between items-center">
            {{-- Bagian Kiri: Teks Sambutan --}}
            <div>
                {{-- <h1 class="text-2xl font-bold text-gray-800">
                    Selamat datang !</h1> --}}
                {{-- <p class="text-gray-500 mt-1">Berikut adalah ringkasan aktivitas pengaduan Anda.</p> --}}
            </div>

            {{-- Bagian Kanan: Foto Profil --}}
            <a href="profile">
                <div class="flex items-center">
                    <h1 class="text-xl px-2 font-bold text-gray-800">
                        {{ Auth::user()->name ?? 'Pengguna' }}</h1>
                    <img class="h-14 w-14 rounded-full object-cover border-2 border-white shadow-md"
                        src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name ?? 'User') . '&color=7F9CF5&background=EBF4FF' }}"
                        alt="{{ Auth::user()->name ?? 'User' }}">
                </div>
            </a>
        </div>

        {{-- Grid Utama --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Kartu Banner Utama --}}
            <div class="lg:col-span-3 rounded-xl shadow-lg p-6 flex items-center bg-cover bg-center"
                style="background-image: url('https://images.unsplash.com/photo-1554224155-1696413565d3?q=80&w=2940&auto=format&fit=crop');">
                <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 max-w-4xl mx-auto">

                    {{-- <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 max-w-4xl mx-auto"> --}}
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

            {{-- Kartu Informasi Akademik --}}
            <div class="bg-white rounded-xl shadow-lg p-6 ">
                <h3 class="text-lg font-bold text-gray-800">Informasi Akademik</h3>
                <p class="text-sm text-gray-500 mb-4 flex-grow">Lihat pengumuman, jadwal, dan informasi terbaru
                    dari kampus.</p>
                <a href="#"
                    class="inline-block px-8 py-2 bg-[#004d40] text-white font-semibold rounded-full hover:bg-[#00796b] transition-colors duration-200">
                    Lihat Informasi
                </a>
            </div>

            {{-- Kartu Aksi: Lapor & Cek Status --}}
            <div class="bg-[#004d40] text-white rounded-xl shadow-lg p-6">
                <h3 class="font-bold text-lg">Buat Laporan Baru</h3>
                <p class="text-sm text-gray-300 mb-4">Laporkan keluhan atau masukan Anda di sini.</p>
                <a href="#"
                    class="inline-block px-8 py-2 bg-white text-[#004d40] font-semibold rounded-full hover:bg-gray-200 transition-colors duration-200">
                    Lapor
                </a>
            </div>

            <div class="bg-yellow-400 text-yellow-900 rounded-xl shadow-lg p-6">
                <h3 class="font-bold text-lg">Cek Status Laporan</h3>
                <p class="text-sm text-yellow-800 mb-4">Pantau perkembangan laporan yang telah Anda buat.</p>
                <a href="#"
                    class="inline-block px-8 py-2 bg-white text-yellow-800 font-semibold rounded-full hover:bg-gray-200 transition-colors duration-200">
                    Cek Status
                </a>
            </div>

            {{-- Placeholder untuk Statistik --}}
            <div class="bg-white rounded-xl shadow-lg p-6 lg:col-span-3">
                <h3 class="font-bold text-gray-800 mb-4">Statistik Laporan Anda</h3>
                <div class="h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                    <p class="text-gray-500">[Tempat untuk Chart Laporan]</p>
                </div>
            </div>

        </div>
    </main>
    </div>
@endsection
