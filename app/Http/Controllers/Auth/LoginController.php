<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
   
    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        $remember    = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            if (Auth::user()->status === 'inactive' || Auth::user()->status === 'suspended') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Your account has been suspended. Please contact support.',
                ]);
            }

            return $this->redirectByRole();
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

  
    private function redirectByRole()
    {
        $role = Auth::user()->role->name;

        return match ($role) {
            'super_admin', 'admin' => redirect()->intended('/admin/dashboard'),
            'teacher'              => redirect()->intended('/teacher/dashboard'),
            'student'              => redirect()->intended('/student/dashboard'),
            default                => redirect('/'),
        };
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Logged out successfully.');
    }

  
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

 
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

          
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                
                $user = User::create([
                    'name'              => $googleUser->getName(),
                    'email'             => $googleUser->getEmail(),
                    'password'          => Hash::make(Str::random(24)),
                    'role_id'           => 4, // student role
                    'status'            => 'active',
                    'profile_picture'   => $googleUser->getAvatar(),
                    'referral_code'     => strtoupper(Str::random(8)),
                    'email_verified_at' => now(),
                ]);
            }

            Auth::login($user, true);

            return $this->redirectByRole();

        } catch (\Exception $e) {
            return redirect('/login')->withErrors([
                'email' => 'Google login failed. Please try again or use email login.',
            ]);
        }
    }
}
