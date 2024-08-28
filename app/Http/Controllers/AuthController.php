<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function mainRegistrasi()
    {
        return view('login.registrasi');
    }
    public function formAddRegistrasi(Request $request)
    {
        $users = new User();
        $users->username = $request->username;
        $users->password = bcrypt($request->password);
        $users->save();
        return redirect('/login');
    }

    public function mainLogin()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $message = [
            'username.required' => 'Username tidak boleh kosong.',
            'password.required' => 'Password tidak boleh kosong.',
            'username' => 'required|string',
            'password' => 'required|string',
        ];

        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string',
        ], $message);
        $users = $request->only('username', 'password');

        if (Auth::attempt($users)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('gagal', 'Username dan Password salah');
        }
    }
}
