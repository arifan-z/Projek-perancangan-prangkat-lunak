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
        <section class="bg-slate-100 flex items-center justify-center min-h-screen p-4">
            <div
                class="w-full max-w-4xl bg-white rounded-2xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">

                {{-- Sisi Kiri (Info + Register) --}}
                <div class="bg-emerald-800 text-white p-8 md:p-12 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-8">
                            <h1 class="text-3xl font-bold">Sistem Informasi Unimal</h1>
                            <div class="bg-white/30 w-8 h-8 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="bg-white/90 text-gray-800 p-6 rounded-xl text-sm min-h-[150px]">
                            <p>Akses layanan pengaduan kampus untuk mengirim laporan, memantau status, dan melihat
                                pembaruan
                                terbaru.</p>
                        </div>
                    </div>
                    <a href="{{ route('register.form') }}"
                        class="w-full mt-8 bg-emerald-300 text-emerald-900 font-bold text-center py-3 px-6 rounded-xl hover:bg-emerald-400 transition-colors duration-300">
                        Register
                    </a>
                </div>

                {{-- Sisi Kanan (Form Login) --}}
                <div class="p-8 md:p-12">
                    <h2 class="text-4xl font-bold text-emerald-800 mb-8">Login</h2>

                    {{-- Tampilkan error login jika ada --}}
                    @if (session('error'))
                        <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Form login manual --}}
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-5">
                            <label for="login" class="block mb-2 text-sm font-semibold text-gray-600">Username atau
                                Email</label>
                            <input type="text" id="login" name="login" required
                                class="w-full bg-slate-100 border border-slate-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-emerald-500"
                                placeholder="Masukkan username atau email">
                        </div>
                        <div class="mb-5">
                            <label for="password"
                                class="block mb-2 text-sm font-semibold text-gray-600">Password</label>
                            <input type="password" id="password" name="password" required
                                class="w-full bg-slate-100 border border-slate-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-emerald-500"
                                placeholder="Masukkan password">
                        </div>

                        <div class="text-right mb-6">
                            <a href="#" class="text-sm text-gray-500 hover:text-emerald-700">Lupa kata sandi?</a>
                        </div>

                        <button type="submit"
                            class="w-full bg-emerald-800 text-white font-bold py-3 px-6 rounded-xl hover:bg-emerald-700 transition-colors duration-300">
                            Masuk
                        </button>
                    </form>


                    <div class="text-center text-gray-400 my-4 text-xs">
                        atau
                    </div>

                    <a href="{{ route('google.redirect') }}"
                        class="w-full border border-slate-300 py-2.5 rounded-xl flex items-center justify-center text-sm text-slate-700 hover:bg-slate-50 transition-colors">
                        <svg class="w-5 h-5 mr-3" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M44.5 24.3c0-1.5-.1-2.9-.4-4.3H24v8.5h11.5c-.5 2.8-2 5.2-4.2 6.8v5.5h7.1c4.2-3.8 6.6-9.4 6.6-16.5z"
                                fill="#4285F4" />
                            <path
                                d="M24 48c6.5 0 12-2.1 16-5.7l-7.1-5.5c-2.1 1.4-4.9 2.3-7.8 2.3-6 0-11.1-4-12.9-9.4H3.9v5.7C7.9 42.6 15.4 48 24 48z"
                                fill="#34A853" />
                            <path
                                d="M11.1 28.6c-.3-1-.5-2.1-.5-3.2s.2-2.2.5-3.2V16.5H3.9C2.2 19.6 1 23.2 1 27.2s1.2 7.6 3 10.7l7.2-5.3z"
                                fill="#FBBC05" />
                            <path
                                d="M24 9.5c3.5 0 6.7 1.2 9.2 3.6l6.3-6.3C36 2.1 30.5 0 24 0 15.4 0 7.9 5.4 3.9 13.5l7.2 5.7c1.8-5.4 6.9-9.7 12.9-9.7z"
                                fill="#EA4335" />
                        </svg>
                        Login dengan Google
                    </a>

                </div>
            </div>
        </section>
    </main>

    {{-- Memanggil Footer --}}
    @include('layout.footer')

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
