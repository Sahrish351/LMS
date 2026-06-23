<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Referral;

class RegisterController extends Controller
{
    
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    
    public function register(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|max:100',
            'email'                 => 'required|email|unique:users,email',
            'phone'                 => 'nullable|string|max:20',
            'password'              => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
            'terms'                 => 'accepted',
        ], [
            'email.unique'    => 'This email is already registered. Please login instead.',
            'password.min'    => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Passwords do not match.',
            'terms.accepted'  => 'You must accept the Terms of Service to continue.',
        ]);

      
        $referredBy = null;
        if ($request->filled('referral_code')) {
            $referrer = User::where('referral_code', strtoupper($request->referral_code))->first();
            if ($referrer) {
                $referredBy = $referrer->id;
            }
        }

        
        $user = User::create([
            'name'              => $request->name,
            'email'             => $request->email,
            'phone'             => $request->phone,
            'password'          => Hash::make($request->password),
            'role_id'           => 4, // student role
            'status'            => 'active',
            'referral_code'     => strtoupper(Str::random(8)),
            'referred_by'       => $referredBy,
            'email_verified_at' => now(),
        ]);

       
        if ($referredBy) {
            Referral::create([
                'referrer_id'  => $referredBy,
                'referred_id'  => $user->id,
                'bonus_amount' => 0,
                'status'       => 'pending',
            ]);
        }

       
        Auth::login($user);

        return redirect('/student/dashboard')
            ->with('success', 'Welcome to Aura Academy! Your account has been created successfully.');
    }
}
