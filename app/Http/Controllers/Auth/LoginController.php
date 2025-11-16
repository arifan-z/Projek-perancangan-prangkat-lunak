<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Proses login dengan username atau email.
     */
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        // Tentukan apakah input berupa email atau username
        $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        // Login dengan kombinasi username/email dan password
        if (Auth::attempt([$fieldType => $request->login, 'password' => $request->password])) {
            $request->session()->regenerate();

            // ✅ Redirect berdasarkan role
            return $this->redirectBasedOnRole();
        }

        return back()->with('error', 'Username/Email atau password salah.');
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    /**
     * Redirect berdasarkan role user.
     */
    private function redirectBasedOnRole()
    {
        return redirect()->route('dashboard');
    }
}
