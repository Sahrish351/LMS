<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;


 
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
