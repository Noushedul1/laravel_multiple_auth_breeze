<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard');
    }
    public function login(){
        return view('admin.login');
    }
    public function store(Request $request) {
        $request->all([
            'email'=>'require|email',
            'password'=>'require'
        ]);
        if(Auth::guard('admin')->attempt($request->only('email','password'))) {
            return redirect()->route('admin.dashboard')->with('success','Successfully login');
        }else{
            return redirect()->route('admin.login')->with('error','You are wrong');
        }
    }
    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('admin.login');
    }
}
