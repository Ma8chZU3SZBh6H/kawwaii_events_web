<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use SebastianBergmann\Environment\Console;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'max:255']
        ]);
        $encrypted_data = Crypt::encryptString(base64_encode(json_encode($request->only('password', 'email', 'name'))));

        Mail::to($request->email)->send(new RegistrationMail($request->name, $encrypted_data));

        return view('message', [
            'title' => 'Email was sent to ' . $request->email . '!',
            'message' => 'To complete the registration, you must confirm the mail!'
        ]);
    }

    public function confirm($data)
    {
        $decoded_data = json_decode(base64_decode(Crypt::decryptString($data)));
        $user = User::create([
            'name' => $decoded_data->name,
            'email' => $decoded_data->email,
            'password' => Hash::make($decoded_data->password)
        ]);
        Auth::login($user);

        return view('message', [
            'title' => 'Registration complete!',
            'message' => 'Welcome ' . $decoded_data->name . '!',
        ]);
    }
}
