<?php

namespace App\Http\Controllers;

use App\Models\santri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    // Menampilkan halaman register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'santri',
        ]);
   
         // Kirim email verifikasi
         event(new Registered($user));

        return redirect()->route('auth.login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
// Proses login
public function login(Request $request)
{
    $credentials = $request->only('name', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($user->role === 'santri') {
            return redirect('/santri/dashboard');
        } elseif ($user->role === 'ustadz') {
            return redirect('/ustad/dashboard');
        } elseif ($user->role === 'petugas') {
            return redirect('/petugas/dashboard');
        }

        return redirect('/');
    }

    return back()->withErrors(['email' => 'Email atau password salah']);
}
    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login')->with('success', 'Logout berhasil.');
    }

    public function showVerifyEmail()
{
    return view('auth.verify'); // Tampilkan halaman verifikasi email
}

}