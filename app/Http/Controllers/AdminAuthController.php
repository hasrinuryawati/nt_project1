<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
           
    public function getLogin() 
    {
        return view('module.admin.login');
    }
    
    public function authenticate(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika autentikasi berhasil, alihkan ke halaman dashboard Admin
            return redirect()->route('admin.dashboard');
        } else {
            // Jika autentikasi gagal, kembalikan ke halaman login dengan pesan error
            return redirect()->route('admin.login')->with('error', 'Email atau password tidak valid!');
        }
    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }
}
