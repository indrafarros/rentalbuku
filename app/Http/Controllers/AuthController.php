<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status != 'active') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('message', 'Status user tidak aktif, harap hubungi administrator');
                return redirect('login');
            }
            Session::flash('status', 'success');
            Session::flash('message', 'Welcome');

            // $request->session()->regenerate();

            if (Auth::user()->role_id == 1) {
                return redirect('/dashboard');
            }

            if (Auth::user()->role_id == 2) {
                return redirect('/profile');
            }
            return redirect('welcome');
        }
        Session::flash('status', 'failed');
        Session::flash('message', 'Login invalid');

        return redirect('login');
    }

    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|min:6|max:20',
            'password' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'required'
        ]);

        $request['password'] = Hash::make($request->password);

        $user = User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'Account created successfully, contact admin to activate account');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
