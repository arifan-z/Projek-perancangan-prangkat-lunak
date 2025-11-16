<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Tampilkan profil sesuai role user (admin, staf, user)
     */
    public function show()
    {
        $user = Auth::user();

        return match ($user->role) {
            'admin' => view('admin.profile', compact('user')),
            'staf'  => view('staf.profile', compact('user')),
            default => view('user.profile', compact('user')),
        };
    }


    /**
     * Update profil user (semua role bisa)
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'current_password' => ['nullable', 'required_with:password', 'string'],
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        // 🔹 Upload avatar (opsional)
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        // 🔹 Update nama & email
        $user->name = $request->name;
        $user->email = $request->email;

        // 🔹 Ganti password (jika diisi)
        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Kata sandi saat ini salah.']);
            }

            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('status', 'Profil berhasil diperbarui!');
    }
}
