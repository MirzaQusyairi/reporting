<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status == 1) {
                $request->session()->regenerate();

                return redirect()->intended('/dashboard');
            } else {
                return back()->with('loginWarning', 'Akunmu tidak aktif! Silahkan hubungi administrator.');
            }
        }

        return back()->with('loginError', 'Login gagal! Silahkan cek email dan passwordmu.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
