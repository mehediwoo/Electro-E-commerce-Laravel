<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function Index()
    {
        if (session()->has('email')) {
            return redirect('/');
        }
        return view('login');
    }

    public function CustomerRegistration(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:customers,email',
            'pass' => 'required',
            'phone' => 'required',
        ]);

        $name     = $request->input('name');
        $email     = $request->input('email');

        $register = new Customer;
        $register->name  = $name;
        $register->email = $email;
        $register->pass = $request->input('pass');
        $register->phone = $request->input('phone');
        $register->save();
        session()->put('name',$name);
        session()->put('email',$email);
        $log = Customer::where('email',$email)->first();
        if ($log==true) {
            session()->put('id',$log->id);
        }

        return redirect('/checkout');
    }

    //Customer Login
    public function CustomerLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'pass' => 'required',
        ]);

        $email  = $request->input('email');
        $pass   = $request->input('pass');

        $register = Customer::where('email',$email)->where('pass',$pass)->first();
        if ($register==true) {
            session()->put('id',$register->id);
            session()->put('name',$register->name);
            session()->put('email',$email);
            return redirect('/checkout');
        }else{
            return redirect()->back()->with('error','Invalid Username or Password');
        }
    }
    //Customer Singout
    public function SignOut(Request $request)
    {
        $request->session()->forget('email');
        $request->session()->forget('name');
        $request->session()->forget('id');
        return redirect()->back();
    }
}
