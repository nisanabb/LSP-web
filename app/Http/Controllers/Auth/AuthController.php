<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User; // Make sure to use your User model

class AuthController extends Controller
{
    // Show registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_activated' => false, // Set the default activation status
        ]);

        // Additional activation logic (e.g., sending activation email)

        return redirect($this->redirectPath())->with('success', 'Registration successful. Please wait for activation.');
    }

    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login request
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Attempt to authenticate user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'))) {
            // Check if the user is activated
            if (Auth::user()->is_activated) {
                session()->flash('success', 'You have logged in successfully.');
                return redirect()->intended($this->redirectPath());
            } else {
                Auth::logout(); // Log out the user if not activated
                return redirect()->back()->withErrors([
                    'email' => 'Your account is not activated yet. Please wait for admin approval.',
                ])->withInput();
            }
        }

        // Failed authentication
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    protected function redirectPath()
    {
        return '/admin/students';
    }
}