
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', Setting::get('site_name', 'Aura Academy'))</title>
    <meta name="description" content="@yield('meta_description', 'Learn in-demand digital skills with Aura Academy')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
   
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
 
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
 
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
 
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #FAFAFE; color: #1E1B4B; overflow-x: hidden; scroll-behavior: smooth; }
        h1, h2, h3, h4, nav { font-family: 'Plus Jakarta Sans', sans-serif; }
        .purple-gradient-text { background: linear-gradient(135deg, #4F46E5 0%, #9333EA 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .bg-mesh { background-color: #ffffff; background-image: radial-gradient(at 0% 0%, rgba(243, 232, 255, 0.5) 0px, transparent 50%), radial-gradient(at 100% 100%, rgba(238, 242, 255, 0.6) 0px, transparent 50%); }
        .glass { background: rgba(255, 255, 255, 0.75); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border: 1px solid rgba(79, 70, 229, 0.08); }
        .custom-shadow { box-shadow: 0 10px 30px -10px rgba(79, 70, 229, 0.08); }
        .nav-link::after { content: ''; display: block; width: 0; height: 2px; background: #4F46E5; transition: width .3s; }
        .nav-link:hover::after { width: 100%; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
 
    @yield('styles')
</head>
<body class="bg-mesh text-slate-800">
 
    
    <nav class="sticky top-0 z-50 glass border-b border-indigo-50/50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
               
                <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center gap-2">
                    @if(Setting::get('site_logo'))
                    <img src="{{ Storage::url(Setting::get('site_logo')) }}" alt="{{ Setting::get('site_name') }}" class="h-10">
                    @else
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-600 to-purple-600 flex items-center justify-center text-white shadow-md shadow-indigo-200">
                        <i class="fa-solid fa-graduation-cap text-lg"></i>
                    </div>
                    <span class="text-xl font-extrabold tracking-tight text-slate-900">{{ Setting::get('site_name', 'Aura') }}<span class="text-indigo-600">Academy</span></span>
                    @endif
                </a>
 
               
                <div class="hidden md:flex space-x-8 text-sm font-medium">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'text-indigo-600' : 'text-slate-600' }} hover:text-indigo-600 transition-colors">Home</a>
                    <a href="{{ route('courses') }}" class="nav-link text-slate-600 hover:text-indigo-600 transition-colors">Courses</a>
                    <a href="{{ route('home') }}#why-choose-us" class="nav-link text-slate-600 hover:text-indigo-600 transition-colors">Why Choose Us</a>
                    <a href="{{ route('home') }}#batches" class="nav-link text-slate-600 hover:text-indigo-600 transition-colors">Batches</a>
                    <a href="{{ route('home') }}#faq" class="nav-link text-slate-600 hover:text-indigo-600 transition-colors">FAQ</a>
                    <a href="{{ route('contact') }}" class="nav-link text-slate-600 hover:text-indigo-600 transition-colors">Contact</a>
                </div>
 
               
                <div class="hidden sm:flex items-center space-x-4">
                    @auth
                        @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">Admin Panel</a>
                        @elseif(auth()->user()->isTeacher())
                        <a href="{{ route('teacher.dashboard') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">My Dashboard</a>
                        @else
                        <a href="{{ route('student.dashboard') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">My Dashboard</a>
                        @endif
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-5 py-2.5 bg-slate-800 text-white font-medium text-sm rounded-xl hover:bg-slate-900 transition">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700 transition">Login</a>
                        <a href="{{ route('courses') }}" class="px-5 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium text-sm rounded-xl hover:shadow-lg hover:shadow-indigo-200 active:scale-95 transition-all duration-200">Enroll Now</a>
                    @endauth
                </div>
 
                
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-slate-600 hover:text-indigo-600 focus:outline-none p-2">
                        <i class="fa-solid fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
 
        
        <div id="mobile-menu" class="hidden md:hidden glass border-b border-indigo-100 px-4 pt-2 pb-6 space-y-3 shadow-lg">
            <a href="{{ route('home') }}" class="block py-2 text-base font-medium text-slate-900">Home</a>
            <a href="{{ route('courses') }}" class="block py-2 text-base font-medium text-slate-600">Courses</a>
            <a href="{{ route('home') }}#why-choose-us" class="block py-2 text-base font-medium text-slate-600">Why Choose Us</a>
            <a href="{{ route('home') }}#batches" class="block py-2 text-base font-medium text-slate-600">Batches</a>
            <a href="{{ route('home') }}#faq" class="block py-2 text-base font-medium text-slate-600">FAQ</a>
            <a href="{{ route('contact') }}" class="block py-2 text-base font-medium text-slate-600">Contact</a>
            <div class="pt-4 border-t border-slate-100 flex flex-col gap-3">
                @auth
                    @if(auth()->user()->isStudent())
                    <a href="{{ route('student.dashboard') }}" class="text-center py-3 bg-indigo-600 text-white font-medium rounded-xl">My Dashboard</a>
                    @elseif(auth()->user()->isTeacher())
                    <a href="{{ route('teacher.dashboard') }}" class="text-center py-3 bg-indigo-600 text-white font-medium rounded-xl">My Dashboard</a>
                    @else
                    <a href="{{ route('admin.dashboard') }}" class="text-center py-3 bg-indigo-600 text-white font-medium rounded-xl">Admin Panel</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="text-center py-2 text-base font-medium text-indigo-600">Login</a>
                    <a href="{{ route('courses') }}" class="text-center py-3 bg-indigo-600 text-white font-medium rounded-xl">Enroll Now</a>
                @endauth
            </div>
        </div>
    </nav>
 
    
    <main>
        @yield('content')
    </main>
 
   
    <footer class="bg-slate-950 text-slate-400 pt-16 pb-8 border-t border-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 md:grid-cols-12 gap-8 mb-12">
            <div class="col-span-2 md:col-span-4 space-y-4">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-indigo-600 flex items-center justify-center text-white text-sm"><i class="fa-solid fa-graduation-cap"></i></div>
                    <span class="text-lg font-bold text-white tracking-tight">{{ Setting::get('site_name', 'AuraAcademy') }}</span>
                </div>
                <p class="text-xs sm:text-sm text-slate-500 max-w-xs leading-relaxed">Mastering modern engineering tracks, design, and AI tools globally.</p>
                <div class="flex gap-4 text-slate-500 pt-2">
                    <a href="#" class="hover:text-white transition"><i class="fa-brands fa-linkedin text-lg"></i></a>
                    <a href="#" class="hover:text-white transition"><i class="fa-brands fa-twitter text-lg"></i></a>
                    <a href="#" class="hover:text-white transition"><i class="fa-brands fa-youtube text-lg"></i></a>
                    <a href="#" class="hover:text-white transition"><i class="fa-brands fa-github text-lg"></i></a>
                </div>
            </div>
            <div class="col-span-1 md:col-span-3 space-y-3 text-xs sm:text-sm">
                <h4 class="font-bold text-white text-xs uppercase tracking-wider">Explore</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('courses') }}" class="hover:text-white transition">All Courses</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition">Contact</a></li>
                </ul>
            </div>
            <div class="col-span-1 md:col-span-2 space-y-3 text-xs sm:text-sm">
                <h4 class="font-bold text-white text-xs uppercase tracking-wider">Account</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('login') }}" class="hover:text-white transition">LMS Login</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-white transition">Register</a></li>
                    <li><a href="{{ route('home') }}#faq" class="hover:text-white transition">Help Center</a></li>
                </ul>
            </div>
            <div class="col-span-2 md:col-span-3 space-y-3 text-xs sm:text-sm">
                <h4 class="font-bold text-white text-xs uppercase tracking-wider">Contact</h4>
                <p class="text-xs text-slate-500 leading-relaxed">
                    {{ Setting::get('site_email', 'info@auraacademy.com') }}<br>
                    {{ Setting::get('site_phone', '+92-300-0000000') }}<br>
                    {{ Setting::get('site_address', 'Lahore, Pakistan') }}
                </p>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 border-t border-slate-900 text-center text-xs text-slate-600 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p>&copy; {{ date('Y') }} {{ Setting::get('site_name', 'AuraAcademy') }}. All rights reserved.</p>
            <div class="flex gap-4">
                <a href="#" class="hover:underline">Privacy Policy</a>
                <a href="#" class="hover:underline">Terms of Service</a>
            </div>
        </div>
    </footer>
 
    <script>
       
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => document.getElementById('mobile-menu').classList.add('hidden'));
        });
 
        
        function toggleFaq(buttonEl) {
            const contentPanel = buttonEl.nextElementSibling;
            const iconEl = buttonEl.querySelector('i');
            if (contentPanel.style.maxHeight && contentPanel.style.maxHeight !== "0px") {
                contentPanel.style.maxHeight = "0px";
                iconEl.style.transform = "rotate(0deg)";
            } else {
                document.querySelectorAll('.max-h-0').forEach(p => {
                    p.style.maxHeight = "0px";
                    if (p.previousElementSibling) p.previousElementSibling.querySelector('i').style.transform = "rotate(0deg)";
                });
                contentPanel.style.maxHeight = contentPanel.scrollHeight + "px";
                iconEl.style.transform = "rotate(45deg)";
            }
        }
    </script>
 
    @yield('scripts')
</body>
</html>