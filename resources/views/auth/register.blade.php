@extends('layouts.auth')

@section('title', 'Create Account — Aura Academy')

@section('content')

<div style="min-height:100vh;display:flex;align-items:center;justify-content:center;background:#faf9ff;padding:20px;">

  <div style="width:100%;max-width:500px;background:#fff;border-radius:24px;padding:48px 40px;box-shadow:0 20px 60px rgba(0,0,0,.08);">
    
    
    <div style="text-align:center;margin-bottom:32px;">
      <a href="{{ url('/') }}" style="display:inline-flex;align-items:center;gap:10px;text-decoration:none;">
        <div style="width:48px;height:48px;background:linear-gradient(135deg,#4c1d95,#7c3aed);border-radius:14px;display:flex;align-items:center;justify-content:center;">
          <i class="fa-solid fa-graduation-cap" style="color:#fff;font-size:22px;"></i>
        </div>
        <span style="font-size:22px;font-weight:900;color:#0f0f0f;font-family:'Plus Jakarta Sans',sans-serif;">Aura<span style="color:#7c3aed;">Academy</span></span>
      </a>
    </div>

  
    <div style="margin-bottom:32px;text-align:center;">
      <h1 style="font-size:28px;font-weight:900;color:#0f0f0f;margin:0 0 8px;font-family:'Plus Jakarta Sans',sans-serif;">Create Your Account</h1>
      <p style="font-size:15px;color:#6b7280;margin:0;">Join 30,000+ students and start learning today</p>
    </div>

   
    @if ($errors->any())
    <div style="background:#fef2f2;border:1.5px solid #fecaca;border-radius:14px;padding:14px 18px;margin-bottom:20px;">
      <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
        <i class="fa-solid fa-circle-exclamation" style="color:#ef4444;font-size:16px;"></i>
        <p style="font-size:13px;font-weight:700;color:#dc2626;margin:0;">Please fix the following errors:</p>
      </div>
      @foreach ($errors->all() as $error)
      <p style="font-size:13px;color:#dc2626;margin:0 0 4px 24px;">• {{ $error }}</p>
      @endforeach
    </div>
    @endif

    
    <a href="{{ url('/auth/google') }}" style="display:flex;align-items:center;justify-content:center;gap:12px;width:100%;padding:14px;background:#fff;border:1.5px solid #e5e7eb;border-radius:14px;font-size:14px;font-weight:600;color:#374151;text-decoration:none;margin-bottom:20px;box-sizing:border-box;transition:all .2s;" onmouseenter="this.style.borderColor='#7c3aed';this.style.boxShadow='0 4px 16px rgba(124,58,237,.1)';" onmouseleave="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';">
      <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google" style="width:20px;height:20px;">
      Continue with Google
    </a>

  
    <div style="display:flex;align-items:center;gap:12px;margin-bottom:20px;">
      <div style="flex:1;height:1.5px;background:#e5e7eb;"></div>
      <span style="font-size:13px;color:#9ca3af;font-weight:500;">or register with email</span>
      <div style="flex:1;height:1.5px;background:#e5e7eb;"></div>
    </div>

    
    <form action="{{ url('/register') }}" method="POST">
      @csrf

     
      <div style="margin-bottom:16px;">
        <label style="display:block;font-size:13px;font-weight:700;color:#374151;margin-bottom:7px;">Full Name</label>
        <div style="position:relative;">
          <div style="position:absolute;left:14px;top:50%;transform:translateY(-50%);pointer-events:none;">
            <i class="fa-regular fa-user" style="color:#9ca3af;font-size:15px;"></i>
          </div>
          <input type="text" name="name" value="{{ old('name') }}" required placeholder="Ali Hassan"
            style="width:100%;padding:13px 14px 13px 42px;border:1.5px solid {{ $errors->has('name')?'#ef4444':'#e5e7eb' }};border-radius:12px;font-size:14px;color:#374151;outline:none;background:#fff;box-sizing:border-box;transition:border-color .2s;"
            onfocus="this.style.borderColor='#7c3aed';this.style.boxShadow='0 0 0 3px rgba(124,58,237,.1)';"
            onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';">
        </div>
        @error('name')<p style="font-size:12px;color:#ef4444;margin:5px 0 0;">{{ $message }}</p>@enderror
      </div>

      
      <div style="margin-bottom:16px;">
        <label style="display:block;font-size:13px;font-weight:700;color:#374151;margin-bottom:7px;">Email Address</label>
        <div style="position:relative;">
          <div style="position:absolute;left:14px;top:50%;transform:translateY(-50%);pointer-events:none;">
            <i class="fa-regular fa-envelope" style="color:#9ca3af;font-size:15px;"></i>
          </div>
          <input type="email" name="email" value="{{ old('email') }}" required placeholder="you@example.com"
            style="width:100%;padding:13px 14px 13px 42px;border:1.5px solid {{ $errors->has('email')?'#ef4444':'#e5e7eb' }};border-radius:12px;font-size:14px;color:#374151;outline:none;background:#fff;box-sizing:border-box;transition:border-color .2s;"
            onfocus="this.style.borderColor='#7c3aed';this.style.boxShadow='0 0 0 3px rgba(124,58,237,.1)';"
            onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';">
        </div>
        @error('email')<p style="font-size:12px;color:#ef4444;margin:5px 0 0;">{{ $message }}</p>@enderror
      </div>

     
      <div style="margin-bottom:16px;">
        <label style="display:block;font-size:13px;font-weight:700;color:#374151;margin-bottom:7px;">Phone Number <span style="color:#9ca3af;font-weight:400;">(optional)</span></label>
        <div style="position:relative;">
          <div style="position:absolute;left:14px;top:50%;transform:translateY(-50%);pointer-events:none;">
            <i class="fa-solid fa-phone" style="color:#9ca3af;font-size:14px;"></i>
          </div>
          <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="+92-300-0000000"
            style="width:100%;padding:13px 14px 13px 42px;border:1.5px solid #e5e7eb;border-radius:12px;font-size:14px;color:#374151;outline:none;background:#fff;box-sizing:border-box;transition:border-color .2s;"
            onfocus="this.style.borderColor='#7c3aed';this.style.boxShadow='0 0 0 3px rgba(124,58,237,.1)';"
            onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';">
        </div>
      </div>

      
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:16px;">
        <div>
          <label style="display:block;font-size:13px;font-weight:700;color:#374151;margin-bottom:7px;">Password</label>
          <div style="position:relative;">
            <div style="position:absolute;left:14px;top:50%;transform:translateY(-50%);pointer-events:none;">
              <i class="fa-solid fa-lock" style="color:#9ca3af;font-size:14px;"></i>
            </div>
            <input type="password" name="password" id="pass1" required placeholder="Min 8 chars"
              style="width:100%;padding:13px 40px 13px 42px;border:1.5px solid {{ $errors->has('password')?'#ef4444':'#e5e7eb' }};border-radius:12px;font-size:14px;color:#374151;outline:none;background:#fff;box-sizing:border-box;transition:border-color .2s;"
              onfocus="this.style.borderColor='#7c3aed';this.style.boxShadow='0 0 0 3px rgba(124,58,237,.1)';"
              onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';" oninput="checkStrength(this.value)">
            <button type="button" onclick="togglePass('pass1','eye1')" style="position:absolute;right:10px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;padding:0;">
              <i id="eye1" class="fa-regular fa-eye" style="color:#9ca3af;font-size:14px;"></i>
            </button>
          </div>
          
          <div style="margin-top:6px;height:4px;background:#e5e7eb;border-radius:2px;overflow:hidden;">
            <div id="strength-bar" style="height:100%;width:0%;border-radius:2px;transition:all .3s;"></div>
          </div>
          <p id="strength-text" style="font-size:11px;color:#9ca3af;margin:4px 0 0;"></p>
        </div>
        <div>
          <label style="display:block;font-size:13px;font-weight:700;color:#374151;margin-bottom:7px;">Confirm Password</label>
          <div style="position:relative;">
            <div style="position:absolute;left:14px;top:50%;transform:translateY(-50%);pointer-events:none;">
              <i class="fa-solid fa-lock" style="color:#9ca3af;font-size:14px;"></i>
            </div>
            <input type="password" name="password_confirmation" id="pass2" required placeholder="Re-enter password"
              style="width:100%;padding:13px 40px 13px 42px;border:1.5px solid #e5e7eb;border-radius:12px;font-size:14px;color:#374151;outline:none;background:#fff;box-sizing:border-box;transition:border-color .2s;"
              onfocus="this.style.borderColor='#7c3aed';this.style.boxShadow='0 0 0 3px rgba(124,58,237,.1)';"
              onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';">
            <button type="button" onclick="togglePass('pass2','eye2')" style="position:absolute;right:10px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;padding:0;">
              <i id="eye2" class="fa-regular fa-eye" style="color:#9ca3af;font-size:14px;"></i>
            </button>
          </div>
        </div>
      </div>
      @error('password')<p style="font-size:12px;color:#ef4444;margin:-10px 0 14px;">{{ $message }}</p>@enderror

      
      <div style="display:flex;align-items:flex-start;gap:10px;margin-bottom:22px;">
        <input type="checkbox" name="terms" id="terms" required style="width:18px;height:18px;accent-color:#7c3aed;cursor:pointer;margin-top:2px;flex-shrink:0;">
        <label for="terms" style="font-size:13px;color:#6b7280;line-height:1.5;cursor:pointer;">
          I agree to the
          <a href="#" style="color:#7c3aed;font-weight:600;text-decoration:none;">Terms of Service</a>
          and
          <a href="#" style="color:#7c3aed;font-weight:600;text-decoration:none;">Privacy Policy</a>
        </label>
      </div>

      
      <button type="submit" style="width:100%;padding:15px;background:linear-gradient(135deg,#6d28d9,#7c3aed);color:#fff;border:none;border-radius:14px;font-size:15px;font-weight:700;cursor:pointer;font-family:'Plus Jakarta Sans',sans-serif;box-shadow:0 6px 20px rgba(124,58,237,.35);transition:all .2s;"
        onmouseenter="this.style.transform='translateY(-1px)';this.style.boxShadow='0 10px 30px rgba(124,58,237,.4)';"
        onmouseleave="this.style.transform='none';this.style.boxShadow='0 6px 20px rgba(124,58,237,.35)';">
        Create My Account <i class="fa-solid fa-arrow-right" style="margin-left:6px;"></i>
      </button>
    </form>

    
    <p style="text-align:center;font-size:14px;color:#6b7280;margin:22px 0 0;">
      Already have an account?
      <a href="{{ url('/login') }}" style="color:#7c3aed;font-weight:700;text-decoration:none;" onmouseenter="this.style.textDecoration='underline';" onmouseleave="this.style.textDecoration='none';">Sign In →</a>
    </p>

    
    <p style="text-align:center;margin-top:12px;">
      <a href="{{ url('/') }}" style="font-size:13px;color:#9ca3af;text-decoration:none;display:inline-flex;align-items:center;gap:6px;" onmouseenter="this.style.color='#7c3aed';" onmouseleave="this.style.color='#9ca3af';">
        <i class="fa-solid fa-arrow-left" style="font-size:11px;"></i> Back to Home
      </a>
    </p>
  </div>
</div>

@endsection

@push('scripts')
<script>
function togglePass(fieldId, iconId) {
  const f = document.getElementById(fieldId);
  const i = document.getElementById(iconId);
  f.type = f.type === 'password' ? 'text' : 'password';
  i.className = f.type === 'password' ? 'fa-regular fa-eye' : 'fa-regular fa-eye-slash';
}

function checkStrength(val) {
  const bar = document.getElementById('strength-bar');
  const txt = document.getElementById('strength-text');
  let score = 0;
  if (val.length >= 8) score++;
  if (/[A-Z]/.test(val)) score++;
  if (/[0-9]/.test(val)) score++;
  if (/[^A-Za-z0-9]/.test(val)) score++;

  const levels = [
    {w:'0%',  color:'#e5e7eb', label:''},
    {w:'25%', color:'#ef4444', label:'Weak'},
    {w:'50%', color:'#f59e0b', label:'Fair'},
    {w:'75%', color:'#3b82f6', label:'Good'},
    {w:'100%',color:'#22c55e', label:'Strong'},
  ];
  bar.style.width  = levels[score].w;
  bar.style.background = levels[score].color;
  txt.style.color  = levels[score].color;
  txt.textContent  = levels[score].label;
}
</script>
@endpush