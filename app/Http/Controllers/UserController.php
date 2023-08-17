<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('module.user.dashboard');
    }

    public function profile()
    {
        $users = User::all();
        return view('module.user.profile');
    }

    public function update(User $user, Request $request)
    {
        $user_data = User::find($user->id);
        
        $imagePath = $user->image;
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($user->image) {
                Storage::delete('public/' . $user->image);
            }
            // Upload gambar baru
            $imagePath = $request->file('image')->store('user_images', 'public');
        }

        $user_data->name  = $request->name;
        $user_data->email = $request->email;
        $user_data->image = $imagePath;
        $user_data->save();
        
        return redirect()->back()->with('message','Data berhasil di ubah');
    }
}
