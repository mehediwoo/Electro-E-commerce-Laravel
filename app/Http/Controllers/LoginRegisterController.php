<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;

class LoginRegisterController extends Controller
{
    public function Login()
    {
        if (session()->has('email')) {
            return redirect('/Dashboard');
        }
        return view('admin.login');
    }
    public function LogOut()
    {
        session()->flush();
        return redirect('/admins');
    }
    public function LoginToApps(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|max:30',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $pass  = $request->input('password');
       $result = AdminModel::where('email',$email)->where('password',md5($pass))->first();
       if ($result==true) {
        session()->put('email',$email);
        session()->put('name',$result->name);
        session()->put('id',$result->id);
        return redirect('/Dashboard');
       }else{
        return redirect('/admins')->with('error','Username or password did not match!');
       }
    }
}
