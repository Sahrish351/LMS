<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\SupportStaffController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\BatchController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\RevenueReportController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\SupportTicketController;
use App\Http\Controllers\Admin\DiscussionForumController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;


 
//  PUBLIC ROUTES 
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/courses', [PublicController::class, 'courses'])->name('courses');
Route::get('/course/{slug}', [PublicController::class, 'courseDetail'])->name('course.detail');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::post('/contact', [PublicController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/verify-certificate', [PublicController::class, 'verifyCertificate'])->name('certificate.verify');
 
// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login',           [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login',          [LoginController::class, 'login']);
    Route::get('/register',        [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register',       [RegisterController::class, 'register']);
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showForm'])->name('password.request');
    Route::post('/forgot-password',[ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
});

Route::get('/reset-password/{token}',  [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password',          [ForgotPasswordController::class, 'reset'])->name('password.update');

Route::get('/auth/google',          [LoginController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');


// Guest Routes

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});
 
// admin

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/', [DashboardController::class, 'index']); // /admin -> dashboard

    // Students
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

    // Teachers
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
    Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('/teachers/{teacher}', [TeacherController::class, 'show'])->name('teachers.show');
    Route::get('/teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::put('/teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
    Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

    // Support Staff
    Route::get('/support-staff', [SupportStaffController::class, 'index'])->name('support-staff.index');
    Route::get('/support-staff/create', [SupportStaffController::class, 'create'])->name('support-staff.create');
    Route::post('/support-staff', [SupportStaffController::class, 'store'])->name('support-staff.store');
    Route::get('/support-staff/{staff}/edit', [SupportStaffController::class, 'edit'])->name('support-staff.edit');
    Route::put('/support-staff/{staff}', [SupportStaffController::class, 'update'])->name('support-staff.update');
    Route::delete('/support-staff/{staff}', [SupportStaffController::class, 'destroy'])->name('support-staff.destroy');

    // Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Courses
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');

    // Modules
    Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
    Route::get('/modules/create', [ModuleController::class, 'create'])->name('modules.create');
    Route::post('/modules', [ModuleController::class, 'store'])->name('modules.store');
    Route::get('/modules/{module}/edit', [ModuleController::class, 'edit'])->name('modules.edit');
    Route::put('/modules/{module}', [ModuleController::class, 'update'])->name('modules.update');
    Route::delete('/modules/{module}', [ModuleController::class, 'destroy'])->name('modules.destroy');

    // Lessons
    Route::get('/lessons', [LessonController::class, 'index'])->name('lessons.index');
    Route::get('/lessons/create', [LessonController::class, 'create'])->name('lessons.create');
    Route::post('/lessons', [LessonController::class, 'store'])->name('lessons.store');
    Route::get('/lessons/{lesson}/edit', [LessonController::class, 'edit'])->name('lessons.edit');
    Route::put('/lessons/{lesson}', [LessonController::class, 'update'])->name('lessons.update');
    Route::delete('/lessons/{lesson}', [LessonController::class, 'destroy'])->name('lessons.destroy');

    // Batches
    Route::get('/batches', [BatchController::class, 'index'])->name('batches.index');
    Route::post('/batches', [BatchController::class, 'store'])->name('batches.store');
    Route::put('/batches/{batch}', [BatchController::class, 'update'])->name('batches.update');
    Route::delete('/batches/{batch}', [BatchController::class, 'destroy'])->name('batches.destroy');

    // Certificates
    Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');
    Route::post('/certificates/{certificate}/issue', [CertificateController::class, 'issue'])->name('certificates.issue');

    // Payments
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::patch('/payments/{payment}/verify', [PaymentController::class, 'verify'])->name('payments.verify');
    Route::patch('/payments/{payment}/reject', [PaymentController::class, 'reject'])->name('payments.reject');

    // Revenue Reports
    Route::get('/revenue-reports', [RevenueReportController::class, 'index'])->name('revenue-reports.index');
    Route::get('/revenue-reports/export', [RevenueReportController::class, 'export'])->name('revenue-reports.export');

    // Announcements
    Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
    Route::post('/announcements', [AnnouncementController::class, 'store'])->name('announcements.store');
    Route::delete('/announcements/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');

    // Support Tickets
    Route::get('/support-tickets', [SupportTicketController::class, 'index'])->name('support-tickets.index');
    Route::get('/support-tickets/{ticket}', [SupportTicketController::class, 'show'])->name('support-tickets.show');
    Route::patch('/support-tickets/{ticket}/status', [SupportTicketController::class, 'updateStatus'])->name('support-tickets.status');
    Route::post('/support-tickets/{ticket}/reply', [SupportTicketController::class, 'reply'])->name('support-tickets.reply');

    // Discussion Forum
    Route::get('/discussion-forum', [DiscussionForumController::class, 'index'])->name('discussion-forum.index');
    Route::get('/discussion-forum/{thread}', [DiscussionForumController::class, 'show'])->name('discussion-forum.show');
    Route::delete('/discussion-forum/{thread}', [DiscussionForumController::class, 'destroy'])->name('discussion-forum.destroy');

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::patch('/notifications/{notification}/read', [NotificationController::class, 'markRead'])->name('notifications.read');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllRead'])->name('notifications.readAll');

    // Administration
    Route::get('/admin-users', [AdminUserController::class, 'index'])->name('admin-users.index');
    Route::post('/admin-users', [AdminUserController::class, 'store'])->name('admin-users.store');
    Route::put('/admin-users/{user}', [AdminUserController::class, 'update'])->name('admin-users.update');
    Route::delete('/admin-users/{user}', [AdminUserController::class, 'destroy'])->name('admin-users.destroy');

    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

});
