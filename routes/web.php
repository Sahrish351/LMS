<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

 
//  PUBLIC ROUTES 
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/courses', [PublicController::class, 'courses'])->name('courses');
Route::get('/course/{slug}', [PublicController::class, 'courseDetail'])->name('course.detail');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::post('/contact', [PublicController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/verify-certificate/{code}', [PublicController::class, 'verifyCertificate'])->name('certificate.verify');
 
