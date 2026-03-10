<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;


Route::get('/', [FrontendController::class, 'home'])->name('frontend.home');
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/project/{uuid}', [FrontendController::class, 'project'])->name('frontend.project');
Route::get('/contact-us', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('/project', [FrontendController::class, 'allProject'])->name('frontend.allProject');
// Route::get('/auth/redirect/{provider}', [AuthController::class, 'redirect'])->name('auth.redirect');
// Route::get('/auth/callback/{provider}', [AuthController::class, 'callback'])->name('auth.callback');
// Route::get('/auth/create-password', [AuthController::class, 'create_password'])->name('auth.create-password');
// Route::post('/auth/create-password/update', [AuthController::class, 'create_password_update'])->name('auth.create-password.update');
// Route::get('/auth/create-password/skip', [AuthController::class, 'create_password_skip'])->name('auth.create-password.skip');
