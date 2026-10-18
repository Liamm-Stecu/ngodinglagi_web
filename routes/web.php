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

Route::get('/sitemap.xml', function () {
    $urls = collect([
        ['loc' => route('home'), 'priority' => '1.0', 'changefreq' => 'weekly'],
        ['loc' => route('layanan'), 'priority' => '0.9', 'changefreq' => 'monthly'],
        ['loc' => route('portofolio'), 'priority' => '0.8', 'changefreq' => 'monthly'],
        ['loc' => route('kontak'), 'priority' => '0.7', 'changefreq' => 'yearly'],
    ]);

    $xml = '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'.PHP_EOL;

    foreach ($urls as $url) {
        $xml .= '  <url>'.PHP_EOL;
        $xml .= '    <loc>'.e($url['loc']).'</loc>'.PHP_EOL;
        $xml .= '    <changefreq>'.$url['changefreq'].'</changefreq>'.PHP_EOL;
        $xml .= '    <priority>'.$url['priority'].'</priority>'.PHP_EOL;
        $xml .= '  </url>'.PHP_EOL;
    }

    $xml .= '</urlset>'.PHP_EOL;

    return response($xml, 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');

Route::get('/robots.txt', function () {
    $content = implode("\n", [
        'User-agent: *',
        'Allow: /',
        'Disallow: /admin',
        '',
        'Sitemap: '.route('sitemap'),
        '',
    ]);

    return response($content, 200, ['Content-Type' => 'text/plain']);
})->name('robots');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->middleware('throttle:admin-login');

    Route::middleware('admin')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/kontak', [AdminContactController::class, 'edit'])->name('admin.contact.edit');
        Route::post('/kontak', [AdminContactController::class, 'update'])->name('admin.contact.update');
        Route::get('/layanan', [AdminServicesController::class, 'edit'])->name('admin.services.edit');
        Route::post('/layanan', [AdminServicesController::class, 'update'])->name('admin.services.update');
        Route::post('/layanan/tambah', [AdminServicesController::class, 'store'])->name('admin.services.store');
        Route::post('/layanan/hapus/{index}', [AdminServicesController::class, 'destroy'])->whereNumber('index')->name('admin.services.destroy');
        Route::post('/layanan/{index}/tier/tambah', [AdminServicesController::class, 'storeTier'])->whereNumber('index')->name('admin.services.tier.store');
        Route::post('/layanan/{index}/tier/hapus/{tierIndex}', [AdminServicesController::class, 'destroyTier'])->whereNumber('index')->whereNumber('tierIndex')->name('admin.services.tier.destroy');
        Route::get('/portofolio', [AdminPortfolioController::class, 'edit'])->name('admin.portfolio.edit');
        Route::post('/portofolio', [AdminPortfolioController::class, 'update'])->name('admin.portfolio.update');
        Route::post('/portofolio/kategori/tambah', [AdminPortfolioController::class, 'storeCategory'])->name('admin.portfolio.category.store');
        Route::post('/portofolio/kategori/hapus/{index}', [AdminPortfolioController::class, 'destroyCategory'])->whereNumber('index')->name('admin.portfolio.category.destroy');
        Route::get('/mitra', [AdminPartnerController::class, 'edit'])->name('admin.partner.edit');
        Route::post('/mitra', [AdminPartnerController::class, 'update'])->name('admin.partner.update');
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    });
});
