<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only(['index', 'store']);
        $this->middleware('auth')->only(['destroy']);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'max:255']
        ]);
        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return redirect()->route('home');
        } else {
            return back()->withErrors(['message' => 'Login failed!']);
        }
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
