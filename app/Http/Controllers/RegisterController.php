<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('admin.register');
    }



    public function register(Request $request)
    {
        $user =new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password = Hash::make($request->password); // Hash the password
        $user->save();
        return redirect()->route('login');
    }
}
