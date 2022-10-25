<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request){
       $data= $request->validate([
            'email'=>['required','email'],
            'password'=> ['required'],
            // 'role'=>['required'],
        ]);

    if (Auth::attempt($data)) {
        $request->session()->regenerate();

        return redirect()->intended('/dashboard');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->onlyInput('email');
}

public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
}
}


