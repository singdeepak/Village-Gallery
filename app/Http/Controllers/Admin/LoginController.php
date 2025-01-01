<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginPage(){
        return view('admin.auth.login');
    }

    public function checkLoginDetails(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->withErrors([
            'email' => 'Invalid Credentials'
        ]);
    }

}
