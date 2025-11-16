<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard - Sistem Informasi Pengaduan')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div x-data="{ sidebarOpen: false }" class="relative min-h-screen md:flex">

        {{-- Overlay untuk mobile --}}
        <div @click="sidebarOpen = false" x-show="sidebarOpen" class="fixed inset-0 bg-black/30 z-10 md:hidden"></div>

        {{-- Sidebar --}}
        @include('user.sidebar')

        {{-- Konten Utama --}}
        <div class="flex-1">
            {{-- Header Mobile --}}
            <header class="flex items-center justify-between p-4 bg-white shadow-sm md:hidden">
                <p class="font-bold text-lg">Dashboard</p>
                <button @click="sidebarOpen = true" class="text-gray-800">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </header>

            {{-- Isi konten halaman --}}
            <main class="p-6 md:p-8">
                @yield('content')
            </main>
        </div>
    </div>

</body>

</html>
