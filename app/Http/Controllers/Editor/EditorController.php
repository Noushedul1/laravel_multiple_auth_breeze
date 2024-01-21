<?php

namespace App\Http\Controllers\Editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditorController extends Controller
{
    public function dashboard() {
        return view('editor.dashboard');
    }
    public function login(){
        return view('editor.login');
    }
    public function store(Request $request) {
        $request->all([
            'email'=>'require|email',
            'password'=>'require'
        ]);
        if(Auth::guard('editor')->attempt($request->only('email','password'))) {
            return redirect()->route('editor.dashboard')->with('success','Successfully login');
        }else{
            return redirect()->route('editor.login')->with('error','You are wrong');
        }
    }
    public function logout(Request $request) {
        Auth::guard('editor')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('editor.login');
    }
}
