<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(){
        return view('users.register');
    }

    public function create(Request $request){
        $data = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',Rule::unique('users','email'),
            'password' => 'required|confirmed|min:6'
        ]);
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->route('login')->with('success','User Created Successfully !');
        
    }

    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->route('index')->with('success','You Are Logged In, Welcome '.Auth::user()->name);
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->regenerateToken();
        $request->session()->invalidate();
        return redirect()->route('index')->with('success','You Are Logged Out');
    }
}
