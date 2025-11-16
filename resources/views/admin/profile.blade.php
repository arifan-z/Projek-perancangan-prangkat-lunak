@extends('admin.template')

@section('title', 'Profil Saya')

@section('content')

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Profil Saya</h1>
        <p class="text-gray-500 mt-1">Urus maklumat akaun, profil, dan kata laluan anda.</p>
    </div>

    @if (session('status'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6" role="alert">
            <p class="font-bold">Berjaya!</p>
            <p>{{ session('status') }}</p>
        </div>
    @endif

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="space-y-8">

            {{-- Bagian Data Profil --}}
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-xl font-bold text-gray-800 border-b pb-4 mb-6">Maklumat Profil</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                    <div class="flex flex-col items-center">
                        <img class="h-24 w-24 rounded-full object-cover mb-4"
                            src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name ?? 'User') . '&color=7F9CF5&background=EBF4FF' }}"
                            alt="{{ $user->name }}">
                        <input type="file" name="avatar"
                            class="text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100" />
                        @error('avatar')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="md:col-span-2 space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Pengguna</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                                required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500">
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Alamat Emel</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                                required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500">
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bagian Ganti Password --}}
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-xl font-bold text-gray-800 border-b pb-4 mb-6">Kemas kini Kata Laluan</h2>

                <div class="max-w-xl space-y-4">
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700">Kata Laluan
                            Semasa</label>
                        <input type="password" name="current_password"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-emerald-500 focus:border-emerald-500">
                        @error('current_password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Kata Laluan Baru</label>
                        <input type="password" name="password"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-emerald-500 focus:border-emerald-500">
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Sahkan Kata
                            Laluan Baru</label>
                        <input type="password" name="password_confirmation"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-emerald-500 focus:border-emerald-500">
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="py-2 px-6 rounded-md text-white bg-emerald-600 hover:bg-emerald-700 font-medium shadow-sm">
                    Simpan Perubahan
                </button>
            </div>

        </div>
    </form>

@endsection
