<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Auth\Events\Registered;
// use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function registerForm() 
    {
        return view('module.user.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed', // confirmed akan memeriksa apakah password_confirmation sama
        ]);
    
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $user                 = new User;
        $user->name           = $request->name;
        $user->email          = $request->email;
        $user->password       = Hash::make($request->password);
        $user->remember_token = Str::random(15);
        $user->save();
        // Mail::to($user->email)->send(new \App\Mail\VerifyEmail($user));
        // Mengirim email konfirmasi
        Mail::send('emails.verify-email', ['user' => $user], function($message) use($request){
            $message->to($request->email);
            $message->subject('Email Verification');
        });
        
        return redirect()->back()->with('message','Registration is successful, please verify email!');
    }

    public function verify($token)
    {
        // dd($token);
        $user = User::where('remember_token', $token)->firstOrFail();

        if (!$user->email_verified_at) {
            $user->email_verified_at = Carbon::now();
            $user->save();
            // Redirect atau tampilkan pesan bahwa email berhasil diverifikasi
        }

        return redirect()->route('user.login')->with('status', 'Email verified successfully.');
    }

    public function getLogin() 
    {
        return view('module.user.login');
    }

    public function authenticate(Request $request) 
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika autentikasi berhasil, alihkan ke halaman dashboard User
            return redirect()->route('user.dashboard');
        } else {
            // Jika autentikasi gagal, kembalikan ke halaman login dengan pesan error
            return redirect()->route('user.login')->with('error', 'Email atau password tidak valid!');
        }
    }

    public function logout()
    {
        Auth::guard('user')->logout();

        return redirect()->route('user.login');
    }
}
