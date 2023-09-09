<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public static function index()
    {
        return view('auth.login');
    }

    public static function register()
    {
        return view('auth.register');
    }

    // Registrasion Users
    public static function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'  => 'required|max:255',
            'email'     => 'required|email:dns|unique:users',
            'username'  => 'required|min:3|max:255|unique:users',
            'password'  => 'required|min:5|max:255',
            'alamat'   => 'required',
            'telp'    => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);

        $validatedData['password']  =   Hash::make($validatedData['password']);

        User::create($validatedData);
        $request->session()->flash('success', 'Registration Success! Please Login');
        return redirect('/login');
    }

    // Authentication Users Login
    public static function authenticate(Request $request)
    {
        $credential = $request->validate([
            'username'  => 'required|min:3',
            'password'  => 'required|min:5'
        ]);

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            if (Auth::user()->role === 'wali') {
                return redirect()->intended('/learning');
            }
            return redirect()->intended('/dashboard');
        }

        // return back()->with('failed', 'Login Failed! please try again');
        $username = $request->old('username');
        return back()->withErrors([
            'username'  => 'Incorrect username or password',
            'password'  => 'Incorrect username or password'
        ])->withInput($username);
    }

    public static function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
