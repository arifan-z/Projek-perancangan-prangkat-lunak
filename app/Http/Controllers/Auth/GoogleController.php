<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Exception;

class GoogleController extends Controller
{
    /**
     * Arahkan user ke halaman login Google
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Callback setelah login dari Google
     */
    public function callback()
    {
        try {
            // Gunakan stateless() agar tidak error CSRF
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Cari user berdasarkan google_id
            $user = User::where('google_id', $googleUser->getId())->first();

            if (!$user) {
                // Kalau belum ada, cek email
                $existingUser = User::where('email', $googleUser->getEmail())->first();

                if ($existingUser) {
                    // Update akun lama agar terhubung ke Google
                    $existingUser->update([
                        'google_id' => $googleUser->getId(),
                        'avatar' => $googleUser->getAvatar(),
                    ]);
                    $user = $existingUser;
                } else {
                    // Buat akun baru
                    $user = User::create([
                        'name' => $googleUser->getName(),
                        'email' => $googleUser->getEmail(),
                        'google_id' => $googleUser->getId(),
                        'avatar' => $googleUser->getAvatar(),
                        'role' => 'user', // default role
                        'password' => null,
                    ]);
                }
            }

            Auth::login($user);
            session()->regenerate();

            // Log untuk debugging (optional)
            \Log::info('Login Google sukses', [
                'id' => $user->id,
                'email' => $user->email,
                'role' => $user->role,
            ]);

            return $this->redirectBasedOnRole();
        } catch (Exception $e) {
            \Log::error('Error login Google', ['message' => $e->getMessage()]);
            return redirect('/login')->with('error', 'Gagal login dengan Google.');
        }
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // arahkan ke halaman utama
    }

    /**
     * Redirect berdasarkan role user
     */
    private function redirectBasedOnRole()
    {
        return redirect()->route('dashboard');
    }
}
