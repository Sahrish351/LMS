
@extends('layouts.public')

@section('title', 'Aura Academy | Learn In-Demand Digital Skills')

@push('styles')
<style>
  
  @keyframes pulse-red {
    0%,100%{box-shadow:0 0 0 0 rgba(239,68,68,.4);}
    50%{box-shadow:0 0 0 6px rgba(239,68,68,.0);}
  }
  @keyframes floatUp {
    0%,100%{transform:translateY(0);}
    50%{transform:translateY(-10px);}
  }
  @keyframes fadeSlideUp {
    from{opacity:0;transform:translateY(40px);}
    to{opacity:1;transform:translateY(0);}
  }
  @keyframes countUp {
    from{opacity:0;}
    to{opacity:1;}
  }

  .float-badge { animation:floatUp 3.5s ease-in-out infinite; }
  .float-badge:nth-child(2) { animation-delay:.8s; }
  .float-badge:nth-child(3) { animation-delay:1.6s; }

  .reveal {
    opacity:0;
    transform:translateY(50px);
    transition:opacity .7s ease, transform .7s ease;
  }
  .reveal.visible {
    opacity:1;
    transform:translateY(0);
  }
  .reveal-left {
    opacity:0;
    transform:translateX(-60px);
    transition:opacity .7s ease, transform .7s ease;
  }
  .reveal-left.visible {
    opacity:1;
    transform:translateX(0);
  }
  .reveal-right {
    opacity:0;
    transform:translateX(60px);
    transition:opacity .7s ease, transform .7s ease;
  }
  .reveal-right.visible {
    opacity:1;
    transform:translateX(0);
  }

  
  .delay-1{transition-delay:.1s;}
  .delay-2{transition-delay:.2s;}
  .delay-3{transition-delay:.3s;}
  .delay-4{transition-delay:.4s;}
  .delay-5{transition-delay:.5s;}
  .delay-6{transition-delay:.6s;}
  .delay-7{transition-delay:.7s;}


  .timeline-line {
    position:absolute;
    left:50%;
    top:0;bottom:0;
    width:2px;
    background:linear-gradient(to bottom,#7c3aed,#a78bfa,#c4b5fd);
    transform:translateX(-50%);
    z-index:0;
  }
  .timeline-step {
    display:grid;
    grid-template-columns:1fr 60px 1fr;
    gap:20px;
    align-items:center;
    margin-bottom:48px;
    position:relative;
    z-index:1;
  }

  
  .stat-num {
    font-size:clamp(28px,4vw,48px);
    font-weight:900;
    color:#fff;
    margin:0;
    font-family:'Plus Jakarta Sans',sans-serif;
    line-height:1;
  }

 
  .course-card {
    background:#fff;
    border-radius:20px;
    overflow:hidden;
    border:1.5px solid #f3f4f6;
    box-shadow:0 2px 12px rgba(0,0,0,.05);
    transition:transform .25s ease, box-shadow .25s ease;
  }
  .course-card:hover {
    transform:translateY(-6px);
    box-shadow:0 20px 48px rgba(124,58,237,.15);
  }

  
  .faq-body {
    max-height:0;
    overflow:hidden;
    transition:max-height .4s ease, padding .4s ease;
    padding:0 24px;
    background:#fff;
  }
  .faq-body.open {
    max-height:300px;
    padding:0 24px 20px;
  }

  
  @media(max-width:768px){
    .hero-grid{grid-template-columns:1fr !important;}
    .stats-grid{grid-template-columns:repeat(2,1fr) !important;}
    .features-grid{grid-template-columns:1fr !important;}
    .courses-grid{grid-template-columns:repeat(2,1fr) !important;}
    .reviews-grid{grid-template-columns:1fr !important;}
    .contact-grid{grid-template-columns:1fr !important;}
    .timeline-step{grid-template-columns:1fr !important;}
    .timeline-step .step-right{display:none !important;}
    .timeline-line{left:20px !important;}
    .hero-right-img{display:none;}
    .batches-table-header{display:none !important;}
    .batch-row{display:block !important;padding:16px !important;}
  }
  @media(max-width:480px){
    .courses-grid{grid-template-columns:1fr !important;}
  }
</style>
@endpush

@section('content')


<section id="home" style="background:linear-gradient(135deg,#f5f3ff 0%,#ede9fe 40%,#f0fdf4 100%);padding:15px 0 100px;min-height:90vh;display:flex;align-items:center;">
  <div style="max-width:1200px;margin:0 auto;padding:0 24px;width:100%;">
    <div class="hero-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center;">

      
      <div style="animation:fadeSlideUp .8s ease forwards;">
        

        <h1 style="font-size:clamp(38px,5vw,60px);font-weight:900;line-height:1.08;color:#0f0f0f;margin:0 0 24px;font-family:'Plus Jakarta Sans',sans-serif;">
          Learn In-Demand<br>
          Skills &amp; <span style="color:#7c3aed;">Build Your<br>Dream Career</span>
        </h1>

        <p style="font-size:16px;color:#6b7280;line-height:1.75;margin:0 0 36px;max-width:480px;">
          Join <strong style="color:#7c3aed;">10,000+</strong> students mastering digital skills with expert mentors, live classes, hands-on projects, and industry-recognized certificates — all in one powerful LMS platform.
        </p>

        <div style="display:flex;gap:16px;flex-wrap:wrap;margin-bottom:40px;">
          <a href="{{ url('/courses') }}" style="display:inline-flex;align-items:center;gap:8px;background:#7c3aed;color:#fff;padding:16px 34px;border-radius:14px;font-weight:700;font-size:15px;text-decoration:none;box-shadow:0 6px 20px rgba(124,58,237,.4);transition:all .2s;" onmouseenter="this.style.transform='translateY(-2px)';this.style.boxShadow='0 10px 30px rgba(124,58,237,.5)';" onmouseleave="this.style.transform='none';this.style.boxShadow='0 6px 20px rgba(124,58,237,.4)';">
            Enroll Now <i class="fa-solid fa-arrow-right"></i>
          </a>
          <a href="{{ url('/courses') }}" style="display:inline-flex;align-items:center;gap:8px;background:#fff;color:#374151;padding:16px 34px;border-radius:14px;font-weight:700;font-size:15px;text-decoration:none;border:2px solid #e5e7eb;transition:all .2s;" onmouseenter="this.style.borderColor='#7c3aed';this.style.color='#7c3aed';" onmouseleave="this.style.borderColor='#e5e7eb';this.style.color='#374151';">
            <i class="fa-solid fa-play" style="color:#7c3aed;font-size:12px;"></i> Explore Courses
          </a>
        </div>

        
        <div style="display:flex;gap:28px;flex-wrap:wrap;margin-bottom:28px;">
          @foreach([['fa-users','10,000+ Students'],['fa-book-open','50+ Courses'],['fa-certificate','95% Success Rate']] as $ms)
          <div style="display:flex;align-items:center;gap:8px;">
            <i class="fa-solid {{ $ms[0] }}" style="color:#7c3aed;font-size:17px;"></i>
            <span style="font-size:14px;font-weight:600;color:#374151;">{{ $ms[1] }}</span>
          </div>
          @endforeach
        </div>

      
        <div style="display:flex;align-items:center;gap:12px;">
          <div style="display:flex;">
            @foreach(['https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=60','https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=60','https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=60','https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?w=60'] as $av)
            <img src="{{ $av }}" style="width:38px;height:38px;border-radius:50%;border:2.5px solid #fff;margin-left:-10px;object-fit:cover;box-shadow:0 2px 6px rgba(0,0,0,.1);" alt="">
            @endforeach
          </div>
          <div>
            <div style="display:flex;align-items:center;gap:4px;">
              @for($i=0;$i<5;$i++)<i class="fa-solid fa-star" style="color:#f59e0b;font-size:13px;"></i>@endfor
              <span style="font-weight:800;color:#0f0f0f;margin-left:6px;font-size:15px;">4.9</span>
            </div>
            <p style="font-size:12px;color:#9ca3af;margin:2px 0 0;">from 2,400+ reviews</p>
          </div>
        </div>
      </div>

      
      <div class="hero-right-img" style="position:relative;padding:20px 20px 40px 0;">

        
        <div style="border-radius:24px;overflow:hidden;box-shadow:0 30px 70px rgba(109,40,217,.25);position:relative;">
          <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=700&q=80"
               alt="Students learning" style="width:100%;height:390px;object-fit:cover;display:block;">
          <div style="position:absolute;inset:0;background:linear-gradient(135deg,rgba(109,40,217,.15),rgba(124,58,237,.05));"></div>
        </div>

        <div class="float-badge" style="position:absolute;top:-14px;right:-10px;background:#fff;border-radius:16px;padding:13px 18px;box-shadow:0 10px 30px rgba(0,0,0,.12);display:flex;align-items:center;gap:10px;">
          <span style="width:10px;height:10px;background:#ef4444;border-radius:50%;display:inline-block;box-shadow:0 0 0 3px rgba(239,68,68,.2);"></span>
          <div>
            <p style="font-size:13px;font-weight:800;color:#0f0f0f;margin:0;">Live Class Now</p>
            <p style="font-size:11px;color:#6b7280;margin:0;">234 students joined</p>
          </div>
        </div>

     
        <div class="float-badge" style="position:absolute;bottom:10px;left:-20px;background:#fff;border-radius:16px;padding:13px 18px;box-shadow:0 10px 30px rgba(0,0,0,.12);display:flex;align-items:center;gap:12px;">
          <div style="width:42px;height:42px;background:#ede9fe;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <i class="fa-solid fa-award" style="color:#7c3aed;font-size:20px;"></i>
          </div>
          <div>
            <p style="font-size:13px;font-weight:800;color:#0f0f0f;margin:0;">Certificate Earned!</p>
            <p style="font-size:11px;color:#7c3aed;font-weight:600;margin:0;">Full-Stack Development</p>
          </div>
        </div>

       
        <div class="float-badge" style="position:absolute;bottom:10px;right:-10px;background:#fff;border-radius:16px;padding:14px 22px;box-shadow:0 10px 30px rgba(0,0,0,.12);text-align:center;min-width:120px;">
          <p style="font-size:11px;color:#6b7280;margin:0 0 4px;">Your Progress</p>
          <p id="hero-percent" style="font-size:30px;font-weight:900;color:#7c3aed;margin:0;line-height:1;">0%</p>
          <div style="width:80px;height:5px;background:#ede9fe;border-radius:3px;margin:6px auto 0;">
            <div id="hero-progress-bar" style="width:0%;height:100%;background:#7c3aed;border-radius:3px;transition:width 2s ease;"></div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>



<section style="background:linear-gradient(135deg,#5b21b6,#7c3aed,#6d28d9);padding:72px 0;">
  <div style="max-width:1200px;margin:0 auto;padding:0 24px;">
    <div class="stats-grid" style="display:grid;grid-template-columns:repeat(4,1fr);gap:24px;">
      @php
      $stats = [
        ['icon'=>'fa-users',          'num'=>10000, 'suffix'=>'+', 'label'=>'Students Enrolled'],
        ['icon'=>'fa-book-open',       'num'=>50,    'suffix'=>'+', 'label'=>'Expert Courses'],
        ['icon'=>'fa-chalkboard-user', 'num'=>20,    'suffix'=>'+', 'label'=>'Expert Instructors'],
        ['icon'=>'fa-arrow-trend-up',  'num'=>95,    'suffix'=>'%', 'label'=>'Success Rate'],
      ];
      @endphp
      @foreach($stats as $i => $s)
      <div class="reveal delay-{{ $i+1 }}" style="background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.18);border-radius:22px;padding:36px 24px;text-align:center;backdrop-filter:blur(10px);">
        <div style="width:56px;height:56px;background:rgba(255,255,255,.18);border-radius:16px;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;">
          <i class="fa-solid {{ $s['icon'] }}" style="color:#fff;font-size:24px;"></i>
        </div>
        <p class="stat-num count-num" data-target="{{ $s['num'] }}" data-suffix="{{ $s['suffix'] }}">0{{ $s['suffix'] }}</p>
        <p style="font-size:13px;color:rgba(255,255,255,.75);margin:8px 0 0;font-weight:500;">{{ $s['label'] }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>



<section id="why-us" style="padding:96px 0;background:#fff;">
  <div style="max-width:1200px;margin:0 auto;padding:0 24px;">
    <div class="reveal" style="text-align:center;margin-bottom:64px;">
      <span style="display:inline-block;background:#ede9fe;color:#7c3aed;font-size:13px;font-weight:700;padding:7px 20px;border-radius:999px;border:1.5px solid #c4b5fd;margin-bottom:16px;">Why Choose Us</span>
      <h2 style="font-size:clamp(28px,4vw,44px);font-weight:900;color:#0f0f0f;margin:0 0 16px;font-family:'Plus Jakarta Sans',sans-serif;">Everything You Need to Succeed</h2>
      <p style="font-size:16px;color:#6b7280;max-width:560px;margin:0 auto;line-height:1.7;">We've built the perfect learning environment combining expert knowledge, practical experience, and ongoing support to launch your digital career.</p>
    </div>

    @php
    $features = [
      ['icon'=>'fa-user-tie',    'title'=>'Expert Mentorship',   'desc'=>'Get 1-on-1 guidance from industry professionals with 10+ years of real-world experience.'],
      ['icon'=>'fa-briefcase',   'title'=>'Practical Projects',  'desc'=>'Build a professional portfolio with real-world projects you can showcase to employers.'],
      ['icon'=>'fa-video',       'title'=>'Live Classes',         'desc'=>'Attend weekly live sessions with interactive Q&A. All recordings saved for lifetime access.'],
      ['icon'=>'fa-infinity',    'title'=>'Lifetime Access',      'desc'=>'Learn at your own pace with lifetime access to all course materials and future updates.'],
      ['icon'=>'fa-compass',     'title'=>'Career Guidance',      'desc'=>'Receive dedicated job placement support, resume reviews, interview prep, and employer connections.'],
      ['icon'=>'fa-circle-check','title'=>'Verified Certificates','desc'=>'Earn industry-accepted certificates with QR verification — trusted by 500+ employers across Pakistan.'],
    ];
    @endphp

    <div class="features-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;">
      @foreach($features as $i => $f)
      <div class="reveal delay-{{ $i+1 }}" style="background:#fff;border:1.5px solid #f3f4f6;border-radius:22px;padding:36px 28px;transition:all .25s;box-shadow:0 2px 12px rgba(0,0,0,.04);" onmouseenter="this.style.boxShadow='0 16px 48px rgba(124,58,237,.12)';this.style.borderColor='#c4b5fd';this.style.transform='translateY(-4px)';" onmouseleave="this.style.boxShadow='0 2px 12px rgba(0,0,0,.04)';this.style.borderColor='#f3f4f6';this.style.transform='translateY(0)';">
        <div style="width:52px;height:52px;background:#ede9fe;border-radius:16px;display:flex;align-items:center;justify-content:center;margin-bottom:22px;">
          <i class="fa-solid {{ $f['icon'] }}" style="color:#7c3aed;font-size:22px;"></i>
        </div>
        <h3 style="font-size:17px;font-weight:800;color:#0f0f0f;margin:0 0 10px;font-family:'Plus Jakarta Sans',sans-serif;">{{ $f['title'] }}</h3>
        <p style="font-size:14px;color:#6b7280;line-height:1.75;margin:0;">{{ $f['desc'] }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>



<section id="courses" style="padding:96px 0;background:#f9fafb;">
  <div style="max-width:1200px;margin:0 auto;padding:0 24px;">
    <div class="reveal" style="text-align:center;margin-bottom:48px;">
      <span style="display:inline-block;background:#ede9fe;color:#7c3aed;font-size:13px;font-weight:700;padding:7px 20px;border-radius:999px;border:1.5px solid #c4b5fd;margin-bottom:16px;">Featured Courses</span>
      <h2 style="font-size:clamp(28px,4vw,44px);font-weight:900;color:#0f0f0f;margin:0 0 16px;font-family:'Plus Jakarta Sans',sans-serif;">Courses Built for Your Career</h2>
      <p style="font-size:16px;color:#6b7280;max-width:560px;margin:0 auto;">Choose from 50+ professionally designed courses taught by industry experts. Earn recognized certificates and build real-world skills.</p>
    </div>

   
    <div class="reveal" style="display:flex;gap:10px;justify-content:center;margin-bottom:40px;flex-wrap:wrap;">
      @php $tabs=['All','Development','Marketing','Design','Data & Analytics']; @endphp
      @foreach($tabs as $i => $tab)
      <button onclick="filterTab(this,'{{ strtolower(str_replace(' & ','_',$tab)) }}')"
        style="padding:9px 24px;border-radius:999px;font-size:14px;font-weight:600;border:2px solid {{ $i===0?'#7c3aed':'#e5e7eb' }};background:{{ $i===0?'#7c3aed':'#fff' }};color:{{ $i===0?'#fff':'#374151' }};cursor:pointer;transition:all .2s;">
        {{ $tab }}
      </button>
      @endforeach
    </div>

    @php
    $courses = [
      ['title'=>'Full-Stack Web Development','badge'=>'Best Seller','bc'=>'#f59e0b','level'=>'Advanced','lbg'=>'#ede9fe','lc'=>'#7c3aed','dur'=>'6 months','enr'=>'2,840','teacher'=>'Mr. Ahmed Khan','price'=>'$299','rating'=>'4.9','cat'=>'development','img'=>'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=400&q=80'],
      ['title'=>'Digital Marketing Mastery','badge'=>'Most Popular','bc'=>'#10b981','level'=>'Beginner','lbg'=>'#d1fae5','lc'=>'#065f46','dur'=>'3 months','enr'=>'3,120','teacher'=>'Ms. Sarah Ali','price'=>'$149','rating'=>'4.8','cat'=>'marketing','img'=>'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&q=80'],
      ['title'=>'UI/UX Design Fundamentals','badge'=>'New','bc'=>'#8b5cf6','level'=>'Beginner','lbg'=>'#d1fae5','lc'=>'#065f46','dur'=>'4 months','enr'=>'1,960','teacher'=>'Mr. Usman Tariq','price'=>'$199','rating'=>'4.9','cat'=>'design','img'=>'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=400&q=80'],
      ['title'=>'Data Analytics & Python','badge'=>'Trending','bc'=>'#ef4444','level'=>'Intermediate','lbg'=>'#ede9fe','lc'=>'#5b21b6','dur'=>'5 months','enr'=>'1,540','teacher'=>'Ms. Ayesha Malik','price'=>'$249','rating'=>'4.7','cat'=>'data_&_analytics','img'=>'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&q=80'],
      ['title'=>'Social Media Marketing','badge'=>'','bc'=>'','level'=>'Beginner','lbg'=>'#d1fae5','lc'=>'#065f46','dur'=>'2 months','enr'=>'4,200','teacher'=>'Ms. Nadia Hussain','price'=>'$99','rating'=>'4.8','cat'=>'marketing','img'=>'https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?w=400&q=80'],
      ['title'=>'Graphic Design Pro','badge'=>'','bc'=>'','level'=>'Beginner','lbg'=>'#d1fae5','lc'=>'#065f46','dur'=>'3 months','enr'=>'2,380','teacher'=>'Mr. Hassan Raza','price'=>'$129','rating'=>'4.8','cat'=>'design','img'=>'https://images.unsplash.com/photo-1626785774573-4b799315345d?q=80&w=871&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
      ['title'=>'SEO & Content Strategy','badge'=>'','bc'=>'','level'=>'Intermediate','lbg'=>'#ede9fe','lc'=>'#5b21b6','dur'=>'2 months','enr'=>'1,720','teacher'=>'Mr. Bilal Ahmed','price'=>'$119','rating'=>'4.7','cat'=>'marketing','img'=>'https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?w=400&q=80'],
      ['title'=>'Video Editing & Production','badge'=>'','bc'=>'','level'=>'Beginner','lbg'=>'#d1fae5','lc'=>'#065f46','dur'=>'3 months','enr'=>'1,890','teacher'=>'Ms. Zainab Siddiqui','price'=>'$149','rating'=>'4.9','cat'=>'design','img'=>'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?w=400&q=80'],
    ];
    @endphp

    <div class="courses-grid" id="courses-grid" style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;">
      @foreach($courses as $i => $c)
      <div class="course-card reveal delay-{{ ($i%4)+1 }}" data-cat="{{ $c['cat'] }}">
        <div style="position:relative;">
          <img src="{{ $c['img'] }}" alt="{{ $c['title'] }}" style="width:100%;height:165px;object-fit:cover;display:block;">
          @if($c['badge'])
          <span style="position:absolute;top:12px;left:12px;background:{{ $c['bc'] }};color:#fff;font-size:11px;font-weight:700;padding:4px 10px;border-radius:8px;">{{ $c['badge'] }}</span>
          @endif
          <span style="position:absolute;top:12px;right:12px;background:rgba(0,0,0,.65);color:#fff;font-size:11px;font-weight:600;padding:4px 8px;border-radius:8px;display:flex;align-items:center;gap:3px;">
            <i class="fa-solid fa-star" style="color:#f59e0b;font-size:10px;"></i> {{ $c['rating'] }}
          </span>
        </div>
        <div style="padding:18px;">
          <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;">
            <span style="background:{{ $c['lbg'] }};color:{{ $c['lc'] }};font-size:11px;font-weight:600;padding:3px 10px;border-radius:6px;">{{ $c['level'] }}</span>
            <span style="font-size:11px;color:#6b7280;display:flex;align-items:center;gap:3px;"><i class="fa-solid fa-certificate" style="color:#7c3aed;font-size:10px;"></i> Certificate</span>
          </div>
          <h3 style="font-size:14px;font-weight:800;color:#0f0f0f;margin:0 0 8px;line-height:1.4;font-family:'Plus Jakarta Sans',sans-serif;">{{ $c['title'] }}</h3>
          <div style="display:flex;gap:12px;font-size:12px;color:#9ca3af;margin-bottom:4px;">
            <span><i class="fa-regular fa-clock" style="color:#7c3aed;"></i> {{ $c['dur'] }}</span>
            <span><i class="fa-regular fa-user" style="color:#7c3aed;"></i> {{ $c['enr'] }}</span>
          </div>
          <p style="font-size:12px;color:#9ca3af;margin:0 0 14px;">by {{ $c['teacher'] }}</p>
          <p style="font-size:22px;font-weight:900;color:#7c3aed;margin:0 0 14px;font-family:'Plus Jakarta Sans',sans-serif;">{{ $c['price'] }}</p>
          <div style="display:flex;gap:8px;">
            <a href="{{ url('/courses') }}" style="flex:1;text-align:center;padding:9px;border:2px solid #e5e7eb;border-radius:10px;font-size:13px;font-weight:600;color:#374151;text-decoration:none;transition:all .2s;" onmouseenter="this.style.borderColor='#7c3aed';this.style.color='#7c3aed';" onmouseleave="this.style.borderColor='#e5e7eb';this.style.color='#374151';">Details</a>
            <a href="{{ url('/courses') }}" style="flex:1;text-align:center;padding:9px;background:#7c3aed;border-radius:10px;font-size:13px;font-weight:700;color:#fff;text-decoration:none;display:flex;align-items:center;justify-content:center;gap:5px;transition:background .2s;" onmouseenter="this.style.background='#6d28d9';" onmouseleave="this.style.background='#7c3aed';">Enroll <i class="fa-solid fa-arrow-right" style="font-size:10px;"></i></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="reveal" style="text-align:center;margin-top:44px;">
      <a href="{{ url('/courses') }}" style="display:inline-flex;align-items:center;gap:8px;border:2px solid #7c3aed;color:#7c3aed;padding:14px 32px;border-radius:14px;font-weight:700;font-size:15px;text-decoration:none;transition:all .2s;" onmouseenter="this.style.background='#7c3aed';this.style.color='#fff';" onmouseleave="this.style.background='transparent';this.style.color='#7c3aed';">
        View All 50+ Courses <i class="fa-solid fa-arrow-right"></i>
      </a>
    </div>
  </div>
</section>



<section style="padding:96px 0;background:#f8f7ff;">
  <div style="max-width:900px;margin:0 auto;padding:0 24px;">
    <div class="reveal" style="text-align:center;margin-bottom:64px;">
      <span style="display:inline-block;background:#ede9fe;color:#7c3aed;font-size:13px;font-weight:700;padding:7px 20px;border-radius:999px;border:1.5px solid #c4b5fd;margin-bottom:16px;">Your Learning Path</span>
      <h2 style="font-size:clamp(28px,4vw,44px);font-weight:900;color:#0f0f0f;margin:0 0 16px;font-family:'Plus Jakarta Sans',sans-serif;">From Enrollment to Career Success</h2>
      <p style="font-size:16px;color:#6b7280;max-width:600px;margin:0 auto;line-height:1.7;">Our proven 7-step learning journey is designed to take you from complete beginner to job-ready professional.</p>
    </div>

    @php
    $steps = [
      ['num'=>'1','icon'=>'fa-magnifying-glass','title'=>'Choose Your Course','desc'=>'Browse our 50+ expert-led courses and pick the skill you want to master.','side'=>'left'],
      ['num'=>'2','icon'=>'fa-credit-card','title'=>'Enroll & Pay','desc'=>'Secure your spot with our easy, safe payment options including installment plans.','side'=>'right'],
      ['num'=>'3','icon'=>'fa-desktop','title'=>'Get LMS Access','desc'=>'Instantly access your personalized student dashboard with all course materials.','side'=>'left'],
      ['num'=>'4','icon'=>'fa-play','title'=>'Watch Lessons','desc'=>'Learn via HD video lessons, live classes, and downloadable resources at your own pace.','side'=>'right'],
      ['num'=>'5','icon'=>'fa-file-lines','title'=>'Complete Assignments','desc'=>'Apply your knowledge through hands-on projects reviewed by expert mentors.','side'=>'left'],
      ['num'=>'6','icon'=>'fa-circle-check','title'=>'Pass Assessments','desc'=>'Demonstrate your skills through quizzes and a final assessment with instant feedback.','side'=>'right'],
      ['num'=>'7','icon'=>'fa-award','title'=>'Receive Certificate','desc'=>'Earn your industry-recognized, QR-verified digital certificate to share with employers.','side'=>'left'],
    ];
    @endphp

    <div style="position:relative;">
      
      <div class="timeline-line"></div>

      @foreach($steps as $i => $step)
      <div class="timeline-step">
       
        @if($step['side'] === 'left')
        <div class="reveal-left delay-{{ $i+1 }}" style="background:#fff;border-radius:18px;padding:22px;box-shadow:0 4px 20px rgba(0,0,0,.07);border:1.5px solid #f3f4f6;display:flex;align-items:flex-start;gap:14px;">
          <div style="width:42px;height:42px;background:#ede9fe;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <i class="fa-solid {{ $step['icon'] }}" style="color:#7c3aed;font-size:16px;"></i>
          </div>
          <div>
            <h4 style="font-size:15px;font-weight:800;color:#0f0f0f;margin:0 0 6px;font-family:'Plus Jakarta Sans',sans-serif;">{{ $step['title'] }}</h4>
            <p style="font-size:13px;color:#6b7280;margin:0;line-height:1.65;">{{ $step['desc'] }}</p>
          </div>
        </div>
        @else
        <div></div>
        @endif

        
        <div style="display:flex;justify-content:center;align-items:center;z-index:1;">
          <div class="reveal delay-{{ $i+1 }}" style="width:44px;height:44px;background:#7c3aed;border-radius:50%;display:flex;align-items:center;justify-content:center;border:4px solid #f8f7ff;box-shadow:0 0 0 3px #c4b5fd;">
            <span style="color:#fff;font-weight:900;font-size:15px;">{{ $step['num'] }}</span>
          </div>
        </div>

     
        @if($step['side'] === 'right')
        <div class="reveal-right delay-{{ $i+1 }}" style="background:#fff;border-radius:18px;padding:22px;box-shadow:0 4px 20px rgba(0,0,0,.07);border:1.5px solid #f3f4f6;display:flex;align-items:flex-start;gap:14px;">
          <div style="width:42px;height:42px;background:#ede9fe;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <i class="fa-solid {{ $step['icon'] }}" style="color:#7c3aed;font-size:16px;"></i>
          </div>
          <div>
            <h4 style="font-size:15px;font-weight:800;color:#0f0f0f;margin:0 0 6px;font-family:'Plus Jakarta Sans',sans-serif;">{{ $step['title'] }}</h4>
            <p style="font-size:13px;color:#6b7280;margin:0;line-height:1.65;">{{ $step['desc'] }}</p>
          </div>
        </div>
        @else
        <div></div>
        @endif
      </div>
      @endforeach
    </div>
  </div>
</section>




<section id="batches" style="padding:96px 0;background:#fff;">
  <div style="max-width:1200px;margin:0 auto;padding:0 24px;">
    <div class="reveal" style="text-align:center;margin-bottom:56px;">
      <span style="display:inline-block;background:#ede9fe;color:#7c3aed;font-size:13px;font-weight:700;padding:7px 20px;border-radius:999px;border:1.5px solid #c4b5fd;margin-bottom:16px;">Upcoming Batches</span>
      <h2 style="font-size:clamp(28px,4vw,44px);font-weight:900;color:#0f0f0f;margin:0 0 16px;font-family:'Plus Jakarta Sans',sans-serif;">Reserve Your Seat Today</h2>
      <p style="font-size:16px;color:#6b7280;max-width:560px;margin:0 auto;">New batches start every month. Seats are limited — enroll early to secure your place and special early-bird pricing.</p>
    </div>

    <div class="reveal" style="border-radius:22px;overflow:hidden;border:1.5px solid #f3f4f6;box-shadow:0 6px 30px rgba(0,0,0,.07);">
    
      <div class="batches-table-header" style="display:grid;grid-template-columns:2fr 1.2fr 1.5fr 1.8fr 1fr;gap:16px;background:#7c3aed;padding:18px 28px;">
        @foreach(['COURSE','START DATE','INSTRUCTOR','SEATS AVAILABLE','ACTION'] as $h)
        <div style="color:rgba(255,255,255,.85);font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;">{{ $h }}</div>
        @endforeach
      </div>

      @php
      $batches = [
        ['cat'=>'Development','cbg'=>'#ede9fe','cc'=>'#5b21b6','course'=>'Full-Stack Web Development','date'=>'July 5, 2026','teacher'=>'Mr. Ahmed Khan','seats'=>8,'total'=>30,'status'=>'filling'],
        ['cat'=>'Marketing','cbg'=>'#d1fae5','cc'=>'#065f46','course'=>'Digital Marketing Mastery','date'=>'July 10, 2026','teacher'=>'Ms. Sarah Ali','seats'=>12,'total'=>25,'status'=>'half'],
        ['cat'=>'Design','cbg'=>'#fce7f3','cc'=>'#9d174d','course'=>'UI/UX Design Fundamentals','date'=>'July 15, 2026','teacher'=>'Mr. Usman Tariq','seats'=>5,'total'=>30,'status'=>'filling'],
        ['cat'=>'Data','cbg'=>'#fef3c7','cc'=>'#92400e','course'=>'Data Analytics & Python','date'=>'July 20, 2026','teacher'=>'Ms. Ayesha Malik','seats'=>15,'total'=>25,'status'=>'good'],
        ['cat'=>'Design','cbg'=>'#fce7f3','cc'=>'#9d174d','course'=>'Graphic Design Pro','date'=>'July 25, 2026','teacher'=>'Mr. Hassan Raza','seats'=>20,'total'=>30,'status'=>'good'],
      ];
      @endphp

      @foreach($batches as $i => $b)
      <div class="batch-row reveal" style="display:grid;grid-template-columns:2fr 1.2fr 1.5fr 1.8fr 1fr;gap:16px;align-items:center;padding:20px 28px;background:#fff;border-top:1px solid #f3f4f6;transition:background .2s;" onmouseenter="this.style.background='#faf9ff';" onmouseleave="this.style.background='#fff';">
        <div>
          <span style="display:inline-block;background:{{ $b['cbg'] }};color:{{ $b['cc'] }};font-size:11px;font-weight:600;padding:3px 10px;border-radius:6px;margin-bottom:6px;">{{ $b['cat'] }}</span>
          <p style="font-size:14px;font-weight:700;color:#0f0f0f;margin:0;font-family:'Plus Jakarta Sans',sans-serif;">{{ $b['course'] }}</p>
        </div>
        <div style="display:flex;align-items:center;gap:6px;font-size:13px;color:#374151;">
          <i class="fa-regular fa-calendar" style="color:#7c3aed;"></i> {{ $b['date'] }}
        </div>
        <div style="display:flex;align-items:center;gap:6px;font-size:13px;color:#374151;">
          <i class="fa-regular fa-user" style="color:#7c3aed;"></i> {{ $b['teacher'] }}
        </div>
        <div>
          @if($b['status']==='filling')
          <div style="display:flex;align-items:center;gap:6px;margin-bottom:6px;">
            <span style="width:8px;height:8px;background:#ef4444;border-radius:50%;display:inline-block;"></span>
            <span style="font-size:12px;font-weight:600;color:#ef4444;">Filling Fast!</span>
            <span style="font-size:12px;color:#6b7280;margin-left:auto;">{{ $b['seats'] }} left</span>
          </div>
          <div style="height:6px;background:#fee2e2;border-radius:3px;overflow:hidden;">
            <div style="height:100%;background:#ef4444;border-radius:3px;width:{{ round((1-$b['seats']/$b['total'])*100) }}%;"></div>
          </div>
          @elseif($b['status']==='half')
          <div style="display:flex;align-items:center;justify-content:flex-end;margin-bottom:6px;">
            <span style="font-size:12px;color:#6b7280;">{{ $b['seats'] }} left</span>
          </div>
          <div style="height:6px;background:#fde68a;border-radius:3px;overflow:hidden;">
            <div style="height:100%;background:#f59e0b;border-radius:3px;width:{{ round((1-$b['seats']/$b['total'])*100) }}%;"></div>
          </div>
          @else
          <div style="display:flex;align-items:center;justify-content:flex-end;margin-bottom:6px;">
            <span style="font-size:12px;color:#6b7280;">{{ $b['seats'] }} left</span>
          </div>
          <div style="height:6px;background:#d1fae5;border-radius:3px;overflow:hidden;">
            <div style="height:100%;background:#10b981;border-radius:3px;width:{{ round((1-$b['seats']/$b['total'])*100) }}%;"></div>
          </div>
          @endif
        </div>
        <div>
          <a href="{{ url('/courses') }}" style="display:inline-flex;align-items:center;gap:6px;background:#7c3aed;color:#fff;padding:10px 20px;border-radius:12px;font-size:13px;font-weight:700;text-decoration:none;white-space:nowrap;transition:background .2s;" onmouseenter="this.style.background='#6d28d9';" onmouseleave="this.style.background='#7c3aed';">
            Enroll Now <i class="fa-solid fa-arrow-right" style="font-size:11px;"></i>
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>



<section style="padding:96px 0;background:#f9fafb;">
  <div style="max-width:1200px;margin:0 auto;padding:0 24px;">
    <div class="reveal" style="text-align:center;margin-bottom:48px;">
      <span style="display:inline-block;background:#ede9fe;color:#7c3aed;font-size:13px;font-weight:700;padding:7px 20px;border-radius:999px;border:1.5px solid #c4b5fd;margin-bottom:16px;">LMS Platform</span>
      <h2 style="font-size:clamp(28px,4vw,44px);font-weight:900;color:#0f0f0f;margin:0 0 16px;font-family:'Plus Jakarta Sans',sans-serif;">A Powerful Learning Platform</h2>
      <p style="font-size:16px;color:#6b7280;max-width:600px;margin:0 auto;">Our state-of-the-art LMS gives students and teachers everything they need — from live lessons to progress tracking.</p>
    </div>

    <div class="reveal" style="display:flex;gap:12px;justify-content:center;margin-bottom:32px;flex-wrap:wrap;">
      @foreach([['dashboard','fa-desktop','Student Dashboard'],['learning','fa-book-open','Course Learning'],['assignments','fa-file-lines','Assignments'],['certs','fa-certificate','Certificates']] as $tab)
      <button onclick="switchLmsTab('{{ $tab[0] }}')" id="lms-btn-{{ $tab[0] }}"
        style="display:flex;align-items:center;gap:8px;padding:11px 22px;border-radius:999px;background:{{ $tab[0]==='dashboard'?'#7c3aed':'#fff' }};color:{{ $tab[0]==='dashboard'?'#fff':'#374151' }};border:2px solid {{ $tab[0]==='dashboard'?'#7c3aed':'#e5e7eb' }};font-size:14px;font-weight:600;cursor:pointer;transition:all .2s;">
        <i class="fa-solid {{ $tab[1] }}"></i> {{ $tab[2] }}
      </button>
      @endforeach
    </div>

    <div class="reveal" style="background:#1a1a2e;border-radius:22px;overflow:hidden;box-shadow:0 30px 80px rgba(0,0,0,.3);">
      <div style="background:#0f0f23;padding:14px 20px;display:flex;align-items:center;gap:8px;">
        <div style="width:13px;height:13px;background:#ef4444;border-radius:50%;"></div>
        <div style="width:13px;height:13px;background:#f59e0b;border-radius:50%;"></div>
        <div style="width:13px;height:13px;background:#22c55e;border-radius:50%;"></div>
        <div style="flex:1;background:rgba(255,255,255,.07);border-radius:6px;height:28px;margin-left:12px;"></div>
      </div>

      
      <div id="lms-panel-dashboard" style="display:flex;min-height:380px;">
        <div style="width:60px;background:#12122a;display:flex;flex-direction:column;align-items:center;gap:20px;padding:24px 0;">
          @foreach(['fa-desktop','fa-book-open','fa-file-lines','fa-chart-bar','fa-certificate'] as $ic)
          <div style="width:38px;height:38px;background:rgba(255,255,255,.07);border-radius:10px;display:flex;align-items:center;justify-content:center;">
            <i class="fa-solid {{ $ic }}" style="color:rgba(255,255,255,.4);font-size:14px;"></i>
          </div>
          @endforeach
        </div>
        <div style="flex:1;padding:30px;background:#16162e;">
          <p style="color:rgba(255,255,255,.5);font-size:12px;margin:0 0 4px;">Welcome back,</p>
          <h3 style="color:#fff;font-size:20px;font-weight:800;margin:0 0 24px;font-family:'Plus Jakarta Sans',sans-serif;">Fatima Zahra 👋</h3>
          <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:24px;">
            @foreach([['fa-book-open','4','Courses'],['fa-clock','127','Hours'],['fa-certificate','2','Certificates']] as $card)
            <div style="background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.08);border-radius:16px;padding:20px;">
              <i class="fa-solid {{ $card[0] }}" style="color:rgba(255,255,255,.4);font-size:16px;display:block;margin-bottom:12px;"></i>
              <p style="color:#fff;font-size:26px;font-weight:900;margin:0;font-family:'Plus Jakarta Sans',sans-serif;">{{ $card[1] }}</p>
              <p style="color:rgba(255,255,255,.4);font-size:12px;margin:4px 0 0;">{{ $card[2] }}</p>
            </div>
            @endforeach
          </div>
          <p style="color:rgba(255,255,255,.6);font-size:13px;font-weight:600;margin:0 0 14px;">Active Courses</p>
          @foreach([['Full-Stack Web Dev','78%','#7c3aed'],['UI/UX Design','45%','#a78bfa']] as $p)
          <div style="margin-bottom:14px;">
            <div style="display:flex;justify-content:space-between;margin-bottom:6px;">
              <span style="font-size:13px;color:rgba(255,255,255,.8);">{{ $p[0] }}</span>
              <span style="font-size:13px;color:{{ $p[2] }};font-weight:700;">{{ $p[1] }}</span>
            </div>
            <div style="height:6px;background:rgba(255,255,255,.08);border-radius:3px;overflow:hidden;">
              <div style="height:100%;background:{{ $p[2] }};border-radius:3px;width:{{ $p[1] }};"></div>
            </div>
          </div>
          @endforeach
        </div>
      </div>

   
      <div id="lms-panel-learning" style="display:none;min-height:380px;background:#16162e;padding:28px;">
        <div style="display:grid;grid-template-columns:1fr 280px;gap:20px;">
          <div style="background:rgba(255,255,255,.04);border-radius:16px;display:flex;align-items:center;justify-content:center;min-height:300px;border:1px solid rgba(255,255,255,.08);">
            <div style="text-align:center;">
              <div style="width:64px;height:64px;background:#7c3aed;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;">
                <i class="fa-solid fa-play" style="color:#fff;font-size:22px;margin-left:3px;"></i>
              </div>
              <p style="color:rgba(255,255,255,.5);font-size:13px;">Module 3: Advanced Layouts</p>
            </div>
          </div>
          <div>
            <p style="color:rgba(255,255,255,.5);font-size:11px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;margin:0 0 14px;">Course Modules</p>
            @foreach([['fa-circle-check','#22c55e','Intro to HTML/CSS','done'],['fa-circle-check','#22c55e','JavaScript Basics','done'],['fa-circle-play','#7c3aed','Advanced Layouts','active'],['fa-lock','rgba(255,255,255,.2)','React Framework','locked'],['fa-lock','rgba(255,255,255,.2)','Backend with Node','locked']] as $m)
            <div style="display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:10px;margin-bottom:6px;background:{{ $m[3]==='active'?'rgba(124,58,237,.15)':'rgba(255,255,255,.03)' }};border:1px solid {{ $m[3]==='active'?'rgba(124,58,237,.3)':'transparent' }};">
              <i class="fa-solid {{ $m[0] }}" style="color:{{ $m[1] }};font-size:13px;"></i>
              <span style="font-size:13px;color:{{ $m[3]==='locked'?'rgba(255,255,255,.25)':($m[3]==='active'?'#c4b5fd':'rgba(255,255,255,.7)') }};">{{ $m[2] }}</span>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      
      <div id="lms-panel-assignments" style="display:none;min-height:380px;background:#16162e;padding:28px;">
        <h3 style="color:#fff;font-weight:800;font-size:18px;margin:0 0 20px;font-family:'Plus Jakarta Sans',sans-serif;">My Assignments</h3>
        @foreach([['Build a Responsive Landing Page','Full-Stack Web Dev','Due Jul 8','#f59e0b'],['Create Marketing Campaign','Digital Marketing','✓ Graded','#22c55e'],['Figma UI Prototype','UI/UX Design','Due Jul 15','#f59e0b']] as $a)
        <div style="background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.08);border-radius:14px;padding:16px;margin-bottom:12px;display:flex;align-items:center;justify-content:space-between;">
          <div>
            <p style="color:#fff;font-size:14px;font-weight:600;margin:0 0 4px;">{{ $a[0] }}</p>
            <p style="color:rgba(255,255,255,.4);font-size:12px;margin:0;">{{ $a[1] }}</p>
          </div>
          <span style="background:{{ $a[3] }}22;color:{{ $a[3] }};font-size:11px;font-weight:700;padding:5px 12px;border-radius:8px;">{{ $a[2] }}</span>
        </div>
        @endforeach
      </div>

   
      <div id="lms-panel-certs" style="display:none;min-height:380px;background:#16162e;padding:28px;">
        <h3 style="color:#fff;font-weight:800;font-size:18px;margin:0 0 20px;font-family:'Plus Jakarta Sans',sans-serif;">My Certificates</h3>
        @foreach([['Full-Stack Web Development','AURA-2026-001','June 2026'],['Digital Marketing Mastery','AURA-2026-002','May 2026']] as $cert)
        <div style="background:linear-gradient(135deg,rgba(124,58,237,.2),rgba(109,40,217,.1));border:1px solid rgba(124,58,237,.3);border-radius:16px;padding:20px;margin-bottom:14px;display:flex;align-items:center;gap:16px;">
          <div style="width:50px;height:50px;background:rgba(124,58,237,.3);border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <i class="fa-solid fa-award" style="color:#c4b5fd;font-size:24px;"></i>
          </div>
          <div style="flex:1;">
            <p style="color:#fff;font-size:14px;font-weight:700;margin:0 0 4px;">{{ $cert[0] }}</p>
            <p style="color:rgba(255,255,255,.4);font-size:12px;margin:0;">ID: {{ $cert[1] }} · Issued {{ $cert[2] }}</p>
          </div>
          <a href="#" style="background:#7c3aed;color:#fff;font-size:12px;font-weight:700;padding:9px 18px;border-radius:10px;text-decoration:none;">Download</a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>



<section id="success" style="padding:96px 0;background:#fff;">
  <div style="max-width:1200px;margin:0 auto;padding:0 24px;">
    <div class="reveal" style="text-align:center;margin-bottom:48px;">
      <span style="display:inline-block;background:#ede9fe;color:#7c3aed;font-size:13px;font-weight:700;padding:7px 20px;border-radius:999px;border:1.5px solid #c4b5fd;margin-bottom:16px;">Success Stories</span>
      <h2 style="font-size:clamp(28px,4vw,44px);font-weight:900;color:#0f0f0f;margin:0 0 16px;font-family:'Plus Jakarta Sans',sans-serif;">Real Results from Real Students</h2>
      <p style="font-size:16px;color:#6b7280;max-width:560px;margin:0 auto;">Over 10,000 students have transformed their careers with SkillsAcademy. Here's what some of them have to say.</p>
    </div>

   
    <div class="reveal" style="background:#f9fafb;border:1.5px solid #f3f4f6;border-radius:22px;padding:36px;margin-bottom:48px;">
      <div style="display:grid;grid-template-columns:auto 1fr auto;gap:48px;align-items:center;">
        <div style="text-align:center;">
          <p style="font-size:64px;font-weight:900;color:#0f0f0f;margin:0;line-height:1;font-family:'Plus Jakarta Sans',sans-serif;">4.9</p>
          <div style="display:flex;gap:3px;justify-content:center;margin:8px 0;">
            @for($i=0;$i<5;$i++)<i class="fa-solid fa-star" style="color:#f59e0b;font-size:20px;"></i>@endfor
          </div>
          <p style="font-size:13px;color:#6b7280;margin:0;font-weight:500;">Overall Rating</p>
        </div>
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:28px;">
          @foreach([['Course Quality','98%'],['Instructor','97%'],['Career Support','95%']] as $r)
          <div>
            <div style="display:flex;justify-content:space-between;margin-bottom:7px;">
              <span style="font-size:13px;color:#374151;font-weight:500;">{{ $r[0] }}</span>
              <span style="font-size:13px;color:#7c3aed;font-weight:700;">{{ $r[1] }}</span>
            </div>
            <div style="height:7px;background:#ede9fe;border-radius:4px;overflow:hidden;">
              <div style="height:100%;background:#7c3aed;border-radius:4px;width:{{ $r[1] }};"></div>
            </div>
          </div>
          @endforeach
        </div>
        <div style="text-align:center;">
          <p style="font-size:40px;font-weight:900;color:#7c3aed;margin:0;font-family:'Plus Jakarta Sans',sans-serif;">2,400+</p>
          <p style="font-size:13px;color:#6b7280;margin:4px 0 0;">Reviews</p>
        </div>
      </div>
    </div>

    @php
    $reviews = [
      ['quote'=>'I went from zero coding knowledge to landing my first job as a web developer in just 8 months. The structured curriculum and 1-on-1 mentorship made all the difference. My salary doubled what I was making before!','badge'=>'Got hired within 2 months of graduating','bc'=>'#22c55e','name'=>'Fatima Zahra','role'=>'Junior Web Developer @ TechCorp','course'=>'Full-Stack Web Development','img'=>'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=60'],
      ['quote'=>'The practical projects were game-changing. I was running real ad campaigns with real budgets during the course. By graduation, I had a portfolio that impressed every recruiter I spoke to.','badge'=>'Salary increased by 180%','bc'=>'#7c3aed','name'=>'Muhammad Bilal','role'=>'Digital Marketing Manager','course'=>'Digital Marketing Mastery','img'=>'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=60'],
      ['quote'=>'The live classes were incredibly interactive and the instructor\'s feedback on my designs was invaluable. I built a portfolio of 8 real projects that I\'m proud to show. Got 3 offers before even finishing the course!','badge'=>'3 job offers before graduation','bc'=>'#f59e0b','name'=>'Amna Iqbal','role'=>'UX Designer @ StartupHub','course'=>'UI/UX Design Fundamentals','img'=>'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=60'],
      ['quote'=>'Coming from a non-technical background, I was worried the course would be too difficult. But the step-by-step approach and patient mentors made everything clear. Now I\'m earning 3x my previous salary.','badge'=>'3x salary increase','bc'=>'#22c55e','name'=>'Hassan Ali','role'=>'Data Analyst @ FinTech','course'=>'Data Analytics & Python','img'=>'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=60'],
      ['quote'=>'I started freelancing on Fiverr during my course and by the time I graduated, I was already making consistent income. The certificate helped me get Level 2 Seller status faster than I expected.','badge'=>'Making $2K+/month freelancing','bc'=>'#7c3aed','name'=>'Sara Malik','role'=>'Freelance Marketer','course'=>'Digital Marketing Mastery','img'=>'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?w=60'],
      ['quote'=>'This course gave me a complete system for SEO that I now use for all my clients. The instructor shared real case studies and techniques that actually work. Highly recommended!','badge'=>'Built agency with 8 clients','bc'=>'#f59e0b','name'=>'Omar Farooq','role'=>'SEO Consultant','course'=>'SEO & Content Strategy','img'=>'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=60'],
    ];
    @endphp

    <div class="reviews-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;">
      @foreach($reviews as $i => $r)
      <div class="reveal delay-{{ ($i%3)+1 }}" style="background:#fff;border:1.5px solid #f3f4f6;border-radius:22px;padding:28px;box-shadow:0 2px 14px rgba(0,0,0,.05);transition:all .25s;" onmouseenter="this.style.boxShadow='0 14px 48px rgba(0,0,0,.10)';" onmouseleave="this.style.boxShadow='0 2px 14px rgba(0,0,0,.05)';">
        <div style="display:flex;gap:2px;margin-bottom:16px;">
          @for($i=0;$i<5;$i++)<i class="fa-solid fa-star" style="color:#f59e0b;font-size:14px;"></i>@endfor
        </div>
        <p style="font-size:14px;color:#374151;line-height:1.75;margin:0 0 16px;font-style:italic;">"{{ $r['quote'] }}"</p>
        <span style="display:inline-flex;align-items:center;gap:6px;background:{{ $r['bc'] }}18;color:{{ $r['bc'] }};font-size:11px;font-weight:700;padding:5px 12px;border-radius:999px;margin-bottom:20px;border:1px solid {{ $r['bc'] }}30;">
          <span style="width:6px;height:6px;background:{{ $r['bc'] }};border-radius:50%;display:inline-block;"></span>
          {{ $r['badge'] }}
        </span>
        <div style="display:flex;align-items:center;gap:12px;padding-top:16px;border-top:1px solid #f3f4f6;">
          <img src="{{ $r['img'] }}" alt="{{ $r['name'] }}" style="width:46px;height:46px;border-radius:50%;object-fit:cover;">
          <div>
            <p style="font-size:14px;font-weight:800;color:#0f0f0f;margin:0;font-family:'Plus Jakarta Sans',sans-serif;">{{ $r['name'] }}</p>
            <p style="font-size:12px;color:#6b7280;margin:2px 0;">{{ $r['role'] }}</p>
            <p style="font-size:11px;color:#7c3aed;font-weight:700;margin:0;">{{ $r['course'] }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>



<section style="background:linear-gradient(135deg,#4c1d95,#7c3aed,#5b21b6);padding:96px 0;position:relative;overflow:hidden;">
  <div style="position:absolute;top:-100px;right:-100px;width:400px;height:400px;background:rgba(255,255,255,.05);border-radius:50%;"></div>
  <div style="position:absolute;bottom:-100px;left:-100px;width:300px;height:300px;background:rgba(255,255,255,.04);border-radius:50%;"></div>

  <div style="max-width:1200px;margin:0 auto;padding:0 24px;position:relative;">
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:80px;align-items:center;">
      <div class="reveal-left">
        <span style="display:inline-block;background:rgba(255,255,255,.15);color:#fff;font-size:13px;font-weight:700;padding:7px 18px;border-radius:999px;border:1px solid rgba(255,255,255,.2);margin-bottom:20px;">Certificate Verification</span>
        <h2 style="font-size:clamp(28px,3.5vw,42px);font-weight:900;color:#fff;margin:0 0 16px;font-family:'Plus Jakarta Sans',sans-serif;">Verify Any Certificate Instantly</h2>
        <p style="font-size:16px;color:rgba(255,255,255,.75);line-height:1.7;margin:0 0 32px;">Enter a certificate ID to instantly verify its authenticity. All certificates include QR verification trusted by 500+ employers.</p>

        <div style="background:rgba(255,255,255,.12);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,.2);border-radius:22px;padding:28px;">
          <div style="display:flex;align-items:center;gap:10px;margin-bottom:16px;">
            <div style="width:38px;height:38px;background:rgba(255,255,255,.15);border-radius:10px;display:flex;align-items:center;justify-content:center;">
              <i class="fa-solid fa-shield-halved" style="color:#fff;font-size:16px;"></i>
            </div>
            <div>
              <p style="font-size:14px;font-weight:700;color:#fff;margin:0;">Certificate Lookup</p>
              <p style="font-size:12px;color:rgba(255,255,255,.6);margin:0;">Enter ID (e.g. AURA-2026-0841)</p>
            </div>
          </div>
          <div style="display:flex;gap:10px;">
            <input id="cert-input" type="text" placeholder="AURA-YYYY-XXXX" style="flex:1;background:rgba(255,255,255,.92);border:none;border-radius:12px;padding:13px 16px;font-size:14px;color:#374151;outline:none;font-family:monospace;font-weight:600;">
            <button onclick="verifyCert()" style="display:flex;align-items:center;gap:6px;background:#fff;color:#7c3aed;padding:13px 22px;border-radius:12px;font-size:14px;font-weight:700;border:none;cursor:pointer;">
              <i class="fa-solid fa-magnifying-glass"></i> Verify
            </button>
          </div>
          <div id="cert-result" style="display:none;margin-top:12px;"></div>
          <p style="font-size:12px;color:rgba(255,255,255,.5);margin:12px 0 0;">Demo: Try <strong style="font-family:monospace;color:rgba(255,255,255,.8);">AURA-2026-0841</strong></p>
          <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-top:16px;">
            @foreach([['fa-shield-halved','Tamper-Proof'],['fa-qrcode','QR Verified'],['fa-bolt','Instant Check']] as $f)
            <div style="background:rgba(255,255,255,.1);border-radius:10px;padding:10px;text-align:center;">
              <i class="fa-solid {{ $f[0] }}" style="color:rgba(255,255,255,.8);font-size:16px;display:block;margin-bottom:4px;"></i>
              <span style="font-size:11px;color:rgba(255,255,255,.7);font-weight:600;">{{ $f[1] }}</span>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="reveal-right">
        <div style="background:rgba(255,255,255,.12);border-radius:22px;padding:24px;margin-bottom:16px;text-align:center;">
          <div style="display:grid;grid-template-columns:repeat(7,1fr);gap:5px;max-width:210px;margin:0 auto 12px;">
            @for($i=0;$i<49;$i++)
            @php $on=in_array($i,[0,1,2,3,4,5,6,7,14,21,28,35,42,43,44,45,46,47,48,10,11,12,20,27,34,15,22,29,36,8,13,16,18,30,32]); @endphp
            <div style="width:100%;aspect-ratio:1;border-radius:3px;background:{{ $on?'rgba(255,255,255,.85)':'rgba(255,255,255,.1)' }};"></div>
            @endfor
          </div>
          <p style="color:rgba(255,255,255,.8);font-size:13px;font-weight:700;margin:0;">AURA-2026-0841</p>
          <p style="color:rgba(255,255,255,.4);font-size:11px;margin:4px 0 0;">Scan to verify</p>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
          @foreach([['10K+','Certs Issued'],['500+','Employers Trust'],['99.9%','Uptime'],['< 1s','Verify Time']] as $s)
          <div style="background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.15);border-radius:16px;padding:18px;text-align:center;">
            <p style="font-size:24px;font-weight:900;color:#fff;margin:0;font-family:'Plus Jakarta Sans',sans-serif;">{{ $s[0] }}</p>
            <p style="font-size:12px;color:rgba(255,255,255,.6);margin:4px 0 0;">{{ $s[1] }}</p>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>


<section id="faq" style="padding:96px 0;background:#fff;">
  <div style="max-width:800px;margin:0 auto;padding:0 24px;">
    <div class="reveal" style="text-align:center;margin-bottom:56px;">
      <span style="display:inline-block;background:#ede9fe;color:#7c3aed;font-size:13px;font-weight:700;padding:7px 20px;border-radius:999px;border:1.5px solid #c4b5fd;margin-bottom:16px;">FAQ</span>
      <h2 style="font-size:clamp(28px,4vw,44px);font-weight:900;color:#0f0f0f;margin:0 0 16px;font-family:'Plus Jakarta Sans',sans-serif;">Frequently Asked Questions</h2>
      <p style="font-size:16px;color:#6b7280;max-width:480px;margin:0 auto;">Have questions? We've answered the most common ones below. Still need help? Contact us anytime.</p>
    </div>

    @php
    $faqs = [
      ['q'=>'How do I enroll in a course?','a'=>"Enrolling is simple! Browse our course catalog, click 'Enroll Now', complete the payment (we accept cards, bank transfer, and installment plans), and you'll get instant LMS access within minutes."],
      ['q'=>'How do I access the LMS platform?','a'=>'After enrollment, you receive login credentials via email. Log in and access all your course materials, live classes, assignments, and progress tracking from your personalized dashboard.'],
      ['q'=>'What payment methods do you accept?','a'=>'We accept credit/debit cards, bank transfer (HBL, Meezan, UBL), EasyPaisa, JazzCash, and installment plans for all courses.'],
      ['q'=>'Are the live classes recorded?','a'=>'Yes! All live sessions are recorded and uploaded to your dashboard within 24 hours. You have lifetime access to all recordings and materials.'],
      ['q'=>'How long does it take to get the certificate?','a'=>'Certificates are issued automatically once you complete all lessons, submit assignments, and pass the final assessment. The PDF certificate appears in your dashboard instantly.'],
      ['q'=>'Is there a job placement guarantee?','a'=>'We offer dedicated career support including resume reviews, interview prep, LinkedIn optimization, and employer connections. 95% of our graduates find relevant work within 6 months.'],
    ];
    @endphp

    @foreach($faqs as $i => $faq)
    <div class="reveal" style="border:1.5px solid {{ $i===0?'#c4b5fd':'#f3f4f6' }};border-radius:18px;overflow:hidden;margin-bottom:12px;transition:border-color .2s;">
      <button onclick="toggleFaqNew(this)" style="width:100%;display:flex;align-items:center;justify-content:space-between;padding:20px 24px;background:{{ $i===0?'#faf9ff':'#fff' }};border:none;cursor:pointer;text-align:left;" data-open="{{ $i===0?'true':'false' }}">
        <span style="font-size:15px;font-weight:700;color:{{ $i===0?'#7c3aed':'#0f0f0f' }};font-family:'Plus Jakarta Sans',sans-serif;">{{ $faq['q'] }}</span>
        <i class="fa-solid {{ $i===0?'fa-chevron-up':'fa-chevron-down' }}" style="color:#7c3aed;font-size:13px;margin-left:16px;transition:transform .3s;flex-shrink:0;"></i>
      </button>
      <div class="faq-body {{ $i===0?'open':'' }}">
        <p style="font-size:14px;color:#6b7280;line-height:1.8;margin:0;">{{ $faq['a'] }}</p>
      </div>
    </div>
    @endforeach
  </div>
</section>



<section id="contact" style="padding:96px 0;background:#f9fafb;border-top:1.5px solid #f3f4f6;">
  <div style="max-width:1200px;margin:0 auto;padding:0 24px;">
    <div class="contact-grid" style="display:grid;grid-template-columns:1fr 1.4fr;gap:64px;align-items:start;">

      {{-- Left --}}
      <div class="reveal-left">
        <span style="display:inline-block;background:#ede9fe;color:#7c3aed;font-size:13px;font-weight:700;padding:7px 20px;border-radius:999px;border:1.5px solid #c4b5fd;margin-bottom:20px;">Contact Us</span>
        <h2 style="font-size:clamp(26px,3.5vw,38px);font-weight:900;color:#0f0f0f;margin:0 0 16px;font-family:'Plus Jakarta Sans',sans-serif;">Get in Touch With Our Team</h2>
        <p style="font-size:15px;color:#6b7280;line-height:1.75;margin:0 0 36px;">Have questions about courses or need guidance? Our team is ready to help you find the right path for your career goals.</p>

        <div style="display:flex;flex-direction:column;gap:14px;">
          <a href="https://wa.me/923096545239" target="_blank" style="display:flex;align-items:center;gap:16px;padding:18px;background:#f0fdf4;border:1.5px solid #bbf7d0;border-radius:18px;text-decoration:none;transition:all .2s;" onmouseenter="this.style.borderColor='#4ade80';" onmouseleave="this.style.borderColor='#bbf7d0';">
            <div style="width:46px;height:46px;background:#22c55e;border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;box-shadow:0 4px 12px rgba(34,197,94,.3);">
              <i class="fa-brands fa-whatsapp" style="color:#fff;font-size:22px;"></i>
            </div>
            <div>
              <p style="font-size:11px;font-weight:700;color:#16a34a;text-transform:uppercase;letter-spacing:.06em;margin:0 0 2px;">WhatsApp Support</p>
              <p style="font-size:15px;font-weight:800;color:#0f0f0f;margin:0;">+92-309-6545239</p>
            </div>
            <i class="fa-solid fa-arrow-right" style="color:#22c55e;margin-left:auto;font-size:14px;"></i>
          </a>

          @foreach([['fa-regular fa-envelope','#7c3aed','Email Us','sahrish291103@gmail.com'],['fa-solid fa-location-dot','#7c3aed','Office','Sheikhpura, Punjab, Pakistan'],['fa-regular fa-clock','#7c3aed','Support Hours','Mon–Sat, 9 AM – 8 PM']] as $info)
          <div style="display:flex;align-items:center;gap:16px;padding:16px 18px;background:#fff;border:1.5px solid #f3f4f6;border-radius:18px;box-shadow:0 2px 8px rgba(0,0,0,.04);">
            <div style="width:46px;height:46px;background:#ede9fe;border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
              <i class="{{ $info[0] }}" style="color:{{ $info[1] }};font-size:18px;"></i>
            </div>
            <div>
              <p style="font-size:11px;font-weight:700;color:#7c3aed;text-transform:uppercase;letter-spacing:.06em;margin:0 0 2px;">{{ $info[2] }}</p>
              <p style="font-size:14px;font-weight:700;color:#0f0f0f;margin:0;">{{ $info[3] }}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <div class="reveal-right" style="background:#fff;border:1.5px solid #f3f4f6;border-radius:24px;padding:40px;box-shadow:0 6px 30px rgba(0,0,0,.07);">
        <h3 style="font-size:20px;font-weight:800;color:#0f0f0f;margin:0 0 24px;font-family:'Plus Jakarta Sans',sans-serif;">Send Us a Message</h3>

        @if(session('contact_success'))
        <div style="background:#f0fdf4;border:1.5px solid #bbf7d0;border-radius:14px;padding:16px;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
          <i class="fa-solid fa-circle-check" style="color:#22c55e;font-size:20px;"></i>
          <p style="font-size:14px;font-weight:600;color:#16a34a;margin:0;">Message sent! We'll get back to you within 24 hours.</p>
        </div>
        @endif

        <form action="{{ url('/contact') }}" method="POST">
          @csrf
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
            <div>
              <label style="display:block;font-size:12px;font-weight:700;color:#374151;text-transform:uppercase;letter-spacing:.05em;margin-bottom:7px;">Full Name</label>
              <input type="text" name="name" required placeholder="Ali Hassan" value="{{ old('name') }}"
                style="width:100%;border:1.5px solid #e5e7eb;border-radius:12px;padding:13px 16px;font-size:14px;color:#374151;outline:none;box-sizing:border-box;transition:border-color .2s;"
                onfocus="this.style.borderColor='#7c3aed';" onblur="this.style.borderColor='#e5e7eb';">
              @error('name')<p style="color:#ef4444;font-size:12px;margin:4px 0 0;">{{ $message }}</p>@enderror
            </div>
            <div>
              <label style="display:block;font-size:12px;font-weight:700;color:#374151;text-transform:uppercase;letter-spacing:.05em;margin-bottom:7px;">Email Address</label>
              <input type="email" name="email" required placeholder="ali@email.com" value="{{ old('email') }}"
                style="width:100%;border:1.5px solid #e5e7eb;border-radius:12px;padding:13px 16px;font-size:14px;color:#374151;outline:none;box-sizing:border-box;transition:border-color .2s;"
                onfocus="this.style.borderColor='#7c3aed';" onblur="this.style.borderColor='#e5e7eb';">
              @error('email')<p style="color:#ef4444;font-size:12px;margin:4px 0 0;">{{ $message }}</p>@enderror
            </div>
          </div>
          <div style="margin-bottom:16px;">
            <label style="display:block;font-size:12px;font-weight:700;color:#374151;text-transform:uppercase;letter-spacing:.05em;margin-bottom:7px;">Phone Number</label>
            <input type="tel" name="phone" placeholder="+92-300-0000000" value="{{ old('phone') }}"
              style="width:100%;border:1.5px solid #e5e7eb;border-radius:12px;padding:13px 16px;font-size:14px;color:#374151;outline:none;box-sizing:border-box;transition:border-color .2s;"
              onfocus="this.style.borderColor='#7c3aed';" onblur="this.style.borderColor='#e5e7eb';">
          </div>
          <div style="margin-bottom:16px;">
            <label style="display:block;font-size:12px;font-weight:700;color:#374151;text-transform:uppercase;letter-spacing:.05em;margin-bottom:7px;">Course Interest</label>
            <select name="course_interest" style="width:100%;border:1.5px solid #e5e7eb;border-radius:12px;padding:13px 16px;font-size:14px;color:#374151;outline:none;background:#fff;box-sizing:border-box;" onfocus="this.style.borderColor='#7c3aed';" onblur="this.style.borderColor='#e5e7eb';">
              <option value="">Select a course...</option>
              <option value="fullstack">Full-Stack Web Development</option>
              <option value="marketing">Digital Marketing Mastery</option>
              <option value="uiux">UI/UX Design Fundamentals</option>
              <option value="data">Data Analytics & Python</option>
              <option value="other">Other / Not Sure</option>
            </select>
          </div>
          <div style="margin-bottom:24px;">
            <label style="display:block;font-size:12px;font-weight:700;color:#374151;text-transform:uppercase;letter-spacing:.05em;margin-bottom:7px;">Your Message</label>
            <textarea name="message" required rows="4" placeholder="Tell us about your background and goals..."
              style="width:100%;border:1.5px solid #e5e7eb;border-radius:12px;padding:13px 16px;font-size:14px;color:#374151;outline:none;resize:none;box-sizing:border-box;transition:border-color .2s;"
              onfocus="this.style.borderColor='#7c3aed';" onblur="this.style.borderColor='#e5e7eb';">{{ old('message') }}</textarea>
            @error('message')<p style="color:#ef4444;font-size:12px;margin:4px 0 0;">{{ $message }}</p>@enderror
          </div>
          <button type="submit" style="width:100%;background:linear-gradient(135deg,#6d28d9,#7c3aed);color:#fff;padding:16px;border-radius:14px;font-size:15px;font-weight:700;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;font-family:'Plus Jakarta Sans',sans-serif;transition:opacity .2s;" onmouseenter="this.style.opacity='.9';" onmouseleave="this.style.opacity='1';">
            Send Message <i class="fa-solid fa-paper-plane"></i>
          </button>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>

const revealObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
    }
  });
}, { threshold: 0.12 });

document.querySelectorAll('.reveal, .reveal-left, .reveal-right').forEach(el => {
  revealObserver.observe(el);
});


const countObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting && !entry.target.dataset.counted) {
      entry.target.dataset.counted = 'true';
      const target = parseInt(entry.target.dataset.target);
      const suffix = entry.target.dataset.suffix || '';
      let start = 0;
      const duration = 2000;
      const step = Math.ceil(target / (duration / 16));
      const timer = setInterval(() => {
        start += step;
        if (start >= target) {
          start = target;
          clearInterval(timer);
        }
        entry.target.textContent = (start >= 1000 ? (start/1000).toFixed(0)+'K' : start) + suffix;
      }, 16);
    }
  });
}, { threshold: 0.5 });

document.querySelectorAll('.count-num').forEach(el => countObserver.observe(el));


window.addEventListener('load', () => {
  setTimeout(() => {
    const bar = document.getElementById('hero-progress-bar');
    const pct = document.getElementById('hero-percent');
    if (bar) bar.style.width = '78%';
    if (pct) {
      let n = 0;
      const t = setInterval(() => {
        n++;
        pct.textContent = n + '%';
        if (n >= 78) clearInterval(t);
      }, 25);
    }
  }, 800);
});


function filterTab(btn, cat) {
  document.querySelectorAll('.course-card').forEach(c => {
    c.style.display = (cat === 'all' || c.dataset.cat === cat) ? 'block' : 'none';
  });
  document.querySelectorAll('[onclick^="filterTab"]').forEach(b => {
    b.style.background = '#fff';
    b.style.color = '#374151';
    b.style.borderColor = '#e5e7eb';
  });
  btn.style.background = '#7c3aed';
  btn.style.color = '#fff';
  btn.style.borderColor = '#7c3aed';
}


function switchLmsTab(tab) {
  ['dashboard','learning','assignments','certs'].forEach(t => {
    const panel = document.getElementById('lms-panel-' + t);
    const btn   = document.getElementById('lms-btn-'   + t);
    if (panel) panel.style.display = 'none';
    if (btn) {
      btn.style.background   = '#fff';
      btn.style.color        = '#374151';
      btn.style.borderColor  = '#e5e7eb';
    }
  });
  const activePanel = document.getElementById('lms-panel-' + tab);
  const activeBtn   = document.getElementById('lms-btn-'   + tab);
  if (activePanel) activePanel.style.display = tab === 'dashboard' ? 'flex' : 'block';
  if (activeBtn) {
    activeBtn.style.background  = '#7c3aed';
    activeBtn.style.color       = '#fff';
    activeBtn.style.borderColor = '#7c3aed';
  }
}


function toggleFaqNew(btn) {
  const body  = btn.nextElementSibling;
  const icon  = btn.querySelector('i');
  const isOpen = btn.dataset.open === 'true';

 
  document.querySelectorAll('[onclick="toggleFaqNew(this)"]').forEach(b => {
    b.nextElementSibling.classList.remove('open');
    b.style.background = '#fff';
    b.querySelector('span').style.color = '#0f0f0f';
    b.querySelector('i').className = 'fa-solid fa-chevron-down';
    b.dataset.open = 'false';
    b.closest('div').style.borderColor = '#f3f4f6';
  });

  if (!isOpen) {
    body.classList.add('open');
    btn.style.background = '#faf9ff';
    btn.querySelector('span').style.color = '#7c3aed';
    icon.className = 'fa-solid fa-chevron-up';
    btn.dataset.open = 'true';
    btn.closest('div').style.borderColor = '#c4b5fd';
  }
}


function verifyCert() {
  const val    = document.getElementById('cert-input').value.trim().toUpperCase();
  const result = document.getElementById('cert-result');
  result.style.display = 'block';
  if (!val) { result.style.display = 'none'; return; }

  const valid = ['AURA-2026-0841','AURA-99X2','SKA-2026-0841'];
  if (valid.includes(val)) {
    result.innerHTML = '<div style="background:rgba(34,197,94,.18);border:1px solid rgba(34,197,94,.35);border-radius:12px;padding:14px;display:flex;align-items:center;gap:10px;"><i class="fa-solid fa-circle-check" style="color:#22c55e;font-size:18px;"></i><div><p style="color:#fff;font-size:13px;font-weight:700;margin:0;">Certificate Verified ✓</p><p style="color:rgba(255,255,255,.7);font-size:12px;margin:3px 0 0;">Graduate: <strong>Fatima Zahra</strong> · Full-Stack Web Development · June 2026</p></div></div>';
  } else {
    result.innerHTML = '<div style="background:rgba(239,68,68,.18);border:1px solid rgba(239,68,68,.35);border-radius:12px;padding:14px;display:flex;align-items:center;gap:10px;"><i class="fa-solid fa-triangle-exclamation" style="color:#ef4444;font-size:18px;"></i><div><p style="color:#fff;font-size:13px;font-weight:700;margin:0;">Certificate Not Found</p><p style="color:rgba(255,255,255,.7);font-size:12px;margin:3px 0 0;">Please check the ID. Demo: <strong>AURA-2026-0841</strong></p></div></div>';
  }
}


function handleResize() {
  const w = window.innerWidth;
  const g = document.getElementById('courses-grid');
  if (g) g.style.gridTemplateColumns = w < 480 ? '1fr' : w < 768 ? 'repeat(2,1fr)' : w < 1024 ? 'repeat(3,1fr)' : 'repeat(4,1fr)';
}
window.addEventListener('resize', handleResize);
handleResize();
</script>
@endpush
