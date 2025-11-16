@extends('user.template')

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
                <div class="bg-white/80 backdrop-blur-sm p-6 rounded-lg">
                    <h2 class="text-2xl font-bold text-[#004d40]">Sampaikan Pengaduan dengan Mudah dan Aman</h2>
                    <p class="text-gray-600 mt-2">Suara Anda penting untuk perbaikan layanan kami. Laporkan
                        sekarang.</p>
                    <a href="#"
                        class="inline-block mt-4 px-6 py-2 border-2 border-[#00796b] text-[#00796b] font-semibold rounded-full hover:bg-[#00796b] hover:text-white transition-colors duration-300">
                        Laporkan Segera
                    </a>
                </div>
            </div>

            {{-- Kartu Informasi Akademik --}}
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col text-center">
                <div class="text-5xl text-[#004d40] mb-3"><i class="fas fa-info-circle"></i></div>
                <h3 class="text-lg font-bold text-gray-800">Informasi Akademik</h3>
                <p class="text-sm text-gray-500 mb-4 flex-grow">Lihat pengumuman, jadwal, dan informasi terbaru
                    dari kampus.</p>
                <a href="#"
                    class="w-full mt-auto px-4 py-2 bg-[#004d40] text-white font-semibold rounded-full hover:bg-[#00796b] transition-colors duration-200">
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
