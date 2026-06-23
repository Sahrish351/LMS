
@extends('layouts.auth')
@section('title', 'Forgot Password — Aura Academy')
@section('content')

<div style="min-height:100vh;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#f5f3ff 0%,#ede9fe 50%,#f0fdf4 100%);padding:40px 24px;">
  <div style="width:100%;max-width:480px;">

    
    <div style="background:#fff;border-radius:24px;padding:44px 40px;box-shadow:0 8px 40px rgba(0,0,0,.08);border:1.5px solid #f3f4f6;">

    
      <div style="width:64px;height:64px;background:linear-gradient(135deg,#ede9fe,#ddd6fe);border-radius:20px;display:flex;align-items:center;justify-content:center;margin:0 auto 24px;">
        <i class="fa-solid fa-lock" style="color:#7c3aed;font-size:28px;"></i>
      </div>

      <h1 style="font-size:26px;font-weight:900;color:#0f0f0f;margin:0 0 8px;font-family:'Plus Jakarta Sans',sans-serif;text-align:center;">Forgot Password?</h1>
      <p style="font-size:14px;color:#6b7280;margin:0 0 32px;text-align:center;line-height:1.6;">No worries! Enter your email address and we'll send you a secure reset link.</p>

      @if (session('status'))
      <div style="background:#f0fdf4;border:1.5px solid #bbf7d0;border-radius:14px;padding:16px 18px;margin-bottom:24px;display:flex;align-items:flex-start;gap:10px;">
        <i class="fa-solid fa-circle-check" style="color:#22c55e;font-size:18px;margin-top:1px;flex-shrink:0;"></i>
        <div>
          <p style="font-size:13px;font-weight:700;color:#16a34a;margin:0 0 4px;">Email Sent!</p>
          <p style="font-size:13px;color:#15803d;margin:0;">{{ session('status') }}</p>
        </div>
      </div>
      @endif

      @if ($errors->any())
      <div style="background:#fef2f2;border:1.5px solid #fecaca;border-radius:14px;padding:14px 18px;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
        <i class="fa-solid fa-circle-exclamation" style="color:#ef4444;font-size:18px;flex-shrink:0;"></i>
        @foreach ($errors->all() as $error)
        <p style="font-size:13px;font-weight:600;color:#dc2626;margin:0;">{{ $error }}</p>
        @endforeach
      </div>
      @endif

      <form action="{{ url('/forgot-password') }}" method="POST">
        @csrf
        <div style="margin-bottom:22px;">
          <label style="display:block;font-size:13px;font-weight:700;color:#374151;margin-bottom:8px;">Email Address</label>
          <div style="position:relative;">
            <div style="position:absolute;left:14px;top:50%;transform:translateY(-50%);pointer-events:none;">
              <i class="fa-regular fa-envelope" style="color:#9ca3af;font-size:15px;"></i>
            </div>
            <input type="email" name="email" value="{{ old('email') }}" required placeholder="you@example.com"
              style="width:100%;padding:14px 14px 14px 44px;border:1.5px solid #e5e7eb;border-radius:12px;font-size:14px;color:#374151;outline:none;background:#f9f9ff;box-sizing:border-box;transition:all .2s;"
              onfocus="this.style.borderColor='#7c3aed';this.style.background='#fff';this.style.boxShadow='0 0 0 3px rgba(124,58,237,.1)';"
              onblur="this.style.borderColor='#e5e7eb';this.style.background='#f9f9ff';this.style.boxShadow='none';">
          </div>
          @error('email')<p style="font-size:12px;color:#ef4444;margin:5px 0 0;">{{ $message }}</p>@enderror
        </div>

        <button type="submit" style="width:100%;padding:15px;background:linear-gradient(135deg,#6d28d9,#7c3aed);color:#fff;border:none;border-radius:14px;font-size:15px;font-weight:700;cursor:pointer;font-family:'Plus Jakarta Sans',sans-serif;box-shadow:0 6px 20px rgba(124,58,237,.35);transition:all .2s;margin-bottom:20px;"
          onmouseenter="this.style.transform='translateY(-1px)';this.style.boxShadow='0 10px 30px rgba(124,58,237,.4)';"
          onmouseleave="this.style.transform='none';this.style.boxShadow='0 6px 20px rgba(124,58,237,.35)';">
          <i class="fa-solid fa-paper-plane" style="margin-right:8px;"></i> Send Reset Link
        </button>
      </form>

      <div style="display:flex;align-items:center;gap:12px;margin-bottom:20px;">
        <div style="flex:1;height:1.5px;background:#f3f4f6;"></div>
        <span style="font-size:12px;color:#9ca3af;">or</span>
        <div style="flex:1;height:1.5px;background:#f3f4f6;"></div>
      </div>

      <div style="display:flex;gap:12px;">
        <a href="{{ url('/login') }}" style="flex:1;display:flex;align-items:center;justify-content:center;gap:8px;padding:12px;background:#f9f9ff;border:1.5px solid #e5e7eb;border-radius:12px;font-size:13px;font-weight:600;color:#374151;text-decoration:none;transition:all .2s;" onmouseenter="this.style.borderColor='#7c3aed';this.style.color='#7c3aed';" onmouseleave="this.style.borderColor='#e5e7eb';this.style.color='#374151';">
          <i class="fa-solid fa-arrow-left" style="font-size:11px;"></i> Back to Login
        </a>
        <a href="{{ url('/register') }}" style="flex:1;display:flex;align-items:center;justify-content:center;gap:8px;padding:12px;background:#f9f9ff;border:1.5px solid #e5e7eb;border-radius:12px;font-size:13px;font-weight:600;color:#374151;text-decoration:none;transition:all .2s;" onmouseenter="this.style.borderColor='#7c3aed';this.style.color='#7c3aed';" onmouseleave="this.style.borderColor='#e5e7eb';this.style.color='#374151';">
          Create Account <i class="fa-solid fa-arrow-right" style="font-size:11px;"></i>
        </a>
      </div>
    </div>

    <p style="text-align:center;font-size:13px;color:#9ca3af;margin-top:24px;">
      <a href="{{ url('/') }}" style="color:#9ca3af;text-decoration:none;display:inline-flex;align-items:center;gap:6px;" onmouseenter="this.style.color='#7c3aed';" onmouseleave="this.style.color='#9ca3af';">
        <i class="fa-solid fa-house" style="font-size:11px;"></i> Back to Home
      </a>
    </p>
  </div>
</div>

@endsection