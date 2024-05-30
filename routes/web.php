<?php
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MecanicienController;
use App\Http\Controllers\ReparationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehiculeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

Route::view('/', 'welcome');

// Admin dashboard routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('dashboard')->name('admin.')->group(function () {
        Route::get('/', HomeController::class)->name('home');
        Route::view('/buttons', 'admin.buttons')->name('buttons');
        Route::view('/cards', 'admin.cards')->name('cards');
        Route::view('/charts', 'admin.charts')->name('charts');
        Route::view('/forms', 'admin.forms')->name('forms');
        Route::view('/modals', 'admin.modals')->name('modals');
        Route::view('/tables', 'admin.tables')->name('tables');
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/clients', [ClientController::class, 'index'])->name('clients');
        Route::resource('vehicules', VehiculeController::class);
        Route::resource('mecaniciens', MecanicienController::class);
        Route::resource('reparations', ReparationController::class);
        Route::prefix('pages')->name('page.')->group(function () {
            Route::view('/404-page', 'admin.pages.404')->name('404');
            Route::view('/blank-page', 'admin.pages.blank')->name('blank');
            Route::view('/create-account-page', 'admin.pages.create-account')->name('create-account');
            Route::view('/forgot-password-page', 'admin.pages.forgot-password')->name('forgot-password');
            Route::view('/login-page', 'admin.pages.login')->name('login');
        });
    });
});

// Editor dashboard routes
Route::middleware(['auth', 'editor'])->group(function () {
    Route::get('/editor/dashboard', function () {
        return 'Hi EDITOR ';
    })->name('editor_dashboard');
});

// Authentication routes
require __DIR__ . '/auth.php';
