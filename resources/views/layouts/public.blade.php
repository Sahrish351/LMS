<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aura Academy | Modern Digital Skills LMS')</title>
    <meta name="description" content="@yield('meta_description', 'Learn in-demand digital skills with Aura Academy')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Plus+Jakarta+Sans:wght@500;600;700;800;900&display=swap" rel="stylesheet">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
 
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #FAFAFE;
            color: #1E1B4B;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }
        h1, h2, h3, h4, h5, h6, nav, .font-display {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .purple-gradient-text {
            background: linear-gradient(135deg, #4F46E5 0%, #9333EA 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .bg-mesh {
            background-color: #ffffff;
            background-image:
                radial-gradient(at 0% 0%, rgba(243, 232, 255, 0.5) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(238, 242, 255, 0.6) 0px, transparent 50%);
        }
        .glass {
            background: rgba(255, 255, 255, 0.82);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(79, 70, 229, 0.08);
        }
        .custom-shadow {
            box-shadow: 0 10px 30px -10px rgba(79, 70, 229, 0.08);
        }
        .card-hover {
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -12px rgba(79, 70, 229, 0.15);
        }
        .nav-link { position: relative; padding-bottom: 2px; }
        .nav-link::after {
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background: #4F46E5;
            transition: width 0.3s ease;
            position: absolute;
            bottom: -2px;
            left: 0;
        }
        .nav-link:hover::after { width: 100%; }
        .nav-link.active::after { width: 100%; }
        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 14px 28px;
            background: linear-gradient(135deg, #4F46E5, #7C3AED);
            color: white;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 0.875rem;
            border-radius: 14px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
        }
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(79, 70, 229, 0.4);
            color: white;
        }
        .btn-outline {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 14px 28px;
            background: white;
            color: #374151;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 0.875rem;
            border-radius: 14px;
            border: 1.5px solid #E5E7EB;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }
        .btn-outline:hover {
            border-color: #4F46E5;
            color: #4F46E5;
        }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.2); }
        }
        .pulse-dot { animation: pulse-dot 2s ease-in-out infinite; }
        @keyframes float-badge {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }
        .float-badge { animation: float-badge 3.5s ease-in-out infinite; }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in-up { animation: fadeInUp 0.6s ease forwards; }
        .tab-panel { display: none; }
        .tab-panel.active { display: block; }
        .faq-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s ease;
        }
        .faq-content.open { max-height: 300px; }
        .faq-icon { transition: transform 0.3s ease; }
        .faq-icon.rotated { transform: rotate(45deg); }
    </style>
 
    @stack('styles')
</head>
 
<body class="bg-mesh text-slate-800">
 
{{-- ===== STICKY NAVBAR ===== --}}
<nav class="sticky top-0 z-50 glass border-b border-indigo-50/50" id="main-nav">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
 
            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex-shrink-0 flex items-center gap-2.5 group">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-600 to-purple-600 flex items-center justify-center text-white shadow-lg shadow-indigo-200 group-hover:scale-105 transition-transform">
                    <i class="fa-solid fa-graduation-cap text-base"></i>
                </div>
                <span class="text-xl font-extrabold tracking-tight text-slate-900 font-display">
                    Aura<span class="text-indigo-600">Academy</span>
                </span>
            </a>
 
            {{-- Desktop Nav --}}
            <div class="hidden md:flex items-center space-x-7 text-sm font-semibold">
                <a href="{{ url('/') }}"        class="nav-link {{ request()->is('/') ? 'active text-indigo-600' : 'text-slate-600' }} hover:text-indigo-600 transition-colors">Home</a>
                <a href="{{ url('/courses') }}" class="nav-link {{ request()->is('courses*') ? 'active text-indigo-600' : 'text-slate-600' }} hover:text-indigo-600 transition-colors">Courses</a>
                <a href="{{ url('/#why-us') }}" class="nav-link text-slate-600 hover:text-indigo-600 transition-colors">Why Choose Us</a>
                <a href="{{ url('/#batches') }}" class="nav-link text-slate-600 hover:text-indigo-600 transition-colors">Batches</a>
                <a href="{{ url('/#faq') }}"    class="nav-link text-slate-600 hover:text-indigo-600 transition-colors">FAQ</a>
                <a href="{{ url('/contact') }}" class="nav-link {{ request()->is('contact*') ? 'active text-indigo-600' : 'text-slate-600' }} hover:text-indigo-600 transition-colors">Contact</a>
            </div>
 
            {{-- Auth Buttons --}}
            <div class="hidden sm:flex items-center gap-3">
                @auth
                    @if(auth()->user()->role->name === 'student')
                        <a href="{{ url('/student/dashboard') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700 transition">Dashboard</a>
                    @elseif(auth()->user()->role->name === 'teacher')
                        <a href="{{ url('/teacher/dashboard') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700 transition">Dashboard</a>
                    @else
                        <a href="{{ url('/admin/dashboard') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700 transition">Admin Panel</a>
                    @endif
                    <form action="{{ url('/logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-sm rounded-xl transition">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ url('/login') }}" class="text-sm font-semibold text-slate-600 hover:text-indigo-600 transition">LMS Login</a>
                    <a href="{{ url('/courses') }}" class="btn-primary !py-2.5 !px-5 !rounded-xl !text-sm">
                        Enroll Now <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                @endauth
            </div>
 
            {{-- Mobile Toggle --}}
            <button id="nav-toggle" class="md:hidden p-2 text-slate-600 hover:text-indigo-600 transition" aria-label="Open menu">
                <i class="fa-solid fa-bars text-xl" id="nav-icon"></i>
            </button>
        </div>
    </div>
 
    {{-- Mobile Drawer --}}
    <div id="mobile-nav" class="hidden md:hidden glass border-t border-indigo-50 px-4 pt-3 pb-6 space-y-2">
        <a href="{{ url('/') }}"        class="block py-2.5 px-3 rounded-xl text-sm font-semibold text-slate-900 hover:bg-indigo-50 hover:text-indigo-600 transition">Home</a>
        <a href="{{ url('/courses') }}" class="block py-2.5 px-3 rounded-xl text-sm font-semibold text-slate-600 hover:bg-indigo-50 hover:text-indigo-600 transition">Courses</a>
        <a href="{{ url('/#why-us') }}" class="block py-2.5 px-3 rounded-xl text-sm font-semibold text-slate-600 hover:bg-indigo-50 hover:text-indigo-600 transition">Why Choose Us</a>
        <a href="{{ url('/#batches') }}" class="block py-2.5 px-3 rounded-xl text-sm font-semibold text-slate-600 hover:bg-indigo-50 hover:text-indigo-600 transition">Batches</a>
        <a href="{{ url('/#faq') }}"    class="block py-2.5 px-3 rounded-xl text-sm font-semibold text-slate-600 hover:bg-indigo-50 hover:text-indigo-600 transition">FAQ</a>
        <a href="{{ url('/contact') }}" class="block py-2.5 px-3 rounded-xl text-sm font-semibold text-slate-600 hover:bg-indigo-50 hover:text-indigo-600 transition">Contact</a>
        <div class="pt-3 border-t border-slate-100 space-y-2">
            @auth
                @if(auth()->user()->role->name === 'student')
                    <a href="{{ url('/student/dashboard') }}" class="block text-center py-3 bg-indigo-600 text-white font-semibold rounded-xl text-sm">My Dashboard</a>
                @elseif(auth()->user()->role->name === 'teacher')
                    <a href="{{ url('/teacher/dashboard') }}" class="block text-center py-3 bg-indigo-600 text-white font-semibold rounded-xl text-sm">My Dashboard</a>
                @else
                    <a href="{{ url('/admin/dashboard') }}" class="block text-center py-3 bg-indigo-600 text-white font-semibold rounded-xl text-sm">Admin Panel</a>
                @endif
            @else
                <a href="{{ url('/login') }}"   class="block text-center py-2.5 text-sm font-semibold text-indigo-600">Login</a>
                <a href="{{ url('/courses') }}" class="block text-center py-3 bg-indigo-600 text-white font-semibold rounded-xl text-sm">Enroll Now</a>
            @endauth
        </div>
    </div>
</nav>
 
{{-- ===== MAIN CONTENT ===== --}}
<main>
    @yield('content')
</main>
 
{{-- ===== FOOTER ===== --}}
<footer class="bg-slate-950 text-slate-400 pt-16 pb-8 border-t border-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-12 gap-8 mb-12">
 
            {{-- Brand --}}
            <div class="col-span-2 md:col-span-4 space-y-5">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-xl bg-indigo-600 flex items-center justify-center text-white">
                        <i class="fa-solid fa-graduation-cap text-sm"></i>
                    </div>
                    <span class="text-lg font-bold text-white font-display">AuraAcademy</span>
                </div>
                <p class="text-sm text-slate-500 max-w-xs leading-relaxed">
                    Mastering modern engineering tracks, design, and AI globally — one skill at a time.
                </p>
                <div class="flex gap-3">
                    <a href="#" class="w-9 h-9 rounded-lg bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-indigo-600 hover:text-white transition"><i class="fa-brands fa-linkedin text-sm"></i></a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-blue-500 hover:text-white transition"><i class="fa-brands fa-twitter text-sm"></i></a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-red-600 hover:text-white transition"><i class="fa-brands fa-youtube text-sm"></i></a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-emerald-600 hover:text-white transition"><i class="fa-brands fa-whatsapp text-sm"></i></a>
                </div>
            </div>
 
            {{-- Courses --}}
            <div class="col-span-1 md:col-span-2 space-y-4">
                <h4 class="font-bold text-white text-xs uppercase tracking-widest">Courses</h4>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ url('/courses') }}" class="hover:text-white transition-colors">Web Development</a></li>
                    <li><a href="{{ url('/courses') }}" class="hover:text-white transition-colors">UI/UX Design</a></li>
                    <li><a href="{{ url('/courses') }}" class="hover:text-white transition-colors">AI & Automation</a></li>
                    <li><a href="{{ url('/courses') }}" class="hover:text-white transition-colors">Graphic Design</a></li>
                </ul>
            </div>
 
            {{-- Resources --}}
            <div class="col-span-1 md:col-span-2 space-y-4">
                <h4 class="font-bold text-white text-xs uppercase tracking-widest">Resources</h4>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ url('/login') }}"              class="hover:text-white transition-colors">LMS Login</a></li>
                    <li><a href="{{ url('/#faq') }}"               class="hover:text-white transition-colors">Help Center</a></li>
                    <li><a href="{{ url('/verify-certificate') }}" class="hover:text-white transition-colors">Verify Certificate</a></li>
                    <li><a href="{{ url('/about') }}"              class="hover:text-white transition-colors">About Us</a></li>
                </ul>
            </div>
 
            {{-- Contact --}}
            <div class="col-span-2 md:col-span-4 space-y-4">
                <h4 class="font-bold text-white text-xs uppercase tracking-widest">Contact</h4>
                <div class="space-y-3 text-sm">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-emerald-500/10 flex items-center justify-center text-emerald-400 shrink-0">
                            <i class="fa-brands fa-whatsapp text-sm"></i>
                        </div>
                        <span>+92-300-0000000</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-indigo-500/10 flex items-center justify-center text-indigo-400 shrink-0">
                            <i class="fa-regular fa-envelope text-sm"></i>
                        </div>
                        <span>info@auraacademy.com</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-purple-500/10 flex items-center justify-center text-purple-400 shrink-0">
                            <i class="fa-solid fa-location-dot text-sm"></i>
                        </div>
                        <span>Lahore, Pakistan</span>
                    </div>
                </div>
            </div>
        </div>
 
        {{-- Bottom Strip --}}
        <div class="pt-8 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-600">
            <p>&copy; {{ date('Y') }} AuraAcademy International. All rights reserved.</p>
            <div class="flex gap-5">
                <a href="#" class="hover:text-slate-400 transition">Privacy Policy</a>
                <a href="#" class="hover:text-slate-400 transition">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
 
<script>
    // Mobile Nav Toggle
    const navToggle = document.getElementById('nav-toggle');
    const mobileNav = document.getElementById('mobile-nav');
    const navIcon   = document.getElementById('nav-icon');
 
    navToggle.addEventListener('click', () => {
        mobileNav.classList.toggle('hidden');
        navIcon.className = mobileNav.classList.contains('hidden')
            ? 'fa-solid fa-bars text-xl'
            : 'fa-solid fa-xmark text-xl';
    });
 
    mobileNav.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            mobileNav.classList.add('hidden');
            navIcon.className = 'fa-solid fa-bars text-xl';
        });
    });
 
    // Navbar scroll shadow
    window.addEventListener('scroll', () => {
        const nav = document.getElementById('main-nav');
        nav.style.boxShadow = window.scrollY > 10
            ? '0 4px 20px rgba(79,70,229,0.08)'
            : 'none';
    });
 
    // FAQ Accordion
    function toggleFaq(btn) {
        const content = btn.nextElementSibling;
        const icon    = btn.querySelector('.faq-icon');
        const isOpen  = content.classList.contains('open');
        document.querySelectorAll('.faq-content').forEach(c => c.classList.remove('open'));
        document.querySelectorAll('.faq-icon').forEach(i => i.classList.remove('rotated'));
        if (!isOpen) {
            content.classList.add('open');
            icon.classList.add('rotated');
        }
    }
</script>
 
@stack('scripts')
 
</body>
</html>