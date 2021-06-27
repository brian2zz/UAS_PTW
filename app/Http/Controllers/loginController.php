<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\support\Facades\Auth;
use Session;

class loginController extends Controller
{
    public function login(Request $request)
    {
        // dd($request->all());
        $username = $request->username;
        $user = User::where('username', $username)->get();
        $data = $request->only('username', 'password');
        if (Auth::attempt($data)) {
            foreach ($user as $User) {
                if ($User->role == 'admin') {
                    return redirect('/user');
                } else {
                    return redirect('/home');
                }
            }
        } else {
            Session::flash('login','Username atau Password Salah');
            return redirect('/')->with('massage', 'username atau password salah');
        }
    }

    public function logout(Request $akun)
    {
        $akun->session()->flush();
        return redirect('/');
    }

    public function daftar(request $akun)
    {
        $user = User::where('username', '=', $akun->username)->count();

        if ($akun->password && $akun->username && $akun->confirm) {
            if ($user == 0) {
                if ($akun->password != $akun->confirm) {
                    Session::flash('password', 'Password yang di masukkan tidak sama');
                    return redirect('/');
                } else {
                    $password = bcrypt($akun->password);
                    User::create([
                        'name' => $akun->nama,
                        'username' => $akun->username,
                        'email' => $akun->email,
                        'alamat' => $akun->alamat,
                        'password' => $password,
                        'role' => 'user',
                    ]);
                    return redirect('/');
                }
            } else {
                Session::flash('warning', 'username sudah terdaftar');
                return redirect('/');
            }
        } else {
            Session::flash('gagal', 'Gagal mendaftar silahkan coba lagi');
            return redirect('/');
        }
    }
}
