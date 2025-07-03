<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        // If user is already logged in, redirect to dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        try {
            // Check user with SHA2 hashed password
            $user = User::where('email', $credentials['email'])
                ->whereRaw("password = SHA2(?, 256)", [$credentials['password']])
                ->first();

            if ($user) {
                Auth::login($user, $request->boolean('remember'));
                $request->session()->regenerate();
                
                // Log successful login
                \Log::info("Successful login for user: " . $credentials['email']);
                
                return redirect()->route('dashboard')->with('success', 'Welcome back!');
            }

            // Log failed login attempt
            \Log::warning("Failed login attempt for email: " . $credentials['email']);

            return redirect()->route('login')
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ]);
        } catch (\Exception $e) {
            \Log::error("Login error: " . $e->getMessage());
            
            return redirect()->route('login')
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'An error occurred during login. Please try again.',
                ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Redirect to welcome page (/) instead of login (/login)
        return redirect('/')->with('success', 'You have been logged out successfully.');
    }
}
