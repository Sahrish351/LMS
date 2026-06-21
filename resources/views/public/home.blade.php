
@extends('layouts.public')

@section('title', 'SkillsAcademy | Learn In-Demand Digital Skills')

@section('content')


<section id="home" style="background: linear-gradient(135deg, #f8f7ff 0%, #ede9fe 50%, #f3f4f6 100%); min-height: 90vh; display: flex; align-items: center; padding: 20px 0 60px;">
  <div style="max-width:1200px;margin:0 auto;padding:0 24px;width:100%;">
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center;">

      
      <div>
        

        <h1 style="font-size:clamp(36px,5vw,58px);font-weight:900;line-height:1.1;color:#0f0f0f;margin-bottom:24px;font-family:'Plus Jakarta Sans',sans-serif;">
          Learn In-Demand<br>
          Skills &amp; <span style="color:#7c3aed;">Build Your<br>Dream Career</span>
        </h1>

        <p style="font-size:16px;color:#6b7280;line-height:1.7;margin-bottom:36px;max-width:480px;">
          Join 10,000+ students mastering <span style="color:#7c3aed;">digital skills</span> with expert mentors, live classes, hands-on projects and industry-recognized certificates — all in one powerful LMS platform.
        </p>

        <div style="display:flex;gap:16px;flex-wrap:wrap;">
          <a href="{{ url('/courses') }}" style="display:inline-flex;align-items:center;gap:8px;background:#7c3aed;color:#fff;padding:16px 32px;border-radius:12px;font-weight:700;font-size:15px;text-decoration:none;transition:all .2s;">
            Enroll Now <i class="fa-solid fa-arrow-right"></i>
          </a>
          <a href="{{ url('/courses') }}" style="display:inline-flex;align-items:center;gap:8px;background:#fff;color:#374151;padding:16px 32px;border-radius:12px;font-weight:700;font-size:15px;text-decoration:none;border:2px solid #e5e7eb;transition:all .2s;">
            <i class="fa-solid fa-play" style="color:#7c3aed;font-size:12px;"></i> Explore Courses
          </a>
        </div>

        <div style="display:flex;gap:32px;margin-top:40px;flex-wrap:wrap;">
          <div style="display:flex;align-items:center;gap:8px;">
            <i class="fa-solid fa-users" style="color:#7c3aed;font-size:18px;"></i>
            <span style="font-size:14px;font-weight:600;color:#374151;">10,000+ Students</span>
          </div>
          <div style="display:flex;align-items:center;gap:8px;">
            <i class="fa-solid fa-book-open" style="color:#7c3aed;font-size:18px;"></i>
            <span style="font-size:14px;font-weight:600;color:#374151;">50+ Courses</span>
          </div>
          <div style="display:flex;align-items:center;gap:8px;">
            <i class="fa-solid fa-certificate" style="color:#7c3aed;font-size:18px;"></i>
            <span style="font-size:14px;font-weight:600;color:#374151;">95% Success Rate</span>
          </div>
        </div>

        
        <div style="display:flex;align-items:center;gap:12px;margin-top:28px;">
          <div style="display:flex;">
            @foreach(['https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=60','https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=60','https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=60','https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?w=60'] as $av)
            <img src="{{ $av }}" style="width:36px;height:36px;border-radius:50%;border:2px solid #fff;margin-left:-8px;object-fit:cover;" alt="">
            @endforeach
          </div>
          <div>
            <div style="display:flex;gap:2px;">
              @for($i=0;$i<5;$i++)<i class="fa-solid fa-star" style="color:#f59e0b;font-size:13px;"></i>@endfor
              <span style="font-weight:700;color:#111;margin-left:6px;font-size:14px;">4.9</span>
            </div>
            <p style="font-size:12px;color:#9ca3af;margin:0;">from 2,400+ reviews</p>
          </div>
        </div>
      </div>

     
      <div style="position:relative;">
       
        <div style="background:linear-gradient(135deg,#6d28d9,#7c3aed,#4c1d95);border-radius:24px;padding:24px;min-height:360px;position:relative;overflow:hidden;box-shadow:0 25px 60px rgba(109,40,217,.35);">
         
          <div style="background:rgba(255,255,255,.15);border-radius:12px;height:48px;margin-bottom:12px;"></div>
          <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:10px;margin-bottom:12px;">
            <div style="background:rgba(255,255,255,.12);border-radius:10px;height:40px;"></div>
            <div style="background:rgba(255,255,255,.12);border-radius:10px;height:40px;"></div>
            <div style="background:rgba(255,255,255,.12);border-radius:10px;height:40px;"></div>
          </div>
          <div style="background:rgba(255,255,255,.1);border-radius:12px;height:56px;margin-bottom:10px;display:flex;align-items:center;padding:0 16px;">
            <div style="width:36px;height:36px;background:rgba(255,255,255,.2);border-radius:50%;margin-right:12px;"></div>
            <div style="flex:1;">
              <div style="height:8px;background:rgba(255,255,255,.3);border-radius:4px;width:60%;margin-bottom:6px;"></div>
              <div style="height:6px;background:rgba(255,255,255,.2);border-radius:4px;width:40%;"></div>
            </div>
            <span style="background:#22c55e;color:#fff;font-size:10px;font-weight:700;padding:3px 10px;border-radius:99px;">Live</span>
          </div>
          <div style="background:rgba(255,255,255,.1);border-radius:12px;height:56px;display:flex;align-items:center;padding:0 16px;">
            <div style="width:36px;height:36px;background:rgba(255,255,255,.2);border-radius:50%;margin-right:12px;"></div>
            <div style="flex:1;">
              <div style="height:8px;background:rgba(255,255,255,.3);border-radius:4px;width:70%;margin-bottom:6px;"></div>
              <div style="height:6px;background:rgba(255,255,255,.2);border-radius:4px;width:45%;"></div>
            </div>
            <span style="background:rgba(255,255,255,.2);color:#fff;font-size:10px;font-weight:700;padding:3px 10px;border-radius:99px;">Next</span>
          </div>
        </div>

        
        <div style="position:absolute;top:-16px;right:-16px;background:#fff;border-radius:14px;padding:12px 16px;box-shadow:0 8px 24px rgba(0,0,0,.12);display:flex;align-items:center;gap:8px;min-width:180px;">
          <div style="width:10px;height:10px;background:#ef4444;border-radius:50%;"></div>
          <div>
            <p style="font-size:12px;font-weight:700;color:#111;margin:0;">Live Class Now</p>
            <p style="font-size:11px;color:#6b7280;margin:0;">234 students joined</p>
          </div>
        </div>

        
        <div style="position:absolute;bottom:-20px;left:-20px;background:#fff;border-radius:14px;padding:12px 16px;box-shadow:0 8px 24px rgba(0,0,0,.12);display:flex;align-items:center;gap:10px;">
          <div style="width:36px;height:36px;background:#ede9fe;border-radius:10px;display:flex;align-items:center;justify-content:center;">
            <i class="fa-solid fa-award" style="color:#7c3aed;font-size:16px;"></i>
          </div>
          <div>
            <p style="font-size:12px;font-weight:700;color:#111;margin:0;">Certificate Earned!</p>
            <p style="font-size:11px;color:#6b7280;margin:0;">Full-Stack Development</p>
          </div>
        </div>

        
        <div style="position:absolute;bottom:-20px;right:20px;background:#fff;border-radius:14px;padding:12px 18px;box-shadow:0 8px 24px rgba(0,0,0,.12);text-align:center;">
          <p style="font-size:11px;color:#6b7280;margin:0;">Your Progress</p>
          <p style="font-size:22px;font-weight:900;color:#7c3aed;margin:0;">78%</p>
          <div style="width:80px;height:4px;background:#e9d5ff;border-radius:2px;margin-top:4px;">
            <div style="width:78%;height:100%;background:#7c3aed;border-radius:2px;"></div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>



<section style="background:linear-gradient(135deg,#5b21b6,#7c3aed,#6d28d9);padding:64px 0;">
  <div style="max-width:1200px;margin:0 auto;padding:0 24px;">
    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:24px;">
      @php
      $stats = [
        ['icon'=>'fa-users','num'=>($totalStudents ?? '10K+'),'label'=>'Students Enrolled'],
        ['icon'=>'fa-book-open','num'=>($totalCourses ?? '50+'),'label'=>'Expert Courses'],
        ['icon'=>'fa-chalkboard-user','num'=>($totalTeachers ?? '20+'),'label'=>'Expert Instructors'],
        ['icon'=>'fa-arrow-trend-up','num'=>'95%','label'=>'Success Rate'],
      ];
      @endphp
      @foreach($stats as $s)
      <div style="background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.15);border-radius:20px;padding:32px 24px;text-align:center;backdrop-filter:blur(10px);">
        <div style="width:52px;height:52px;background:rgba(255,255,255,.15);border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
          <i class="fa-solid {{ $s['icon'] }}" style="color:#fff;font-size:22px;"></i>
        </div>
        <p style="font-size:36px;font-weight:900;color:#fff;margin:0;font-family:'Plus Jakarta Sans',sans-serif;">{{ $s['num'] }}</p>
        <p style="font-size:13px;color:rgba(255,255,255,.75);margin:6px 0 0;">{{ $s['label'] }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>



<section id="why-us" style="padding:96px 0;background:#fff;">
  <div style="max-width:1200px;margin:0 auto;padding:0 24px;">
    <div style="text-align:center;margin-bottom:64px;">
      <span style="display:inline-block;background:#ede9fe;color:#7c3aed;font-size:13px;font-weight:600;padding:6px 18px;border-radius:999px;border:1.5px solid #c4b5fd;margin-bottom:16px;">Why Choose Us</span>
      <h2 style="font-size:clamp(28px,4vw,44px);font-weight:900;color:#0f0f0f;margin:0 0 16px;font-family:'Plus Jakarta Sans',sans-serif;">Everything You Need to Succeed</h2>
      <p style="font-size:16px;color:#6b7280;max-width:560px;margin:0 auto;line-height:1.7;">We've built the perfect learning environment that combines expert knowledge, practical experience, and ongoing support to launch your digital career.</p>
    </div>

    @php
    $features = [
      ['icon'=>'fa-user-tie','title'=>'Expert Mentorship','desc'=>'Get 1-on-1 guidance from industry professionals with 10+ years of real-world experience in their fields.'],
      ['icon'=>'fa-briefcase','title'=>'Practical Projects','desc'=>'Build a professional portfolio with real-world projects that you can showcase to employers immediately.'],
      ['icon'=>'fa-video','title'=>'Live Classes','desc'=>'Attend weekly live sessions with interactive Q&A. All recordings are saved for lifetime access.'],
      ['icon'=>'fa-infinity','title'=>'Lifetime Access','desc'=>'Learn at your own pace with lifetime access to all course materials, updates, and community resources.'],
      ['icon'=>'fa-compass','title'=>'Career Guidance','desc'=>'Receive dedicated job placement support, resume reviews, interview prep, and direct employer connections.'],
      ['icon'=>'fa-circle-check','title'=>'Recognized Certificates','desc'=>'Earn industry-accepted certificates with QR verification — trusted by 500+ employers across Pakistan.'],
    ];
    @endphp

    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;">
      @foreach($features as $f)
      <div style="background:#fff;border:1.5px solid #f3f4f6;border-radius:20px;padding:36px 28px;transition:all .25s;box-shadow:0 2px 12px rgba(0,0,0,.04);" onmouseenter="this.style.boxShadow='0 12px 40px rgba(124,58,237,.12)';this.style.borderColor='#c4b5fd';" onmouseleave="this.style.boxShadow='0 2px 12px rgba(0,0,0,.04)';this.style.borderColor='#f3f4f6';">
        <div style="width:48px;height:48px;background:#ede9fe;border-radius:14px;display:flex;align-items:center;justify-content:center;margin-bottom:20px;">
          <i class="fa-solid {{ $f['icon'] }}" style="color:#7c3aed;font-size:20px;"></i>
        </div>
        <h3 style="font-size:17px;font-weight:800;color:#0f0f0f;margin:0 0 10px;font-family:'Plus Jakarta Sans',sans-serif;">{{ $f['title'] }}</h3>
        <p style="font-size:14px;color:#6b7280;line-height:1.7;margin:0;">{{ $f['desc'] }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>


{{-- ============================================================
     4. FEATURED COURSES
============================================================ --}}
<section id="courses" style="padding:96px 0;background:#f9fafb;">
  <div style="max-width:1200px;margin:0 auto;padding:0 24px;">
    <div style="text-align:center;margin-bottom:48px;">
      <span style="display:inline-block;background:#ede9fe;color:#7c3aed;font-size:13px;font-weight:600;padding:6px 18px;border-radius:999px;border:1.5px solid #c4b5fd;margin-bottom:16px;">Featured Courses</span>
      <h2 style="font-size:clamp(28px,4vw,44px);font-weight:900;color:#0f0f0f;margin:0 0 16px;font-family:'Plus Jakarta Sans',sans-serif;">Courses Built for Your Career</h2>
      <p style="font-size:16px;color:#6b7280;max-width:560px;margin:0 auto;">Choose from 50+ professionally designed courses taught by industry experts. Earn recognized certificates and build real-world skills.</p>
    </div>

    {{-- Filter tabs --}}
    <div style="display:flex;gap:10px;justify-content:center;margin-bottom:40px;flex-wrap:wrap;">
      @php $tabs = ['All','Development','Marketing','Design','Data & Analytics']; @endphp
      @foreach($tabs as $i => $tab)
      <button onclick="filterCourse(this,'{{ strtolower($tab) }}')" style="padding:8px 22px;border-radius:999px;font-size:14px;font-weight:600;border:2px solid {{ $i===0?'#7c3aed':'#e5e7eb' }};background:{{ $i===0?'#7c3aed':'#fff' }};color:{{ $i===0?'#fff':'#374151' }};cursor:pointer;transition:all .2s;">{{ $tab }}</button>
      @endforeach
    </div>

    @php
    $demoCourses = [
      ['title'=>'Full-Stack Web Development','badge'=>'Best Seller','badge_bg'=>'#f59e0b','level'=>'Advanced','level_bg'=>'#ede9fe','level_color'=>'#7c3aed','duration'=>'6 months','enrolled'=>'2,840','teacher'=>'Mr. Ahmed Khan','price'=>'$299','rating'=>'4.9','cat'=>'development','img'=>'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=400&q=80'],
      ['title'=>'Digital Marketing Mastery','badge'=>'Most Popular','badge_bg'=>'#10b981','level'=>'Beginner','level_bg'=>'#d1fae5','level_color'=>'#065f46','duration'=>'3 months','enrolled'=>'3,120','teacher'=>'Ms. Sarah Ali','price'=>'$149','rating'=>'4.8','cat'=>'marketing','img'=>'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&q=80'],
      ['title'=>'UI/UX Design Fundamentals','badge'=>'New','badge_bg'=>'#8b5cf6','level'=>'Beginner','level_bg'=>'#d1fae5','level_color'=>'#065f46','duration'=>'4 months','enrolled'=>'1,960','teacher'=>'Mr. Usman Tariq','price'=>'$199','rating'=>'4.9','cat'=>'design','img'=>'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=400&q=80'],
      ['title'=>'Data Analytics & Python','badge'=>'Trending','badge_bg'=>'#ef4444','level'=>'Intermediate','level_bg'=>'#ede9fe','level_color'=>'#5b21b6','duration'=>'5 months','enrolled'=>'1,540','teacher'=>'Ms. Ayesha Malik','price'=>'$249','rating'=>'4.7','cat'=>'data','img'=>'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&q=80'],
      ['title'=>'Social Media Marketing','badge'=>'','badge_bg'=>'','level'=>'Beginner','level_bg'=>'#d1fae5','level_color'=>'#065f46','duration'=>'2 months','enrolled'=>'4,200','teacher'=>'Ms. Nadia Hussain','price'=>'$99','rating'=>'4.8','cat'=>'marketing','img'=>'https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?w=400&q=80'],
      ['title'=>'Graphic Design Pro','badge'=>'','badge_bg'=>'','level'=>'Beginner','level_bg'=>'#d1fae5','level_color'=>'#065f46','duration'=>'3 months','enrolled'=>'2,380','teacher'=>'Mr. Hassan Raza','price'=>'$129','rating'=>'4.8','cat'=>'design','img'=>'https://images.unsplash.com/photo-1626785774625-0b1c2c4eab67?w=400&q=80'],
      ['title'=>'SEO & Content Strategy','badge'=>'','badge_bg'=>'','level'=>'Intermediate','level_bg'=>'#ede9fe','level_color'=>'#5b21b6','duration'=>'2 months','enrolled'=>'1,720','teacher'=>'Mr. Bilal Ahmed','price'=>'$119','rating'=>'4.7','cat'=>'marketing','img'=>'https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?w=400&q=80'],
      ['title'=>'Video Editing & Production','badge'=>'','badge_bg'=>'','level'=>'Beginner','level_bg'=>'#d1fae5','level_color'=>'#065f46','duration'=>'3 months','enrolled'=>'1,890','teacher'=>'Ms. Zainab Siddiqui','price'=>'$149','rating'=>'4.9','cat'=>'design','img'=>'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?w=400&q=80'],
    ];
    $displayCourses = (isset($featuredCourses) && $featuredCourses->count()) ? $featuredCourses->toArray() : $demoCourses;
    @endphp

    <div id="courses-grid" style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;">
      @foreach($demoCourses as $course)
      <div class="course-card" data-cat="{{ $course['cat'] }}" style="background:#fff;border-radius:20px;overflow:hidden;border:1.5px solid #f3f4f6;box-shadow:0 2px 12px rgba(0,0,0,.05);transition:all .25s;" onmouseenter="this.style.transform='translateY(-4px)';this.style.boxShadow='0 16px 40px rgba(0,0,0,.12)';" onmouseleave="this.style.transform='translateY(0)';this.style.boxShadow='0 2px 12px rgba(0,0,0,.05)';">
        {{-- Image --}}
        <div style="position:relative;">
          <img src="{{ $course['img'] }}" alt="{{ $course['title'] }}" style="width:100%;height:160px;object-fit:cover;display:block;">
          @if($course['badge'])
          <span style="position:absolute;top:12px;left:12px;background:{{ $course['badge_bg'] }};color:#fff;font-size:11px;font-weight:700;padding:4px 10px;border-radius:8px;">{{ $course['badge'] }}</span>
          @endif
          <span style="position:absolute;top:12px;right:12px;background:rgba(0,0,0,.6);color:#fff;font-size:11px;font-weight:600;padding:4px 8px;border-radius:8px;display:flex;align-items:center;gap:3px;">
            <i class="fa-solid fa-star" style="color:#f59e0b;font-size:10px;"></i> {{ $course['rating'] }}
          </span>
        </div>
        {{-- Body --}}
        <div style="padding:18px;">
          <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;">
            <span style="background:{{ $course['level_bg'] }};color:{{ $course['level_color'] }};font-size:11px;font-weight:600;padding:3px 10px;border-radius:6px;">{{ $course['level'] }}</span>
            <span style="font-size:11px;color:#6b7280;display:flex;align-items:center;gap:4px;"><i class="fa-solid fa-certificate" style="color:#7c3aed;"></i> Certificate</span>
          </div>
          <h3 style="font-size:14px;font-weight:800;color:#0f0f0f;margin:0 0 8px;line-height:1.4;font-family:'Plus Jakarta Sans',sans-serif;">{{ $course['title'] }}</h3>
          <div style="display:flex;gap:12px;font-size:12px;color:#9ca3af;margin-bottom:4px;">
            <span><i class="fa-regular fa-clock" style="color:#7c3aed;"></i> {{ $course['duration'] }}</span>
            <span><i class="fa-regular fa-user" style="color:#7c3aed;"></i> {{ $course['enrolled'] }}</span>
          </div>
          <p style="font-size:12px;color:#9ca3af;margin:0 0 14px;">by {{ $course['teacher'] }}</p>
          <p style="font-size:22px;font-weight:900;color:#7c3aed;margin:0 0 14px;font-family:'Plus Jakarta Sans',sans-serif;">{{ $course['price'] }}</p>
          <div style="display:flex;gap:8px;">
            <a href="{{ url('/courses') }}" style="flex:1;text-align:center;padding:9px;border:2px solid #e5e7eb;border-radius:10px;font-size:13px;font-weight:600;color:#374151;text-decoration:none;transition:all .2s;" onmouseenter="this.style.borderColor='#7c3aed';this.style.color='#7c3aed';" onmouseleave="this.style.borderColor='#e5e7eb';this.style.color='#374151';">Details</a>
            <a href="{{ url('/courses') }}" style="flex:1;text-align:center;padding:9px;background:#7c3aed;border-radius:10px;font-size:13px;font-weight:700;color:#fff;text-decoration:none;display:flex;align-items:center;justify-content:center;gap:6px;">Enroll <i class="fa-solid fa-arrow-right" style="font-size:11px;"></i></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div style="text-align:center;margin-top:40px;">
      <a href="{{ url('/courses') }}" style="display:inline-flex;align-items:center;gap:8px;border:2px solid #7c3aed;color:#7c3aed;padding:14px 32px;border-radius:12px;font-weight:700;font-size:15px;text-decoration:none;transition:all .2s;" onmouseenter="this.style.background='#7c3aed';this.style.color='#fff';" onmouseleave="this.style.background='transparent';this.style.color='#7c3aed';">
        View All 50+ Courses <i class="fa-solid fa-arrow-right"></i>
      </a>
    </div>
  </div>
</section>


{{-- ============================================================
     5. LEARNING PATH — VERTICAL ZIGZAG TIMELINE
============================================================ --}}
<section style="padding:96px 0;background:#f8f7ff;">
  <div style="max-width:900px;margin:0 auto;padding:0 24px;">
    <div style="text-align:center;margin-bottom:64px;">
      <span style="display:inline-block;background:#ede9fe;color:#7c3aed;font-size:13px;font-weight:600;padding:6px 18px;border-radius:999px;border:1.5px solid #c4b5fd;margin-bottom:16px;">Your Learning Path</span>
      <h2 style="font-size:clamp(28px,4vw,44px);font-weight:900;color:#0f0f0f;margin:0 0 16px;font-family:'Plus Jakarta Sans',sans-serif;">From Enrollment to Career Success</h2>
      <p style="font-size:16px;color:#6b7280;max-width:560px;margin:0 auto;">Our proven 7-step learning journey is designed to take you from complete beginner to job-ready professional.</p>
    </div>

    @php
    $steps = [
      ['num'=>'1','icon'=>'fa-magnifying-glass','title'=>'Choose Your Course','desc'=>'Browse our 50+ expert-led courses and pick the skill you want to master.','side'=>'left'],
      ['num'=>'2','icon'=>'fa-credit-card','title'=>'Enroll & Pay','desc'=>'Secure your spot with our easy, safe payment options including installment plans.','side'=>'right'],
      ['num'=>'3','icon'=>'fa-desktop','title'=>'Get LMS Access','desc'=>'Instantly access your personalized student dashboard with all course materials.','side'=>'left'],
      ['num'=>'4','icon'=>'fa-play','title'=>'Watch Lessons','desc'=>'Learn via HD video lessons, live classes, and downloadable resources at your pace.','side'=>'right'],
      ['num'=>'5','icon'=>'fa-file-lines','title'=>'Complete Assignments','desc'=>'Apply your knowledge through hands-on projects reviewed by expert mentors.','side'=>'left'],
      ['num'=>'6','icon'=>'fa-circle-check','title'=>'Pass Assessments','desc'=>'Demonstrate your skills through quizzes and final assessments with instant feedback.','side'=>'right'],
      ['num'=>'7','icon'=>'fa-award','title'=>'Receive Certificate','desc'=>'Earn your industry-recognized, QR-verified digital certificate to share with employers.','side'=>'left'],
    ];
    @endphp

    <div style="position:relative;">
      {{-- Center line --}}
      <div style="position:absolute;left:50%;top:0;bottom:0;width:2px;background:linear-gradient(to bottom,#7c3aed,#a78bfa);transform:translateX(-50%);z-index:0;"></div>

      @foreach($steps as $step)
      <div style="display:flex;align-items:center;margin-bottom:40px;position:relative;{{ $step['side']==='left' ? 'justify-content:flex-start;padding-right:calc(50% + 40px);' : 'justify-content:flex-end;padding-left:calc(50% + 40px);' }}">
        {{-- Card --}}
        <div style="background:#fff;border-radius:16px;padding:20px 24px;box-shadow:0 4px 20px rgba(0,0,0,.07);border:1.5px solid #f3f4f6;width:100%;max-width:320px;display:flex;align-items:flex-start;gap:14px;">
          <div style="width:40px;height:40px;background:#ede9fe;border-radius:12px;display:flex;align-items:center;justify-content:center;shrink:0;">
            <i class="fa-solid {{ $step['icon'] }}" style="color:#7c3aed;font-size:16px;"></i>
          </div>
          <div>
            <h4 style="font-size:15px;font-weight:800;color:#0f0f0f;margin:0 0 6px;font-family:'Plus Jakarta Sans',sans-serif;">{{ $step['title'] }}</h4>
            <p style="font-size:13px;color:#6b7280;margin:0;line-height:1.6;">{{ $step['desc'] }}</p>
          </div>
        </div>
        {{-- Circle number --}}
        <div style="position:absolute;left:50%;transform:translateX(-50%);width:40px;height:40px;background:#7c3aed;border-radius:50%;display:flex;align-items:center;justify-content:center;z-index:1;border:3px solid #f8f7ff;box-shadow:0 0 0 3px #c4b5fd;">
          <span style="color:#fff;font-weight:900;font-size:14px;">{{ $step['num'] }}</span>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>


{{-- ============================================================
     6. UPCOMING BATCHES
============================================================ --}}
<section id="batches" style="padding:96px 0;background:#fff;">
  <div style="max-width:1200px;margin:0 auto;padding:0 24px;">
    <div style="text-align:center;margin-bottom:56px;">
      <span style="display:inline-block;background:#ede9fe;color:#7c3aed;font-size:13px;font-weight:600;padding:6px 18px;border-radius:999px;border:1.5px solid #c4b5fd;margin-bottom:16px;">Upcoming Batches</span>
      <h2 style="font-size:clamp(28px,4vw,44px);font-weight:900;color:#0f0f0f;margin:0 0 16px;font-family:'Plus Jakarta Sans',sans-serif;">Reserve Your Seat Today</h2>
      <p style="font-size:16px;color:#6b7280;max-width:560px;margin:0 auto;">New batches start every month. Seats are limited — enroll early to secure your place and special early-bird pricing.</p>
    </div>

    <div style="border-radius:20px;overflow:hidden;border:1.5px solid #e5e7eb;box-shadow:0 4px 24px rgba(0,0,0,.06);">
      {{-- Header --}}
      <div style="display:grid;grid-template-columns:2fr 1.2fr 1.5fr 1.8fr 1fr;gap:16px;background:#7c3aed;padding:16px 28px;">
        @foreach(['COURSE','START DATE','INSTRUCTOR','SEATS AVAILABLE','ACTION'] as $h)
        <div style="color:rgba(255,255,255,.85);font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;">{{ $h }}</div>
        @endforeach
      </div>

      @php
      $batches = [
        ['cat'=>'Development','cat_bg'=>'#ede9fe','cat_color'=>'#5b21b6','course'=>'Full-Stack Web Development','date'=>'July 5, 2026','teacher'=>'Mr. Ahmed Khan','seats'=>8,'total'=>30,'status'=>'filling'],
        ['cat'=>'Marketing','cat_bg'=>'#d1fae5','cat_color'=>'#065f46','course'=>'Digital Marketing Mastery','date'=>'July 10, 2026','teacher'=>'Ms. Sarah Ali','seats'=>12,'total'=>25,'status'=>'half'],
        ['cat'=>'Design','cat_bg'=>'#fce7f3','cat_color'=>'#9d174d','course'=>'UI/UX Design Fundamentals','date'=>'July 15, 2026','teacher'=>'Mr. Usman Tariq','seats'=>5,'total'=>30,'status'=>'filling'],
        ['cat'=>'Data','cat_bg'=>'#fef3c7','cat_color'=>'#92400e','course'=>'Data Analytics & Python','date'=>'July 20, 2026','teacher'=>'Ms. Ayesha Malik','seats'=>15,'total'=>25,'status'=>'good'],
        ['cat'=>'Design','cat_bg'=>'#fce7f3','cat_color'=>'#9d174d','course'=>'Graphic Design Pro','date'=>'July 25, 2026','teacher'=>'Mr. Hassan Raza','seats'=>20,'total'=>30,'status'=>'good'],
      ];
      $displayBatches = (isset($upcomingBatches) && $upcomingBatches->count()) ? $upcomingBatches : $batches;
      @endphp

      @foreach($batches as $i => $batch)
      <div style="display:grid;grid-template-columns:2fr 1.2fr 1.5fr 1.8fr 1fr;gap:16px;align-items:center;padding:20px 28px;background:#fff;border-top:1px solid #f3f4f6;transition:background .2s;" onmouseenter="this.style.background='#faf9ff';" onmouseleave="this.style.background='#fff';">
        <div>
          <span style="display:inline-block;background:{{ $batch['cat_bg'] }};color:{{ $batch['cat_color'] }};font-size:11px;font-weight:600;padding:3px 10px;border-radius:6px;margin-bottom:6px;">{{ $batch['cat'] }}</span>
          <p style="font-size:14px;font-weight:700;color:#0f0f0f;margin:0;font-family:'Plus Jakarta Sans',sans-serif;">{{ $batch['course'] }}</p>
        </div>
        <div style="display:flex;align-items:center;gap:6px;font-size:13px;color:#374151;">
          <i class="fa-regular fa-calendar" style="color:#7c3aed;"></i> {{ $batch['date'] }}
        </div>
        <div style="display:flex;align-items:center;gap:6px;font-size:13px;color:#374151;">
          <i class="fa-regular fa-user" style="color:#7c3aed;"></i> {{ $batch['teacher'] }}
        </div>
        <div>
          @if($batch['status'] === 'filling')
          <div style="display:flex;align-items:center;gap:6px;margin-bottom:6px;">
            <span style="width:8px;height:8px;background:#ef4444;border-radius:50%;display:inline-block;"></span>
            <span style="font-size:12px;font-weight:600;color:#ef4444;">Filling Fast!</span>
            <span style="font-size:12px;color:#6b7280;margin-left:auto;">{{ $batch['seats'] }} left</span>
          </div>
          <div style="height:6px;background:#fee2e2;border-radius:3px;overflow:hidden;">
            <div style="height:100%;background:#ef4444;border-radius:3px;width:{{ round((1-$batch['seats']/$batch['total'])*100) }}%;"></div>
          </div>
          @elseif($batch['status'] === 'half')
          <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:6px;">
            <span style="font-size:12px;color:#6b7280;"></span>
            <span style="font-size:12px;color:#6b7280;">{{ $batch['seats'] }} left</span>
          </div>
          <div style="height:6px;background:#fde68a;border-radius:3px;overflow:hidden;">
            <div style="height:100%;background:#f59e0b;border-radius:3px;width:{{ round((1-$batch['seats']/$batch['total'])*100) }}%;"></div>
          </div>
          @else
          <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:6px;">
            <span></span>
            <span style="font-size:12px;color:#6b7280;">{{ $batch['seats'] }} left</span>
          </div>
          <div style="height:6px;background:#d1fae5;border-radius:3px;overflow:hidden;">
            <div style="height:100%;background:#10b981;border-radius:3px;width:{{ round((1-$batch['seats']/$batch['total'])*100) }}%;"></div>
          </div>
          @endif
        </div>
        <div>
          <a href="{{ url('/courses') }}" style="display:inline-flex;align-items:center;gap:6px;background:#7c3aed;color:#fff;padding:10px 20px;border-radius:10px;font-size:13px;font-weight:700;text-decoration:none;white-space:nowrap;">
            Enroll Now <i class="fa-solid fa-arrow-right" style="font-size:11px;"></i>
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>


{{-- ============================================================
     7. LMS PLATFORM PREVIEW — TABS
============================================================ --}}
<section style="padding:96px 0;background:#f9fafb;">
  <div style="max-width:1200px;margin:0 auto;padding:0 24px;">
    <div style="text-align:center;margin-bottom:48px;">
      <span style="display:inline-block;background:#ede9fe;color:#7c3aed;font-size:13px;font-weight:600;padding:6px 18px;border-radius:999px;border:1.5px solid #c4b5fd;margin-bottom:16px;">LMS Platform</span>
      <h2 style="font-size:clamp(28px,4vw,44px);font-weight:900;color:#0f0f0f;margin:0 0 16px;font-family:'Plus Jakarta Sans',sans-serif;">A Powerful Learning Platform</h2>
      <p style="font-size:16px;color:#6b7280;max-width:600px;margin:0 auto;">Our state-of-the-art LMS gives students and teachers everything they need — from live lessons to progress tracking and certified achievements.</p>
    </div>

    {{-- Tab buttons --}}
    <div style="display:flex;gap:12px;justify-content:center;margin-bottom:32px;flex-wrap:wrap;">
      <button onclick="switchLmsTab('dashboard')" id="lms-btn-dashboard" style="display:flex;align-items:center;gap:8px;padding:11px 22px;border-radius:999px;background:#7c3aed;color:#fff;border:2px solid #7c3aed;font-size:14px;font-weight:600;cursor:pointer;transition:all .2s;">
        <i class="fa-solid fa-desktop"></i> Student Dashboard
      </button>
      <button onclick="switchLmsTab('learning')" id="lms-btn-learning" style="display:flex;align-items:center;gap:8px;padding:11px 22px;border-radius:999px;background:#fff;color:#374151;border:2px solid #e5e7eb;font-size:14px;font-weight:600;cursor:pointer;transition:all .2s;">
        <i class="fa-solid fa-book-open"></i> Course Learning
      </button>
      <button onclick="switchLmsTab('assignments')" id="lms-btn-assignments" style="display:flex;align-items:center;gap:8px;padding:11px 22px;border-radius:999px;background:#fff;color:#374151;border:2px solid #e5e7eb;font-size:14px;font-weight:600;cursor:pointer;transition:all .2s;">
        <i class="fa-solid fa-file-lines"></i> Assignments
      </button>
      <button onclick="switchLmsTab('certs')" id="lms-btn-certs" style="display:flex;align-items:center;gap:8px;padding:11px 22px;border-radius:999px;background:#fff;color:#374151;border:2px solid #e5e7eb;font-size:14px;font-weight:600;cursor:pointer;transition:all .2s;">
        <i class="fa-solid fa-certificate"></i> Certificates
      </button>
    </div>

    {{-- Browser mockup --}}
    <div style="background:#1a1a2e;border-radius:20px;overflow:hidden;box-shadow:0 30px 80px rgba(0,0,0,.3);">
      {{-- Browser bar --}}
      <div style="background:#0f0f23;padding:12px 20px;display:flex;align-items:center;gap:8px;">
        <div style="width:12px;height:12px;background:#ef4444;border-radius:50%;"></div>
        <div style="width:12px;height:12px;background:#f59e0b;border-radius:50%;"></div>
        <div style="width:12px;height:12px;background:#22c55e;border-radius:50%;"></div>
        <div style="flex:1;background:rgba(255,255,255,.08);border-radius:6px;height:28px;margin-left:12px;"></div>
      </div>

      {{-- Dashboard Panel --}}
      <div id="lms-panel-dashboard" style="display:flex;min-height:380px;">
        {{-- Sidebar --}}
        <div style="width:60px;background:#12122a;display:flex;flex-direction:column;align-items:center;gap:20px;padding:24px 0;">
          @foreach(['fa-desktop','fa-book-open','fa-file-lines','fa-chart-bar','fa-certificate'] as $ic)
          <div style="width:36px;height:36px;background:rgba(255,255,255,.07);border-radius:10px;display:flex;align-items:center;justify-content:center;">
            <i class="fa-solid {{ $ic }}" style="color:rgba(255,255,255,.4);font-size:14px;"></i>
          </div>
          @endforeach
        </div>
        {{-- Main --}}
        <div style="flex:1;padding:28px;background:#16162e;">
          <p style="color:rgba(255,255,255,.5);font-size:12px;margin:0 0 4px;">Welcome back,</p>
          <h3 style="color:#fff;font-size:20px;font-weight:800;margin:0 0 24px;font-family:'Plus Jakarta Sans',sans-serif;">Fatima Zahra 👋</h3>
          {{-- Stat cards --}}
          <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:24px;">
            @foreach([['fa-book-open','4','Courses'],['fa-clock','127','Hours'],['fa-certificate','2','Certificates']] as $card)
            <div style="background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.08);border-radius:14px;padding:18px;">
              <i class="fa-solid {{ $card[0] }}" style="color:rgba(255,255,255,.4);font-size:16px;margin-bottom:10px;display:block;"></i>
              <p style="color:#fff;font-size:24px;font-weight:800;margin:0;font-family:'Plus Jakarta Sans',sans-serif;">{{ $card[1] }}</p>
              <p style="color:rgba(255,255,255,.4);font-size:12px;margin:4px 0 0;">{{ $card[2] }}</p>
            </div>
            @endforeach
          </div>
          <p style="color:rgba(255,255,255,.6);font-size:13px;font-weight:600;margin:0 0 12px;">Active Courses</p>
          @foreach([['Full-Stack Web Dev','78%','#7c3aed'],['UI/UX Design','45%','#a78bfa']] as $prog)
          <div style="margin-bottom:14px;">
            <div style="display:flex;justify-content:space-between;margin-bottom:6px;">
              <span style="font-size:13px;color:rgba(255,255,255,.8);font-weight:500;">{{ $prog[0] }}</span>
              <span style="font-size:13px;color:{{ $prog[2] }};font-weight:700;">{{ $prog[1] }}</span>
            </div>
            <div style="height:6px;background:rgba(255,255,255,.08);border-radius:3px;overflow:hidden;">
              <div style="height:100%;background:{{ $prog[2] }};border-radius:3px;width:{{ $prog[1] }};"></div>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      {{-- Learning Panel --}}
      <div id="lms-panel-learning" style="display:none;min-height:380px;background:#16162e;padding:28px;">
        <div style="display:grid;grid-template-columns:1fr 300px;gap:20px;height:100%;">
          <div style="background:rgba(255,255,255,.04);border-radius:16px;display:flex;align-items:center;justify-content:center;min-height:300px;border:1px solid rgba(255,255,255,.08);">
            <div style="text-align:center;">
              <div style="width:60px;height:60px;background:#7c3aed;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 12px;">
                <i class="fa-solid fa-play" style="color:#fff;font-size:20px;margin-left:3px;"></i>
              </div>
              <p style="color:rgba(255,255,255,.5);font-size:13px;">Module 3: Advanced Layouts</p>
            </div>
          </div>
          <div>
            <p style="color:rgba(255,255,255,.5);font-size:11px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;margin:0 0 12px;">Course Modules</p>
            @foreach([['fa-circle-check','#22c55e','Intro to HTML/CSS','done'],['fa-circle-check','#22c55e','JavaScript Basics','done'],['fa-circle-play','#7c3aed','Advanced Layouts','active'],['fa-lock','rgba(255,255,255,.2)','React Framework','locked'],['fa-lock','rgba(255,255,255,.2)','Backend with Node','locked']] as $m)
            <div style="display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:10px;margin-bottom:6px;background:{{ $m[3]==='active'?'rgba(124,58,237,.15)':'rgba(255,255,255,.03)' }};border:1px solid {{ $m[3]==='active'?'rgba(124,58,237,.3)':'transparent' }};">
              <i class="fa-solid {{ $m[0] }}" style="color:{{ $m[1] }};font-size:13px;"></i>
              <span style="font-size:13px;color:{{ $m[3]==='locked'?'rgba(255,255,255,.3)':($m[3]==='active'?'#c4b5fd':'rgba(255,255,255,.7)') }};">{{ $m[2] }}</span>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      {{-- Assignments Panel --}}
      <div id="lms-panel-assignments" style="display:none;min-height:380px;background:#16162e;padding:28px;">
        <h3 style="color:#fff;font-weight:800;font-size:18px;margin:0 0 20px;font-family:'Plus Jakarta Sans',sans-serif;">My Assignments</h3>
        @foreach([['Build a Responsive Landing Page','Full-Stack Web Dev','Due Jul 8','pending','#f59e0b'],['Create Marketing Campaign','Digital Marketing','Graded','graded','#22c55e'],['Figma UI Prototype','UI/UX Design','Due Jul 15','pending','#f59e0b']] as $a)
        <div style="background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.08);border-radius:14px;padding:16px;margin-bottom:12px;display:flex;align-items:center;justify-content:space-between;">
          <div>
            <p style="color:#fff;font-size:14px;font-weight:600;margin:0 0 4px;">{{ $a[0] }}</p>
            <p style="color:rgba(255,255,255,.4);font-size:12px;margin:0;">{{ $a[1] }}</p>
          </div>
          <div style="text-align:right;">
            <span style="background:{{ $a[4] }}22;color:{{ $a[4] }};font-size:11px;font-weight:600;padding:4px 10px;border-radius:6px;display:block;margin-bottom:6px;">{{ $a[3] === 'graded' ? '✓ Graded' : $a[2] }}</span>
          </div>
        </div>
        @endforeach
      </div>

      {{-- Certificates Panel --}}
      <div id="lms-panel-certs" style="display:none;min-height:380px;background:#16162e;padding:28px;display:none;">
        <h3 style="color:#fff;font-weight:800;font-size:18px;margin:0 0 20px;font-family:'Plus Jakarta Sans',sans-serif;">My Certificates</h3>
        @foreach([['Full-Stack Web Development','AURA-2026-001','June 2026'],['Digital Marketing Mastery','AURA-2026-002','May 2026']] as $cert)
        <div style="background:linear-gradient(135deg,rgba(124,58,237,.2),rgba(109,40,217,.1));border:1px solid rgba(124,58,237,.3);border-radius:16px;padding:20px;margin-bottom:14px;display:flex;align-items:center;gap:16px;">
          <div style="width:48px;height:48px;background:rgba(124,58,237,.3);border-radius:14px;display:flex;align-items:center;justify-content:center;shrink:0;">
            <i class="fa-solid fa-award" style="color:#c4b5fd;font-size:22px;"></i>
          </div>
          <div style="flex:1;">
            <p style="color:#fff;font-size:14px;font-weight:700;margin:0 0 4px;">{{ $cert[0] }}</p>
            <p style="color:rgba(255,255,255,.4);font-size:12px;margin:0;">ID: {{ $cert[1] }} · Issued {{ $cert[2] }}</p>
          </div>
          <a href="#" style="background:#7c3aed;color:#fff;font-size:12px;font-weight:600;padding:8px 16px;border-radius:8px;text-decoration:none;">Download</a>
        </div>
        @endforeach
      </div>

    </div>
  </div>
</section>


{{-- ============================================================
     8. SUCCESS STORIES / TESTIMONIALS
============================================================ --}}
<section id="success" style="padding:96px 0;background:#fff;">
  <div style="max-width:1200px;margin:0 auto;padding:0 24px;">
    <div style="text-align:center;margin-bottom:48px;">
      <span style="display:inline-block;background:#ede9fe;color:#7c3aed;font-size:13px;font-weight:600;padding:6px 18px;border-radius:999px;border:1.5px solid #c4b5fd;margin-bottom:16px;">Success Stories</span>
      <h2 style="font-size:clamp(28px,4vw,44px);font-weight:900;color:#0f0f0f;margin:0 0 16px;font-family:'Plus Jakarta Sans',sans-serif;">Real Results from Real Students</h2>
      <p style="font-size:16px;color:#6b7280;max-width:560px;margin:0 auto;">Over 10,000 students have transformed their careers with SkillsAcademy. Here's what some of them have to say.</p>
    </div>

    {{-- Rating overview --}}
    <div style="background:#f9fafb;border:1.5px solid #f3f4f6;border-radius:20px;padding:32px;margin-bottom:48px;">
      <div style="display:grid;grid-template-columns:auto 1fr auto;gap:40px;align-items:center;flex-wrap:wrap;">
        <div style="text-align:center;">
          <p style="font-size:56px;font-weight:900;color:#0f0f0f;margin:0;line-height:1;font-family:'Plus Jakarta Sans',sans-serif;">4.9</p>
          <div style="display:flex;gap:3px;justify-content:center;margin:8px 0;">
            @for($i=0;$i<5;$i++)<i class="fa-solid fa-star" style="color:#f59e0b;font-size:18px;"></i>@endfor
          </div>
          <p style="font-size:13px;color:#6b7280;margin:0;">Overall Rating</p>
        </div>
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;">
          @foreach([['Course Quality','98%'],['Instructor','97%'],['Career Support','95%']] as $r)
          <div>
            <div style="display:flex;justify-content:space-between;margin-bottom:6px;">
              <span style="font-size:13px;color:#374151;font-weight:500;">{{ $r[0] }}</span>
              <span style="font-size:13px;color:#7c3aed;font-weight:700;">{{ $r[1] }}</span>
            </div>
            <div style="height:6px;background:#ede9fe;border-radius:3px;overflow:hidden;">
              <div style="height:100%;background:#7c3aed;border-radius:3px;width:{{ $r[1] }};"></div>
            </div>
          </div>
          @endforeach
        </div>
        <div style="text-align:center;">
          <p style="font-size:36px;font-weight:900;color:#7c3aed;margin:0;font-family:'Plus Jakarta Sans',sans-serif;">2,400+</p>
          <p style="font-size:13px;color:#6b7280;margin:4px 0 0;">Reviews</p>
        </div>
      </div>
    </div>

    @php
    $reviews = [
      ['quote'=>'I went from zero coding knowledge to landing my first job as a web developer in just 8 months. The structured curriculum and 1-on-1 mentorship made all the difference. My salary doubled what I was making before!','badge'=>'Got hired within 2 months of graduating','badge_color'=>'#22c55e','name'=>'Fatima Zahra','role'=>'Junior Web Developer @ TechCorp','course'=>'Full-Stack Web Development','img'=>'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=60'],
      ['quote'=>'The practical projects were game-changing. I was running real ad campaigns with real budgets during the course. By graduation, I had a portfolio that impressed every recruiter I spoke to.','badge'=>'Salary increased by 180%','badge_color'=>'#7c3aed','name'=>'Muhammad Bilal','role'=>'Digital Marketing Manager','course'=>'Digital Marketing Mastery','img'=>'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=60'],
      ['quote'=>'The live classes were incredibly interactive and the instructor\'s feedback on my designs was invaluable. I built a portfolio of 8 real projects that I\'m proud to show. Got 3 offers before even finishing the course!','badge'=>'3 job offers before graduation','badge_color'=>'#f59e0b','name'=>'Amna Iqbal','role'=>'UX Designer @ StartupHub','course'=>'UI/UX Design Fundamentals','img'=>'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=60'],
      ['quote'=>'Coming from a non-technical background, I was worried the course would be too difficult. But the step-by-step approach and patient mentors made everything clear. Now I\'m earning 3x my previous salary.','badge'=>'3x salary increase','badge_color'=>'#22c55e','name'=>'Hassan Ali','role'=>'Data Analyst @ FinTech','course'=>'Data Analytics & Python','img'=>'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=60'],
      ['quote'=>'I started freelancing on Fiverr during my course and by the time I graduated, I was already making consistent income. The certificate helped me get Level 2 Seller status faster.','badge'=>'Making $2K+/month freelancing','badge_color'=>'#7c3aed','name'=>'Sara Malik','role'=>'Freelance Marketer','course'=>'Digital Marketing Mastery','img'=>'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?w=60'],
      ['quote'=>'This course gave me a complete system for SEO that I now use for all my clients. The instructor shared real case studies and techniques that actually work in 2026.','badge'=>'Built agency with 8 clients','badge_color'=>'#f59e0b','name'=>'Omar Farooq','role'=>'SEO Consultant','course'=>'SEO & Content Strategy','img'=>'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=60'],
    ];
    @endphp

    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;">
      @foreach($reviews as $r)
      <div style="background:#fff;border:1.5px solid #f3f4f6;border-radius:20px;padding:28px;box-shadow:0 2px 12px rgba(0,0,0,.05);transition:all .25s;" onmouseenter="this.style.boxShadow='0 12px 40px rgba(0,0,0,.1)';" onmouseleave="this.style.boxShadow='0 2px 12px rgba(0,0,0,.05)';">
        <div style="display:flex;gap:2px;margin-bottom:16px;">
          @for($i=0;$i<5;$i++)<i class="fa-solid fa-star" style="color:#f59e0b;font-size:14px;"></i>@endfor
        </div>
        <p style="font-size:14px;color:#374151;line-height:1.7;margin:0 0 16px;font-style:italic;">"{{ $r['quote'] }}"</p>
        <span style="display:inline-flex;align-items:center;gap:6px;background:{{ $r['badge_color'] }}18;color:{{ $r['badge_color'] }};font-size:11px;font-weight:600;padding:5px 12px;border-radius:999px;margin-bottom:20px;border:1px solid {{ $r['badge_color'] }}30;">
          <span style="width:6px;height:6px;background:{{ $r['badge_color'] }};border-radius:50%;display:inline-block;"></span>
          {{ $r['badge'] }}
        </span>
        <div style="display:flex;align-items:center;gap:12px;padding-top:16px;border-top:1px solid #f3f4f6;">
          <img src="{{ $r['img'] }}" alt="{{ $r['name'] }}" style="width:44px;height:44px;border-radius:50%;object-fit:cover;">
          <div>
            <p style="font-size:14px;font-weight:700;color:#0f0f0f;margin:0;font-family:'Plus Jakarta Sans',sans-serif;">{{ $r['name'] }}</p>
            <p style="font-size:12px;color:#6b7280;margin:2px 0;">{{ $r['role'] }}</p>
            <p style="font-size:11px;color:#7c3aed;font-weight:600;margin:0;">{{ $r['course'] }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>


{{-- ============================================================
     9. CERTIFICATE VERIFICATION
============================================================ --}}
<section style="background:linear-gradient(135deg,#5b21b6,#7c3aed,#4c1d95);padding:96px 0;position:relative;overflow:hidden;">
  <div style="position:absolute;inset:0;opacity:.1;" aria-hidden="true">
    <div style="position:absolute;top:-100px;right:-100px;width:500px;height:500px;background:rgba(255,255,255,.1);border-radius:50%;"></div>
    <div style="position:absolute;bottom:-100px;left:-100px;width:400px;height:400px;background:rgba(255,255,255,.08);border-radius:50%;"></div>
  </div>
  <div style="max-width:1200px;margin:0 auto;padding:0 24px;position:relative;">
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:80px;align-items:center;">

      {{-- Left --}}
      <div>
        <span style="display:inline-block;background:rgba(255,255,255,.15);color:#fff;font-size:13px;font-weight:600;padding:6px 18px;border-radius:999px;border:1px solid rgba(255,255,255,.2);margin-bottom:20px;">Certificate Verification</span>
        <h2 style="font-size:clamp(28px,3.5vw,42px);font-weight:900;color:#fff;margin:0 0 16px;font-family:'Plus Jakarta Sans',sans-serif;">Verify Any Certificate Instantly</h2>
        <p style="font-size:16px;color:rgba(255,255,255,.75);line-height:1.7;margin:0 0 32px;">Enter a certificate ID to instantly verify its authenticity. All SkillsAcademy certificates include QR verification codes trusted by 500+ employers.</p>

        {{-- Lookup form --}}
        <div style="background:rgba(255,255,255,.12);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,.2);border-radius:20px;padding:28px;">
          <div style="display:flex;align-items:center;gap:10px;margin-bottom:16px;">
            <div style="width:36px;height:36px;background:rgba(255,255,255,.15);border-radius:10px;display:flex;align-items:center;justify-content:center;">
              <i class="fa-solid fa-shield-halved" style="color:#fff;font-size:16px;"></i>
            </div>
            <div>
              <p style="font-size:14px;font-weight:700;color:#fff;margin:0;">Certificate Lookup</p>
              <p style="font-size:12px;color:rgba(255,255,255,.6);margin:0;">Enter ID (e.g. SKA-2026-0841)</p>
            </div>
          </div>
          <div style="display:flex;gap:10px;">
            <input id="cert-input" type="text" placeholder="SKA-YYYY-XXXX" style="flex:1;background:rgba(255,255,255,.9);border:none;border-radius:12px;padding:12px 16px;font-size:14px;color:#374151;outline:none;font-family:monospace;">
            <button onclick="verifyCert()" style="display:flex;align-items:center;gap:6px;background:#fff;color:#7c3aed;padding:12px 20px;border-radius:12px;font-size:14px;font-weight:700;border:none;cursor:pointer;white-space:nowrap;">
              <i class="fa-solid fa-magnifying-glass"></i> Verify
            </button>
          </div>
          <div id="cert-result" style="margin-top:12px;display:none;"></div>
          <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-top:16px;">
            @foreach([['fa-shield-halved','Tamper-Proof'],['fa-qrcode','QR Verified'],['fa-bolt','Instant Check']] as $f)
            <div style="background:rgba(255,255,255,.1);border-radius:10px;padding:10px;text-align:center;">
              <i class="fa-solid {{ $f[0] }}" style="color:rgba(255,255,255,.8);font-size:16px;display:block;margin-bottom:4px;"></i>
              <span style="font-size:11px;color:rgba(255,255,255,.7);font-weight:600;">{{ $f[1] }}</span>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      {{-- Right --}}
      <div>
        {{-- QR Code visual --}}
        <div style="background:rgba(255,255,255,.12);border-radius:20px;padding:24px;margin-bottom:20px;text-align:center;">
          <div style="display:grid;grid-template-columns:repeat(7,1fr);gap:4px;max-width:200px;margin:0 auto 12px;">
            @for($i=0;$i<49;$i++)
            @php $on = in_array($i,[0,1,2,3,4,5,6,7,14,21,28,35,42,43,44,45,46,47,48,10,11,12,20,27,34,15,22,29,36,8,13]); @endphp
            <div style="width:100%;aspect-ratio:1;border-radius:3px;background:{{ $on ? 'rgba(255,255,255,0.85)' : 'rgba(255,255,255,0.1)' }};"></div>
            @endfor
          </div>
          <p style="color:rgba(255,255,255,.7);font-size:12px;font-weight:600;margin:0;">SKA-2026-0841</p>
          <p style="color:rgba(255,255,255,.4);font-size:11px;margin:4px 0 0;">Scan to verify</p>
        </div>

        {{-- Stats grid --}}
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
          @foreach([['10K+','Certs Issued'],['500+','Employers Trust'],['99.9%','Uptime'],['< 1s','Verify Time']] as $s)
          <div style="background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.15);border-radius:14px;padding:16px;text-align:center;">
            <p style="font-size:22px;font-weight:900;color:#fff;margin:0;font-family:'Plus Jakarta Sans',sans-serif;">{{ $s[0] }}</p>
            <p style="font-size:12px;color:rgba(255,255,255,.6);margin:4px 0 0;">{{ $s[1] }}</p>
          </div>
          @endforeach
        </div>
      </div>

    </div>
  </div>
</section>


{{-- ============================================================
     10. FAQ
============================================================ --}}
<section id="faq" style="padding:96px 0;background:#fff;">
  <div style="max-width:800px;margin:0 auto;padding:0 24px;">
    <div style="text-align:center;margin-bottom:56px;">
      <span style="display:inline-block;background:#ede9fe;color:#7c3aed;font-size:13px;font-weight:600;padding:6px 18px;border-radius:999px;border:1.5px solid #c4b5fd;margin-bottom:16px;">FAQ</span>
      <h2 style="font-size:clamp(28px,4vw,44px);font-weight:900;color:#0f0f0f;margin:0 0 16px;font-family:'Plus Jakarta Sans',sans-serif;">Frequently Asked Questions</h2>
      <p style="font-size:16px;color:#6b7280;max-width:480px;margin:0 auto;">Have questions? We've answered the most common ones below. Still need help? Contact us anytime.</p>
    </div>

    @php
    $faqs = [
      ['q'=>'How do I enroll in a course?','a'=>"Enrolling is simple! Browse our course catalog, click 'Enroll Now' on your chosen course, complete the payment (we accept cards, bank transfer, and installment plans), and you'll get instant LMS access within minutes."],
      ['q'=>'How do I access the LMS platform?','a'=>'After enrollment, you receive login credentials via email. Log in at our LMS portal and access all your course materials, live classes, assignments, and progress tracking from your personalized dashboard.'],
      ['q'=>'What payment methods do you accept?','a'=>'We accept all major credit/debit cards, bank transfer (HBL, Meezan, UBL), EasyPaisa, JazzCash, and installment plans. Payment plans are available for all courses.'],
      ['q'=>'Are the live classes recorded?','a'=>'Yes! All live sessions are recorded and uploaded to your LMS dashboard within 24 hours. You have lifetime access to all recordings and course materials.'],
      ['q'=>'How long does it take to get the certificate?','a'=>'Certificates are issued automatically when you complete all lessons, submit all assignments, and pass the final assessment. The process is instant — your PDF certificate appears in your dashboard immediately.'],
      ['q'=>'Is there a job placement guarantee?','a'=>'We offer dedicated career support including resume reviews, interview prep, LinkedIn optimization, and direct employer connections. While we cannot guarantee placement, 95% of our graduates find relevant work within 6 months.'],
    ];
    @endphp

    <div style="space-y:12px;">
      @foreach($faqs as $i => $faq)
      <div style="border:1.5px solid #f3f4f6;border-radius:16px;overflow:hidden;margin-bottom:12px;transition:border-color .2s;">
        <button onclick="toggleFaqItem(this)" style="width:100%;display:flex;align-items:center;justify-content:space-between;padding:20px 24px;background:{{ $i===0?'#faf9ff':'#fff' }};border:none;cursor:pointer;text-align:left;">
          <span style="font-size:15px;font-weight:700;color:{{ $i===0?'#7c3aed':'#0f0f0f' }};font-family:'Plus Jakarta Sans',sans-serif;">{{ $faq['q'] }}</span>
          <i class="fa-solid fa-chevron-{{ $i===0?'up':'down' }} faq-icon" style="color:#7c3aed;font-size:12px;shrink:0;margin-left:16px;transition:transform .3s;"></i>
        </button>
        <div class="faq-body" style="padding:{{ $i===0?'0 24px 20px':'0' }};max-height:{{ $i===0?'200px':'0' }};overflow:hidden;transition:all .35s ease;background:#fff;">
          <p style="font-size:14px;color:#6b7280;line-height:1.8;margin:0;{{ $i===0?'':'padding:0;' }}">{{ $faq['a'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>


{{-- ============================================================
     11. CONTACT SECTION
============================================================ --}}
<section id="contact" style="padding:96px 0;background:#f9fafb;border-top:1.5px solid #f3f4f6;">
  <div style="max-width:1200px;margin:0 auto;padding:0 24px;">
    <div style="display:grid;grid-template-columns:1fr 1.4fr;gap:64px;align-items:start;">

      {{-- Left --}}
      <div>
        <span style="display:inline-block;background:#ede9fe;color:#7c3aed;font-size:13px;font-weight:600;padding:6px 18px;border-radius:999px;border:1.5px solid #c4b5fd;margin-bottom:20px;">Contact Us</span>
        <h2 style="font-size:clamp(26px,3.5vw,38px);font-weight:900;color:#0f0f0f;margin:0 0 16px;font-family:'Plus Jakarta Sans',sans-serif;">Get in Touch With Our Team</h2>
        <p style="font-size:15px;color:#6b7280;line-height:1.7;margin:0 0 36px;">Have questions about our courses or need guidance? Our team is ready to help you find the right path for your career goals.</p>

        <div style="display:flex;flex-direction:column;gap:16px;">
          <a href="https://wa.me/923000000000" target="_blank" style="display:flex;align-items:center;gap:16px;padding:18px;background:#f0fdf4;border:1.5px solid #bbf7d0;border-radius:16px;text-decoration:none;transition:all .2s;" onmouseenter="this.style.borderColor='#4ade80';" onmouseleave="this.style.borderColor='#bbf7d0';">
            <div style="width:44px;height:44px;background:#22c55e;border-radius:12px;display:flex;align-items:center;justify-content:center;shrink:0;">
              <i class="fa-brands fa-whatsapp" style="color:#fff;font-size:20px;"></i>
            </div>
            <div>
              <p style="font-size:11px;font-weight:700;color:#16a34a;text-transform:uppercase;letter-spacing:.06em;margin:0 0 2px;">WhatsApp Support</p>
              <p style="font-size:14px;font-weight:700;color:#0f0f0f;margin:0;">+92-300-0000000</p>
            </div>
            <i class="fa-solid fa-arrow-right" style="color:#22c55e;margin-left:auto;font-size:13px;"></i>
          </a>

          <div style="display:flex;align-items:center;gap:16px;padding:18px;background:#fff;border:1.5px solid #f3f4f6;border-radius:16px;box-shadow:0 2px 8px rgba(0,0,0,.04);">
            <div style="width:44px;height:44px;background:#ede9fe;border-radius:12px;display:flex;align-items:center;justify-content:center;shrink:0;">
              <i class="fa-regular fa-envelope" style="color:#7c3aed;font-size:18px;"></i>
            </div>
            <div>
              <p style="font-size:11px;font-weight:700;color:#7c3aed;text-transform:uppercase;letter-spacing:.06em;margin:0 0 2px;">Email Us</p>
              <p style="font-size:14px;font-weight:700;color:#0f0f0f;margin:0;">info@skillsacademy.pk</p>
            </div>
          </div>

          <div style="display:flex;align-items:center;gap:16px;padding:18px;background:#fff;border:1.5px solid #f3f4f6;border-radius:16px;box-shadow:0 2px 8px rgba(0,0,0,.04);">
            <div style="width:44px;height:44px;background:#ede9fe;border-radius:12px;display:flex;align-items:center;justify-content:center;shrink:0;">
              <i class="fa-solid fa-location-dot" style="color:#7c3aed;font-size:18px;"></i>
            </div>
            <div>
              <p style="font-size:11px;font-weight:700;color:#7c3aed;text-transform:uppercase;letter-spacing:.06em;margin:0 0 2px;">Office</p>
              <p style="font-size:14px;font-weight:700;color:#0f0f0f;margin:0;">Lahore, Punjab, Pakistan</p>
            </div>
          </div>

          <div style="display:flex;align-items:center;gap:16px;padding:18px;background:#fff;border:1.5px solid #f3f4f6;border-radius:16px;box-shadow:0 2px 8px rgba(0,0,0,.04);">
            <div style="width:44px;height:44px;background:#ede9fe;border-radius:12px;display:flex;align-items:center;justify-content:center;shrink:0;">
              <i class="fa-regular fa-clock" style="color:#7c3aed;font-size:18px;"></i>
            </div>
            <div>
              <p style="font-size:11px;font-weight:700;color:#7c3aed;text-transform:uppercase;letter-spacing:.06em;margin:0 0 2px;">Support Hours</p>
              <p style="font-size:14px;font-weight:700;color:#0f0f0f;margin:0;">Mon–Sat, 9 AM – 8 PM</p>
            </div>
          </div>
        </div>
      </div>

      {{-- Right — Form --}}
      <div style="background:#fff;border:1.5px solid #f3f4f6;border-radius:24px;padding:40px;box-shadow:0 4px 24px rgba(0,0,0,.06);">
        <h3 style="font-size:20px;font-weight:800;color:#0f0f0f;margin:0 0 24px;font-family:'Plus Jakarta Sans',sans-serif;">Send Us a Message</h3>

        @if(session('contact_success'))
        <div style="background:#f0fdf4;border:1.5px solid #bbf7d0;border-radius:12px;padding:16px;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
          <i class="fa-solid fa-circle-check" style="color:#22c55e;font-size:18px;"></i>
          <p style="font-size:14px;font-weight:600;color:#16a34a;margin:0;">Message sent! We'll get back to you within 24 hours.</p>
        </div>
        @endif

        <form action="{{ url('/contact') }}" method="POST">
          @csrf
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
            <div>
              <label style="display:block;font-size:12px;font-weight:700;color:#374151;text-transform:uppercase;letter-spacing:.05em;margin-bottom:6px;">Full Name</label>
              <input type="text" name="name" required placeholder="Ali Hassan" value="{{ old('name') }}" style="width:100%;border:1.5px solid #e5e7eb;border-radius:12px;padding:12px 16px;font-size:14px;color:#374151;outline:none;transition:border-color .2s;box-sizing:border-box;" onfocus="this.style.borderColor='#7c3aed';" onblur="this.style.borderColor='#e5e7eb';">
              @error('name')<p style="color:#ef4444;font-size:12px;margin:4px 0 0;">{{ $message }}</p>@enderror
            </div>
            <div>
              <label style="display:block;font-size:12px;font-weight:700;color:#374151;text-transform:uppercase;letter-spacing:.05em;margin-bottom:6px;">Email Address</label>
              <input type="email" name="email" required placeholder="ali@email.com" value="{{ old('email') }}" style="width:100%;border:1.5px solid #e5e7eb;border-radius:12px;padding:12px 16px;font-size:14px;color:#374151;outline:none;transition:border-color .2s;box-sizing:border-box;" onfocus="this.style.borderColor='#7c3aed';" onblur="this.style.borderColor='#e5e7eb';">
              @error('email')<p style="color:#ef4444;font-size:12px;margin:4px 0 0;">{{ $message }}</p>@enderror
            </div>
          </div>
          <div style="margin-bottom:16px;">
            <label style="display:block;font-size:12px;font-weight:700;color:#374151;text-transform:uppercase;letter-spacing:.05em;margin-bottom:6px;">Phone Number</label>
            <input type="tel" name="phone" placeholder="+92-300-0000000" value="{{ old('phone') }}" style="width:100%;border:1.5px solid #e5e7eb;border-radius:12px;padding:12px 16px;font-size:14px;color:#374151;outline:none;transition:border-color .2s;box-sizing:border-box;" onfocus="this.style.borderColor='#7c3aed';" onblur="this.style.borderColor='#e5e7eb';">
          </div>
          <div style="margin-bottom:16px;">
            <label style="display:block;font-size:12px;font-weight:700;color:#374151;text-transform:uppercase;letter-spacing:.05em;margin-bottom:6px;">Course Interest</label>
            <select name="course_interest" style="width:100%;border:1.5px solid #e5e7eb;border-radius:12px;padding:12px 16px;font-size:14px;color:#374151;outline:none;transition:border-color .2s;background:#fff;" onfocus="this.style.borderColor='#7c3aed';" onblur="this.style.borderColor='#e5e7eb';">
              <option value="">Select a course...</option>
              <option value="fullstack">Full-Stack Web Development</option>
              <option value="marketing">Digital Marketing Mastery</option>
              <option value="uiux">UI/UX Design Fundamentals</option>
              <option value="data">Data Analytics & Python</option>
              <option value="other">Other / Not Sure</option>
            </select>
          </div>
          <div style="margin-bottom:24px;">
            <label style="display:block;font-size:12px;font-weight:700;color:#374151;text-transform:uppercase;letter-spacing:.05em;margin-bottom:6px;">Your Message</label>
            <textarea name="message" required rows="4" placeholder="Tell us about your background and goals..." style="width:100%;border:1.5px solid #e5e7eb;border-radius:12px;padding:12px 16px;font-size:14px;color:#374151;outline:none;transition:border-color .2s;resize:none;box-sizing:border-box;" onfocus="this.style.borderColor='#7c3aed';" onblur="this.style.borderColor='#e5e7eb';">{{ old('message') }}</textarea>
            @error('message')<p style="color:#ef4444;font-size:12px;margin:4px 0 0;">{{ $message }}</p>@enderror
          </div>
          <button type="submit" style="width:100%;background:linear-gradient(135deg,#6d28d9,#7c3aed);color:#fff;padding:16px;border-radius:14px;font-size:15px;font-weight:700;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;transition:all .2s;font-family:'Plus Jakarta Sans',sans-serif;" onmouseenter="this.style.opacity='.9';" onmouseleave="this.style.opacity='1';">
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
// Course filter tabs
function filterCourse(btn, cat) {
  document.querySelectorAll('.course-card').forEach(c => {
    if (cat === 'all' || c.dataset.cat === cat) {
      c.style.display = 'block';
    } else {
      c.style.display = 'none';
    }
  });
  document.querySelectorAll('[onclick^="filterCourse"]').forEach(b => {
    b.style.background = '#fff';
    b.style.color = '#374151';
    b.style.borderColor = '#e5e7eb';
  });
  btn.style.background = '#7c3aed';
  btn.style.color = '#fff';
  btn.style.borderColor = '#7c3aed';
}

// LMS Tab switcher
function switchLmsTab(tab) {
  ['dashboard','learning','assignments','certs'].forEach(t => {
    document.getElementById('lms-panel-' + t).style.display = 'none';
    const btn = document.getElementById('lms-btn-' + t);
    btn.style.background = '#fff';
    btn.style.color = '#374151';
    btn.style.borderColor = '#e5e7eb';
  });
  document.getElementById('lms-panel-' + tab).style.display = tab === 'dashboard' ? 'flex' : 'block';
  const activeBtn = document.getElementById('lms-btn-' + tab);
  activeBtn.style.background = '#7c3aed';
  activeBtn.style.color = '#fff';
  activeBtn.style.borderColor = '#7c3aed';
}

// FAQ accordion
function toggleFaqItem(btn) {
  const body = btn.nextElementSibling;
  const icon = btn.querySelector('.faq-icon');
  const isOpen = body.style.maxHeight && body.style.maxHeight !== '0px';

  document.querySelectorAll('.faq-body').forEach(b => {
    b.style.maxHeight = '0';
    b.style.padding = '0';
  });
  document.querySelectorAll('.faq-icon').forEach(i => i.className = i.className.replace('fa-chevron-up','fa-chevron-down'));
  document.querySelectorAll('[onclick="toggleFaqItem(this)"]').forEach(b => {
    b.style.background = '#fff';
    b.querySelector('span').style.color = '#0f0f0f';
  });

  if (!isOpen) {
    body.style.maxHeight = '200px';
    body.style.padding = '0 24px 20px';
    icon.className = icon.className.replace('fa-chevron-down','fa-chevron-up');
    btn.style.background = '#faf9ff';
    btn.querySelector('span').style.color = '#7c3aed';
  }
}

// Certificate verification
function verifyCert() {
  const val = document.getElementById('cert-input').value.trim().toUpperCase();
  const result = document.getElementById('cert-result');
  result.style.display = 'block';

  if (!val) { result.style.display = 'none'; return; }

  if (val === 'SKA-2026-0841' || val === 'AURA-99X2') {
    result.innerHTML = '<div style="background:rgba(34,197,94,.15);border:1px solid rgba(34,197,94,.3);border-radius:10px;padding:12px;display:flex;align-items:center;gap:10px;"><i class="fa-solid fa-circle-check" style="color:#22c55e;font-size:16px;"></i><div><p style="color:#fff;font-size:13px;font-weight:700;margin:0;">Certificate Verified ✓</p><p style="color:rgba(255,255,255,.7);font-size:12px;margin:2px 0 0;">Graduate: <strong>Fatima Zahra</strong> · Full-Stack Web Development · June 2026</p></div></div>';
  } else {
    result.innerHTML = '<div style="background:rgba(239,68,68,.15);border:1px solid rgba(239,68,68,.3);border-radius:10px;padding:12px;display:flex;align-items:center;gap:10px;"><i class="fa-solid fa-triangle-exclamation" style="color:#ef4444;font-size:16px;"></i><div><p style="color:#fff;font-size:13px;font-weight:700;margin:0;">Certificate Not Found</p><p style="color:rgba(255,255,255,.7);font-size:12px;margin:2px 0 0;">Please check the ID and try again. Demo: SKA-2026-0841</p></div></div>';
  }
}

// Mobile responsive — collapse grid on small screens
function handleResize() {
  const w = window.innerWidth;
  const grid = document.getElementById('courses-grid');
  if (grid) {
    grid.style.gridTemplateColumns = w < 640 ? '1fr' : w < 1024 ? 'repeat(2,1fr)' : 'repeat(4,1fr)';
  }
  document.querySelectorAll('[data-responsive-grid]').forEach(el => {
    el.style.gridTemplateColumns = w < 768 ? '1fr' : el.dataset.responsiveGrid;
  });
}
window.addEventListener('resize', handleResize);
handleResize();
</script>
@endpush
