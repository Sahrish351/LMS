@extends('layouts.auth')

@section('title', 'Login — Aura Academy')

@section('content')

<div style="min-height:100vh;display:flex;align-items:center;justify-content:center;background:#faf9ff;padding:20px;">
  
  <div style="width:100%;max-width:440px;background:#fff;border-radius:24px;padding:48px 40px;box-shadow:0 20px 60px rgba(0,0,0,.08);">
    
    

    <!-- Header -->
    <div style="margin-bottom:32px;">
      <h1 style="font-size:28px;font-weight:900;color:#0f0f0f;margin:0 0 8px;font-family:'Plus Jakarta Sans',sans-serif;text-align:center;">Welcome Back</h1>
      <p style="font-size:15px;color:#6b7280;margin:0;text-align:center;">Sign in to continue your learning journey</p>
    </div>

    <!-- Error Messages -->
    @if ($errors->any())
    <div style="background:#fef2f2;border:1.5px solid #fecaca;border-radius:14px;padding:14px 18px;margin-bottom:24px;display:flex;align-items:center;gap:10px;">
      <i class="fa-solid fa-circle-exclamation" style="color:#ef4444;font-size:18px;flex-shrink:0;"></i>
      <div>
        @foreach ($errors->all() as $error)
        <p style="font-size:13px;font-weight:600;color:#dc2626;margin:0;">{{ $error }}</p>
        @endforeach
      </div>
    </div>
    @endif

    <!-- Success Message -->
    @if (session('status'))
    <div style="background:#f0fdf4;border:1.5px solid #bbf7d0;border-radius:14px;padding:14px 18px;margin-bottom:24px;display:flex;align-items:center;gap:10px;">
      <i class="fa-solid fa-circle-check" style="color:#22c55e;font-size:18px;flex-shrink:0;"></i>
      <p style="font-size:13px;font-weight:600;color:#16a34a;margin:0;">{{ session('status') }}</p>
    </div>
    @endif

    <!-- Google Login -->
    <a href="{{ url('/auth/google') }}" style="display:flex;align-items:center;justify-content:center;gap:12px;width:100%;padding:14px;background:#fff;border:1.5px solid #e5e7eb;border-radius:14px;font-size:14px;font-weight:600;color:#374151;text-decoration:none;margin-bottom:20px;transition:all .2s;box-sizing:border-box;" onmouseenter="this.style.borderColor='#7c3aed';this.style.boxShadow='0 4px 16px rgba(124,58,237,.1)';" onmouseleave="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';">
      <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google" style="width:20px;height:20px;">
      Continue with Google
    </a>

    <!-- Divider -->
    <div style="display:flex;align-items:center;gap:12px;margin-bottom:24px;">
      <div style="flex:1;height:1.5px;background:#e5e7eb;"></div>
      <span style="font-size:13px;color:#9ca3af;font-weight:500;white-space:nowrap;">or sign in with email</span>
      <div style="flex:1;height:1.5px;background:#e5e7eb;"></div>
    </div>

    <!-- Login Form -->
    <form action="{{ url('/login') }}" method="POST">
      @csrf

      <!-- Email -->
      <div style="margin-bottom:18px;">
        <label style="display:block;font-size:13px;font-weight:700;color:#374151;margin-bottom:7px;letter-spacing:.02em;">Email Address</label>
        <div style="position:relative;">
          <div style="position:absolute;left:14px;top:50%;transform:translateY(-50%);pointer-events:none;">
            <i class="fa-regular fa-envelope" style="color:#9ca3af;font-size:15px;"></i>
          </div>
          <input type="email" name="email" value="{{ old('email') }}" required
            placeholder="you@example.com"
            style="width:100%;padding:13px 14px 13px 42px;border:1.5px solid {{ $errors->has('email')?'#ef4444':'#e5e7eb' }};border-radius:12px;font-size:14px;color:#374151;outline:none;background:#fff;box-sizing:border-box;transition:border-color .2s;"
            onfocus="this.style.borderColor='#7c3aed';this.style.boxShadow='0 0 0 3px rgba(124,58,237,.1)';"
            onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';">
        </div>
        @error('email')<p style="font-size:12px;color:#ef4444;margin:5px 0 0;">{{ $message }}</p>@enderror
      </div>

      <!-- Password -->
      <div style="margin-bottom:14px;">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:7px;">
          <label style="font-size:13px;font-weight:700;color:#374151;letter-spacing:.02em;">Password</label>
          <a href="{{ url('/forgot-password') }}" style="font-size:13px;font-weight:600;color:#7c3aed;text-decoration:none;" onmouseenter="this.style.textDecoration='underline';" onmouseleave="this.style.textDecoration='none';">Forgot password?</a>
        </div>
        <div style="position:relative;">
          <div style="position:absolute;left:14px;top:50%;transform:translateY(-50%);pointer-events:none;">
            <i class="fa-solid fa-lock" style="color:#9ca3af;font-size:15px;"></i>
          </div>
          <input type="password" name="password" id="password-field" required
            placeholder="Enter your password"
            style="width:100%;padding:13px 44px 13px 42px;border:1.5px solid #e5e7eb;border-radius:12px;font-size:14px;color:#374151;outline:none;background:#fff;box-sizing:border-box;transition:border-color .2s;"
            onfocus="this.style.borderColor='#7c3aed';this.style.boxShadow='0 0 0 3px rgba(124,58,237,.1)';"
            onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';">
          <button type="button" onclick="togglePass()" style="position:absolute;right:14px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;padding:0;">
            <i id="eye-icon" class="fa-regular fa-eye" style="color:#9ca3af;font-size:15px;"></i>
          </button>
        </div>
        @error('password')<p style="font-size:12px;color:#ef4444;margin:5px 0 0;">{{ $message }}</p>@enderror
      </div>

      <!-- Remember Me -->
      <div style="display:flex;align-items:center;gap:10px;margin-bottom:24px;">
        <input type="checkbox" name="remember" id="remember" style="width:18px;height:18px;accent-color:#7c3aed;cursor:pointer;">
        <label for="remember" style="font-size:14px;color:#374151;cursor:pointer;">Remember me for 30 days</label>
      </div>

      <!-- Submit Button -->
      <button type="submit" style="width:100%;padding:15px;background:linear-gradient(135deg,#6d28d9,#7c3aed);color:#fff;border:none;border-radius:14px;font-size:15px;font-weight:700;cursor:pointer;font-family:'Plus Jakarta Sans',sans-serif;box-shadow:0 6px 20px rgba(124,58,237,.35);transition:all .2s;"
        onmouseenter="this.style.transform='translateY(-1px)';this.style.boxShadow='0 10px 30px rgba(124,58,237,.4)';"
        onmouseleave="this.style.transform='none';this.style.boxShadow='0 6px 20px rgba(124,58,237,.35)';">
        Sign In to Dashboard <i class="fa-solid fa-arrow-right" style="margin-left:6px;"></i>
      </button>
    </form>

    <!-- Register Link -->
    <p style="text-align:center;font-size:14px;color:#6b7280;margin:24px 0 0;">
      Don't have an account?
      <a href="{{ url('/register') }}" style="color:#7c3aed;font-weight:700;text-decoration:none;" onmouseenter="this.style.textDecoration='underline';" onmouseleave="this.style.textDecoration='none';">Create Account →</a>
    </p>

    <!-- Back to Home -->
    <p style="text-align:center;margin-top:16px;">
      <a href="{{ url('/') }}" style="font-size:13px;color:#9ca3af;text-decoration:none;display:inline-flex;align-items:center;gap:6px;" onmouseenter="this.style.color='#7c3aed';" onmouseleave="this.style.color='#9ca3af';">
        <i class="fa-solid fa-arrow-left" style="font-size:11px;"></i> Back to Home
      </a>
    </p>
  </div>
</div>

@endsection

@push('scripts')
<script>
function togglePass() {
  const field = document.getElementById('password-field');
  const icon  = document.getElementById('eye-icon');
  if (field.type === 'password') {
    field.type = 'text';
    icon.className = 'fa-regular fa-eye-slash';
  } else {
    field.type = 'password';
    icon.className = 'fa-regular fa-eye';
  }
}
</script>
@endpush