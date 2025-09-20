<header class="bg-white shadow text-gray-800 py-3">
    <div class="container mx-auto flex justify-between items-center px-4">
        <!-- Logo + Judul -->
        <div class="flex items-center">
            <a href="{{ route('beranda') }}">
                <img src="{{ asset('images/logo_upt.png') }}" class="h-12 px-3" alt="upt bahasa">
            </a>
            <div>
                <h1 class="font-bold text-black">UPT Bahasa, Kehumasan, dan Penerbitan</h1>
                <h2 class="font-semibold">Universitas Malikussaleh</h2>
            </div>
        </div>

        <!-- Menu Navigasi -->
        <nav class="flex items-center space-x-6">
            <a href="{{ route('beranda') }}" class="text-blue-900">Beranda</a>
            <a href="{{ route('about') }}" class="text-blue-900">Tentang</a>

            <!-- Tombol ganti bahasa -->
            <div class="flex space-x-2">
                <a href="{{ route('lang.switch', 'id') }}"
                    class="px-2 py-1 border rounded {{ session('locale') === 'id' ? 'bg-blue-900 text-white' : '' }}">
                    🇮🇩 ID
                </a>
                <a href="{{ route('lang.switch', 'en') }}"
                    class="px-2 py-1 border rounded {{ session('locale') === 'en' ? 'bg-blue-900 text-white' : '' }}">
                    🇬🇧 EN
                </a>
            </div>
        </nav>
    </div>
</header>
