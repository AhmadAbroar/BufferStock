<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PegawaiAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('pegawai_dashboard.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('pegawai')->attempt($credentials)) {
            return redirect()->intended(route('pegawai.dashboard'));
        }

        // Jika gagal login
        return Redirect::route('pegawai.login')->withInput($request->only('email'))
            ->with('error', 'Cek kembali email dan password anda');
    }

    public function logout()
    {
        Auth::guard('pegawai')->logout();

        return redirect(route('pegawai.login'));
    }
}
