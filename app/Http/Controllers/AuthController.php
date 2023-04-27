<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'name' => 'min:3|max:40|required',
            'email' => 'unique:users|max:50|required|regex:([a-zA-Z0-9]@gmail.com)',
            'phone' => 'required|regex:(08)',
            'password' => 'min:6|max:12|required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'role_id' => 2,
        ]);
 
        Session::flash('status', 'success');
        Session::flash('message', 'Successfully registered a new user');
        
        return redirect('login');
    }

    public function login()
    {
        return view ('login');
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|regex:([a-zA-Z0-9]@gmail.com)',
            'password' => 'min:6|max:12|required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/shop');
        }

        Session::flash('fail', 'failed');
        Session::flash('message', 'User not registered');

        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function profile()
    {
        return view('user-profile');
    }
}
