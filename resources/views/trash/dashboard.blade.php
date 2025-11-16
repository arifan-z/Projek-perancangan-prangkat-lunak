<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Informasi Pengaduan</title>
    {{-- Pastikan Anda sudah meng-import file CSS dari Vite --}}
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-unimal-dark-green text-white flex flex-col p-6">
            <div class="flex items-center space-x-3 mb-10">
                {{-- Ganti src dengan path logo Anda --}}
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/Logo_Universitas_Malikussaleh.png/783px-Logo_Universitas_Malikussaleh.png"
                    alt="Logo Unimal" class="h-12 w-auto">
                <div>
                    <p class="font-bold text-sm">Universitas Malikussaleh</p>
                    <p class="text-xs text-gray-300">Sistem Informasi Pengaduan</p>
                </div>
            </div>

            <nav class="flex-grow">
                <ul>
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center px-4 py-3 bg-unimal-medium-green rounded-lg font-bold">
                            Dashboard
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="#"
                            class="flex items-center px-4 py-3 hover:bg-unimal-medium-green/50 rounded-lg transition-colors duration-200">
                            Laporan
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="#"
                            class="flex items-center px-4 py-3 hover:bg-unimal-medium-green/50 rounded-lg transition-colors duration-200">
                            QnA
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="flex-1 p-8">
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Selamat Datang {{ Auth::user()->name }}!</h1>
                <p class="text-gray-500">Berikut adalah Dasbord anda</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                <div class="lg:col-span-2 bg-white rounded-xl shadow-md p-6 flex items-center justify-between"
                    style="background-image: url('https://images.unsplash.com/photo-1554224155-1696413565d3?q=80&w=2940&auto=format&fit=crop'); background-size: cover; background-position: center;">
                    <div class="bg-white/80 backdrop-blur-sm p-4 rounded-lg">
                        <h2 class="text-xl font-bold text-unimal-dark-green">Sampaikan Pengaduan dengan Mudah dan Aman
                        </h2>
                        <a href="#"
                            class="inline-block mt-4 px-6 py-2 border-2 border-unimal-medium-green text-unimal-medium-green font-semibold rounded-full hover:bg-unimal-medium-green hover:text-white transition-colors duration-300">
                            Laporkan segera
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center justify-center text-center">
                    <div class="text-3xl text-unimal-dark-green mb-2">ⓘ</div>
                    <h3 class="font-bold text-gray-800">Informasi Akademik</h3>
                    <p class="text-sm text-gray-500 mb-4">Lihat informasi terbaru dari kampus.</p>
                    <a href="#"
                        class="w-full mt-auto px-4 py-2 bg-unimal-dark-green text-white font-semibold rounded-full hover:bg-unimal-medium-green transition-colors duration-200">
                        Lihat
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-unimal-dark-green text-white rounded-xl shadow-md p-6">
                    <h3 class="font-bold text-lg">Buat laporan baru</h3>
                    <p class="text-sm text-gray-300 mb-4">Buat laporan anda, dan laporkan!</p>
                    <a href="#"
                        class="inline-block px-8 py-2 bg-white text-unimal-dark-green font-semibold rounded-full hover:bg-gray-200 transition-colors duration-200">
                        Lapor
                    </a>
                </div>
                <div class="bg-yellow-400 text-yellow-900 rounded-xl shadow-md p-6">
                    <h3 class="font-bold text-lg">Cek Status</h3>
                    <p class="text-sm text-yellow-800 mb-4">Cek laporan anda, dan laporkan!</p>
                    <a href="#"
                        class="inline-block px-8 py-2 bg-white text-yellow-800 font-semibold rounded-full hover:bg-gray-200 transition-colors duration-200">
                        Lapor
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="font-bold text-gray-800 mb-4">Statistik Laporan</h3>
                    <div class="h-64 bg-gray-200 rounded flex items-center justify-center">
                        <p class="text-gray-500">Tempat untuk Chart Laporan</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="font-bold text-gray-800 mb-4">Statistik Laporan seluruh</h3>
                    <div class="h-64 bg-gray-200 rounded flex items-center justify-center">
                        <p class="text-gray-500">Tempat untuk Chart Laporan Maya</p>
                    </div>
                </div>
            </div>

        </main>
    </div>

</body>

</html>
