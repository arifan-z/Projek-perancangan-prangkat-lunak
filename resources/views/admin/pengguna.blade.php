@extends('admin.template')

@section('title', 'Profil Saya')

@section('content')
    <div class="p-6">

        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-600 text-black rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="text-2xl font-bold mb-6 text-black">Manajemen Pengguna</h2>

        <div class="overflow-x-auto bg-white/10 backdrop-blur-lg p-4 rounded-lg shadow">
            <table class="w-full text-black">
                <thead>
                    <tr class="border-b border-white/20">
                        <th class="py-3 text-left">#</th>
                        <th class="py-3 text-left">Nama</th>
                        <th class="py-3 text-left">Email</th>
                        <th class="py-3 text-left">Role</th>
                        <th class="py-3 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pengguna as $index => $user)
                        <tr class="border-b border-white/10">
                            <td class="py-3">{{ $index + 1 }}</td>
                            <td class="py-3">{{ $user->name }}</td>
                            <td class="py-3">{{ $user->email }}</td>

                            <td class="py-3">
                                <form action="{{ route('admin.pengguna.updateRole', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="role" onchange="this.form.submit()"
                                        class="bg-white/20 text-black px-2 py-1 rounded">
                                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                        <option value="staf" {{ $user->role === 'staf' ? 'selected' : '' }}>Staf</option>
                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                    </select>
                                </form>
                            </td>

                            <td class="py-3">
                                <form action="{{ route('admin.pengguna.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');">

                                    @csrf
                                    @method('DELETE')

                                    <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg">
                                        Hapus
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
@endsection
