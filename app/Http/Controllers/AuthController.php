<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // ✅ Menampilkan form login
    public function showLogin()
    {
        return view('auth.login');
    }

    // ✅ Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cek user di database
        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Set session login
            Session::put('login', true);
            Session::put('username', $user->username);

            return redirect()->route('home')->with('success', 'Login berhasil!');
        }

        // Jika gagal login
        return back()->with('error', 'Username atau password salah!');
    }

    // ✅ Logout dan hapus session
    public function logout()
    {
        Session::flush();
        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}
