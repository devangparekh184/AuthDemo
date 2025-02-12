<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.customer_register');
    }

    public function register(RegisterRequest $request)
    {
        // Create customer
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'role'       => 'customer',
        ]);

        // to send the email for veirification mail
        event(new Registered($user));

        return redirect()->route('login')->with('status', 'Registration successful! Please check your email to verify your account.');
    }

}
