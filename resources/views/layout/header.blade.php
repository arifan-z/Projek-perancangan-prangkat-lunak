<header x-data="{ open: false }" class="bg-[#255431] shadow-md sticky top-0 z-50">
    <nav class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
            {{-- Logo dan Judul Situs --}}
            <div class="flex items-center">
                <img class="h-12 w-auto mr-3" src="{{ asset('images/Logo-Unimal-Aceh_Utara.png') }}" alt="Logo Unimal">
                <a class="text-white text-xl font-bold" href="/">
                    Sistem Informasi Pengaduan
                    <span class="block text-sm font-normal">Universitas Malikussaleh</span>
                </a>
            </div>

            {{-- Menu Navigasi Utama (Desktop) --}}
            <div class="hidden md:flex items-center space-x-1">
                <a href="/" class="text-white bg-green-900 py-2 px-4 rounded-md text-sm font-medium">Beranda</a>
                <a href="status"
                    class="text-gray-300 hover:bg-green-700 hover:text-white py-2 px-4 rounded-md text-sm font-medium">Status
                    Pengaduan</a>
                <a href="informasi"
                    class="text-gray-300 hover:bg-green-700 hover:text-white py-2 px-4 rounded-md text-sm font-medium">Informasi</a>
            </div>

            {{-- Ikon Aksi Pengguna (Desktop) --}}
            <div class="hidden md:flex items-center space-x-4">
                <a href="#" class="text-gray-300 hover:text-white" title="Login">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1m0-12v1"></path>
                    </svg>
                </a>
                <a href="#" class="text-gray-300 hover:text-white" title="Profil">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </a>
            </div>

            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="text-white focus:outline-none">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

        </div>

        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95" class="md:hidden mt-4" style="display: none;">
            <a href="/" class="block text-white bg-green-900 py-2 px-3 rounded-md">Beranda</a>
            <a href="status"
                class="block text-gray-300 hover:bg-green-700 hover:text-white py-2 px-3 rounded-md mt-1">Status
                Pengaduan</a>
            <a href="informasi"
                class="block text-gray-300 hover:bg-green-700 hover:text-white py-2 px-3 rounded-md mt-1">Informasi</a>

            <div class="border-t border-green-700 mt-3 pt-3">
                <a href="#"
                    class="flex items-center text-gray-300 hover:bg-green-700 hover:text-white py-2 px-3 rounded-md">
                    <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1m0-12v1"></path>
                    </svg>
                    Login
                </a>
                <a href="#"
                    class="flex items-center text-gray-300 hover:bg-green-700 hover:text-white py-2 px-3 rounded-md mt-1">
                    <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Profil
                </a>
            </div>
        </div>
    </nav>
</header>
