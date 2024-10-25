<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user= User::whereNot('roleid_fk',1)->get();
        return view('admin.Users.list',compact('user'));
    }


    public function edit($id){
        $user=User::find($id);
        return view('admin.Users.edit',compact('user'));
    }

    public function Update(Request $request ,$id)
    {
       $users= User::find($id);
       
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        // $imagename = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('userimages'), $imagename);
        // $users->image = $imagename;

        $users->save();
        return redirect()->route('users.list');
    }


    public function delete($id){
        User::find($id)->delete();
        return redirect()->route('users.list');
    }

}
