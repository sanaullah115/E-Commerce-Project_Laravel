<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $userCredential = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($userCredential)) {

            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return back()->with('error', 'Email And Password is incorrect.');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
