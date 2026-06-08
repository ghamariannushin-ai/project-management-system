<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CommentController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminTaskController;
use App\Http\Controllers\Admin\AdminCommentController;


// صفحه اصلی
Route::get('/', [HomeController::class, 'index'])->name('home');


// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// مسیرهای کاربران لاگین‌شده
Route::middleware('auth')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('user.home');

    Route::resource('projects', ProjectController::class);

    Route::resource('tasks', TaskController::class);

    Route::resource('comments', CommentController::class);

});


// مسیرهای پنل ادمین
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('projects', AdminProjectController::class);

        Route::resource('tasks', AdminTaskController::class);

        Route::resource('comments', AdminCommentController::class);

    });
