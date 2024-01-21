<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function dashboard() {
        return view('manager.dashboard');
    }
    public function login(){
        return view('manager.login');
    }
    public function store(Request $request) {
        $request->all([
            'email'=>'require|email',
            'password'=>'require'
        ]);
        if(Auth::guard('manager')->attempt($request->only('email','password'))) {
            return redirect()->route('manager.dashboard')->with('success','Successfully login');
        }else{
            return redirect()->route('manager.login')->with('error','You are wrong');
        }
    }
    public function logout(Request $request) {
        Auth::guard('manager')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('manager.login');
    }
}
