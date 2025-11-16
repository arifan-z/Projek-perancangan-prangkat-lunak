<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi & Pengaduan - Universitas Malikussaleh</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

    {{-- Header --}}
    @include('layout.header')

    <main>
        <section class="bg-slate-100 flex items-center justify-center min-h-screen p-4">
            <div
                class="w-full max-w-4xl bg-white rounded-2xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">

                {{-- Sisi Kiri (Form Register) --}}
                <div class="bg-emerald-800 text-white p-8 md:p-12 flex flex-col justify-between">
                    <div>
                        <h2 class="text-4xl font-bold mb-8">Register</h2>

                        {{-- Tampilkan error --}}
                        @if ($errors->any())
                            <div class="bg-red-200 text-red-800 p-3 rounded mb-4 text-sm">
                                <ul class="list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Tampilkan notifikasi sukses --}}
                        @if (session('success'))
                            <div class="bg-green-200 text-green-800 p-2 rounded mb-4 text-sm">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- Form Register --}}
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block mb-2 text-sm font-semibold text-white">Nama
                                    Lengkap</label>
                                <input type="text" id="name" name="name" required value="{{ old('name') }}"
                                    class="w-full bg-white border border-grey-700 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-emerald-400 text-black placeholder-grey-700"
                                    placeholder="Masukkan nama lengkap">
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block mb-2 text-sm font-semibold text-white">Email</label>
                                <input type="email" id="email" name="email" required value="{{ old('email') }}"
                                    class="w-full bg-white border border-grey-700 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-emerald-400 text-black placeholder-grey-700"
                                    placeholder="Masukkan email aktif">
                            </div>

                            <div class="mb-4">
                                <label for="password"
                                    class="block mb-2 text-sm font-semibold text-white">Password</label>
                                <input type="password" id="password" name="password" required
                                    class="w-full bg-white border border-grey-700 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-emerald-400 text-black placeholder-grey-700"
                                    placeholder="Masukkan password">
                            </div>

                            <div class="mb-6">
                                <label for="password_confirmation"
                                    class="block mb-2 text-sm font-semibold text-white">Konfirmasi
                                    Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" required
                                    class="w-full bg-white border border-grey-700 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-emerald-400 text-black placeholder-grey-700"
                                    placeholder="Ulangi password">
                            </div>

                            <button type="submit"
                                class="w-full bg-emerald-300 text-emerald-900 font-bold py-3 px-6 rounded-xl hover:bg-emerald-400 transition-colors duration-300">
                                Daftar
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Sisi Kanan (Info + Arah ke Login) --}}
                <div class="p-8 md:p-12 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-8">
                            <h1 class="text-3xl font-bold text-emerald-800">Sistem Informasi Unimal</h1>
                            <div class="bg-emerald-800/20 w-8 h-8 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-emerald-800" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="bg-slate-100 text-gray-800 p-6 rounded-xl text-sm min-h-[150px]">
                            <p>Akses layanan pengaduan kampus untuk mengirim laporan, memantau status, dan melihat
                                pembaruan terbaru.</p>
                        </div>
                    </div>

                    <a href="{{ route('login.form') }}"
                        class="w-full mt-8 bg-emerald-800 text-white font-bold text-center py-3 px-6 rounded-xl hover:bg-white transition-colors duration-300">
                        Sudah punya akun? Login
                    </a>
                </div>

            </div>
        </section>
    </main>

    @include('layout.footer')

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
