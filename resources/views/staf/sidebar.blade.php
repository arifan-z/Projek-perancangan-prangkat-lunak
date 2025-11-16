<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 w-64 bg-emerald-800 text-white flex flex-col p-6 transform transition-transform duration-300 md:relative md:translate-x-0 z-20">

    <button @click="sidebarOpen = false" class="absolute top-4 right-4 text-white md:hidden">
        <i class="fas fa-times text-xl"></i>
    </button>

    <div class="flex items-center space-x-3 mb-12">
        <img src="{{ asset('images/logo_unimal_putih.png') }}" alt="Logo Unimal" class="h-20 w-15">
        <div>
            <p class="font-bold text-sm">Universitas Malikussaleh</p>
            <p class="text-xs text-gray-300">Sistem Informasi Pengaduan</p>
        </div>
    </div>

    <nav class="flex-grow space-y-2">
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center px-4 py-3 rounded-lg {{ request()->is('admin/dashboard') ? 'bg-emerald-700' : 'hover:bg-white/10' }}">
            <i class="fas fa-tachometer-alt w-6 mr-3"></i> Dashboard
        </a>
        <a href=""
            class="flex items-center px-4 py-3 rounded-lg {{ request()->is('admin/laporan') ? 'bg-emerald-700' : 'hover:bg-white/10' }}">
            <i class="fas fa-file-alt w-6 mr-3"></i> Laporan
        </a>
        <a href="{{ route('profile.show') }}"
            class="flex items-center px-4 py-3 rounded-lg {{ request()->is('admin/profile') ? 'bg-emerald-700' : 'hover:bg-white/10' }}">
            <i class="fas fa-user w-6 mr-3"></i> Profil
        </a>
    </nav>

    <div class="mt-auto">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="flex items-center w-full px-4 py-3 text-gray-200 hover:bg-red-500/80 rounded-lg transition-colors duration-200">
                <i class="fas fa-sign-out-alt w-6 mr-3"></i>
                <span>Log Keluar</span>
            </button>
        </form>
    </div>
</aside>
