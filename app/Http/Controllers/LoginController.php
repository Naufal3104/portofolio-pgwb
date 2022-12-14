<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use App\Models\User;

class LoginController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' =>['required','email'],
            'password' =>['required']
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email Salah',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}

// App\Models\User::create([
//     'name' => 'admin',
//     'email' => 'admin@gmail.com',
//     'password' => bcrypt('12345')
// ]);
