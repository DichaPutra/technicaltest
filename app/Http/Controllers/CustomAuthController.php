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
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials))
        {
            if (auth()->user()->role == 'admin')
            {
                return redirect()->route('admin.orderlist');
            }
            elseif (auth()->user()->role == 'user')
            {
                return redirect()->route('client.orderlist');
            }
        }


        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function dashboard()
    {
        if (Auth::check())
        {
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

}
