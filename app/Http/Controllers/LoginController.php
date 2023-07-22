<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if(Auth::attempt($credentials)){
            if(Auth::user()->role=='admin'){
                return redirect('/dashboardadmin');
            }
            if(Auth::user()->role=='petugas'){
                return redirect('/dashboardpetugas');
            }
        }
        
        return back()->with('errorLogin','Email or Password anda salah !');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
