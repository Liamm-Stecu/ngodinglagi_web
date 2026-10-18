<?php

use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminPartnerController;
use App\Http\Controllers\Admin\AdminPortfolioController;
use App\Http\Controllers\Admin\AdminServicesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'services' => config('services.services'),
    ]);
})->name('home');

Route::get('/portofolio', function () {
    return view('portofolio', [
        'stats' => config('portfolio.stats'),
        'categories' => config('portfolio.categories'),
    ]);
})->name('portofolio');

Route::get('/layanan', function () {
    return view('layanan', [
        'services' => config('services.services'),
    ]);
})->name('layanan');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login']);

    Route::middleware('admin')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/kontak', [AdminContactController::class, 'edit'])->name('admin.contact.edit');
        Route::post('/kontak', [AdminContactController::class, 'update'])->name('admin.contact.update');
        Route::get('/layanan', [AdminServicesController::class, 'edit'])->name('admin.services.edit');
        Route::post('/layanan', [AdminServicesController::class, 'update'])->name('admin.services.update');
        Route::get('/portofolio', [AdminPortfolioController::class, 'edit'])->name('admin.portfolio.edit');
        Route::post('/portofolio', [AdminPortfolioController::class, 'update'])->name('admin.portfolio.update');
        Route::get('/mitra', [AdminPartnerController::class, 'edit'])->name('admin.partner.edit');
        Route::post('/mitra', [AdminPartnerController::class, 'update'])->name('admin.partner.update');
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    });
});
