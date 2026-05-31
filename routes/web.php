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

// --------------------------------------------------
// Public Routes
// --------------------------------------------------

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// --------------------------------------------------
// Authenticated User Routes
// --------------------------------------------------

Route::middleware('auth')->group(function () {

    // Projects
    Route::resource('projects', ProjectController::class);

    // Tasks
    Route::resource('tasks', TaskController::class);

    // Comments
    Route::resource('comments', CommentController::class);
});


// --------------------------------------------------
// Admin Routes
// --------------------------------------------------

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        // Projects
        Route::resource('projects', AdminProjectController::class);

        // Tasks
        Route::resource('tasks', AdminTaskController::class);

        // Comments
        Route::resource('comments', AdminCommentController::class);
    });
