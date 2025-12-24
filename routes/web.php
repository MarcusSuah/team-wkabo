<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{DashboardController, DistrictController, ClanController, TownController, MemberController, UserController, HomeController, AboutController};

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('about', AboutController::class);

// Auth routes
Auth::routes();

// Protected routes
Route::middleware(['auth'])->group(function () {
    // Role-based dashboard routing
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin routes
    Route::middleware(['role:admin'])->group(function () {
        // Users management
        Route::resource('users', UserController::class);
        // Members status update
        Route::post('/members/{member}/status', [MemberController::class, 'updateStatus'])->name('members.status');
        Route::patch('members/{member}/approve', [MemberController::class, 'approve'])->name('members.approve');
        Route::patch('members/{member}/reject', [MemberController::class, 'reject'])->name('members.reject');
        Route::patch('members/{member}/status', [MemberController::class, 'updateStatus'])->name('members.updateStatus');
    });

    // Common authenticated routes
    Route::middleware(['role:admin|manager'])->group(function () {
        Route::resource('districts', DistrictController::class);
        Route::resource('clans', ClanController::class);
        Route::resource('towns', TownController::class);
        Route::resource('members', MemberController::class);

        // AJAX routes
        Route::get('ajax/towns/district/{district}', [TownController::class, 'getByDistrict'])->name('ajax.towns.by-district');
        Route::get('ajax/towns/clan/{clan}', [TownController::class, 'getByClan'])->name('ajax.towns.by-clan');
        Route::get('ajax/clans/district/{district}', [ClanController::class, 'getByDistrict'])->name('ajax.clans.by-district');
        Route::post('ajax/members/check-duplicate', [MemberController::class, 'checkDuplicate'])->name('ajax.members.check-duplicate');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
