<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller {

    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        // cek if username not exist | password salah
        if (!User::where('username', '=', $request->username)->exists())
        {
            return redirect("login")->withErrors('Username tidak ditemukan');
        }

        // Auth Process
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials))
        {
            if (auth()->user()->role == 'admin')
            {
                return redirect()->route('admin.orderlist');
            }
            elseif (auth()->user()->role == 'user')
            {
                return redirect()->route('user.orderlist');
            }
        }

        return redirect("login")->withErrors('Password Salah');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

}
