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
                    {{-- ================= INFORMASI AKADEMIK ================= --}}
                    <div class="lg:col-span-2">
                        <h2 class="text-3xl font-bold text-gray-800 mb-8">Papan Pengumuman Akademik</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                            @forelse ($informasi as $info)
                                <div class="bg-white p-6 rounded-lg shadow-sm border flex flex-col">

                                    {{-- LABEL --}}
                                    <div class="mb-3">
                                        <span
                                            class="px-3 py-1 text-xs font-bold rounded-full
                                            {{ $info->jenis == 'PENTING' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                            {{ $info->jenis }}
                                        </span>
                                    </div>

                                    {{-- JUDUL --}}
                                    <h3 class="font-bold text-lg flex-grow">
                                        {{ Str::limit($info->judul, 80) }}
                                    </h3>
                                    <p class="text-gray-600 text-sm mt-2">
                                        {{ Str::limit($info->isi, 120) }}
                                    </p>

                                    <div class="flex justify-between items-center mt-4">
                                        <p class="text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($info->tanggal_kirim)->format('d/m/Y') }}
                                        </p>

                                        <button onclick="openInfoModal({{ $info->id }})"
                                            class="text-sm font-semibold bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg transition">
                                            Lihat Detail
                                        </button>
                                    </div>

                                </div>
                            @empty
                                <p class="text-gray-600">Belum ada pengumuman akademik.</p>
                            @endforelse

                        </div>
                    </div>

                    {{-- KALENDER --}}
                    <div class="lg:col-span-1">
                        <h2 class="text-3xl font-bold text-gray-800 mb-8">Kalender Akademik</h2>

                        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                            <div class="flex items-center justify-between mb-4">
                                <button class="p-1 rounded-full hover:bg-gray-100">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </button>
                                <h4 class="font-bold text-gray-800">Oktober 2024</h4>
                                <button class="p-1 rounded-full hover:bg-gray-100">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            </div>

                            {{-- kalender isi --}}
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
                                    18
                                </div>

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
                                <div class="flex items-center mb-1">
                                    <span class="w-2 h-2 bg-blue-600 rounded-full mr-2"></span> Batas Akhir Pembayaran
                                    UKT
                                </div>
                                <div class="flex items-center">
                                    <span
                                        class="w-2 h-2 bg-transparent border border-blue-600 rounded-full mr-2"></span>
                                    Batas Akhir Pengisian KRS
                                </div>
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
        <!-- ===================== MODAL ===================== -->
        <div id="infoModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">

            <div class="bg-white w-full max-w-xl rounded-lg p-6 shadow-lg relative">

                <button onclick="closeInfoModal()"
                    class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 text-xl">
                    ✕
                </button>

                <img id="modalGambar" class="w-full h-56 object-cover rounded mb-4 hidden">

                <h2 id="modalJudul" class="text-xl font-bold text-gray-800 mb-2"></h2>

                <span id="modalJenis" class="inline-block text-xs font-semibold px-3  rounded-full mb-3"></span>

                <p id="modalIsi" class="text-gray-700 leading-relaxed whitespace-pre-line py-1 mb-2"></p>
                <p id="modalTanggal" class="text-sm text-gray-500 mb-4"></p>


            </div>
        </div>

    </main>

    {{-- FOOTER --}}
    @include('layout.footer')

    <!-- ===================== SCRIPT ===================== -->
    <script>
        function openInfoModal(id) {
            fetch(`/informasi/${id}`)
                .then(res => res.json())
                .then(data => {

                    // Gambar
                    let img = document.getElementById('modalGambar');
                    if (data.gambar) {
                        img.src = `/uploads/informasi/${data.gambar}`;
                        img.classList.remove('hidden');
                    } else {
                        img.classList.add('hidden');
                    }

                    // Judul
                    document.getElementById('modalJudul').textContent = data.judul;

                    // Jenis
                    let jenis = document.getElementById('modalJenis');
                    jenis.textContent = data.jenis;

                    if (data.jenis === 'PENTING') {
                        jenis.className =
                            "inline-block bg-yellow-100 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full mb-3";
                    } else {
                        jenis.className =
                            "inline-block bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full mb-3";
                    }

                    // Tanggal
                    document.getElementById('modalTanggal').textContent =
                        new Date(data.tanggal_kirim).toLocaleDateString('id-ID');

                    // Isi
                    document.getElementById('modalIsi').innerHTML = data.isi.replace(/\n/g, "<br>");

                    // Tampilkan modal
                    document.getElementById('infoModal').classList.remove('hidden');
                })
                .catch(err => console.error(err));
        }

        function closeInfoModal() {
            document.getElementById('infoModal').classList.add('hidden');
        }
    </script>

</body>

</html>
