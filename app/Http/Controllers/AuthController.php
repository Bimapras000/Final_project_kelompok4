<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function showlogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return redirect('/log_in')
                ->with('error', 'Akun tidak ditemukan. Silakan coba lagi.');
        }

        // if ($user->is_active == '0') {
        //     return redirect('/login')
        //         ->with('error', 'Akun tidak aktif. Silakan hubungi admin.');
        // } else {
            if (Auth::attempt($credentials)) {
                if (Auth::user()->role == 'admin') {
                    return redirect('/admin/dashboard');
                } elseif (Auth::user()->role == 'petugas') {
                    return redirect('/admin/dashboard');
                } elseif (Auth::user()->role == 'anggota') {
                    return redirect('/user');
                }
            }
        // }

        return redirect('/log_in')
            ->with('error', 'Kredensial tidak valid. Silakan coba lagi.');
    }


    public function showregister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'alamat' => ['required', 'max:100'],
            'no_tlp' => ['required', 'max:13'],
            'tgl_bergabung' => ['required'],
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'tgl_bergabung' => $request->tgl_bergabung,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('log_in')
            ->with('success', 'Register berhasil dihapus.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }
}
