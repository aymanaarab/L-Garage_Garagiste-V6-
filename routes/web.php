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
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome');


//dashboard routes
Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard', 'as' => 'admin.'], function () {
    //single action controllers
    Route::get('/', HomeController::class)->name('home');

    //link that return view, to get compoment from there
    Route::view('/buttons', 'admin.buttons')->name('buttons');
    Route::view('/cards', 'admin.cards')->name('cards');
    Route::view('/charts', 'admin.charts')->name('charts');
    Route::view('/forms', 'admin.forms')->name('forms');
    Route::view('/modals', 'admin.modals')->name('modals');
    Route::view('/tables', 'admin.tables')->name('tables');
    // Route::view('/users', 'admin.user.index')->name('users');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/clients', [ClientController::class, 'index'])->name('clients');
    // Route::get('/mechaniciens', [MecanicienController::class, 'index'])->name('mechaniciens');
    Route::resource('vehicules', VehiculeController::class);
    Route::resource('users', UserController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('vehicules', VehiculeController::class);
    Route::resource('mecaniciens', MecanicienController::class);
    Route::resource('reparations', ReparationController::class);
    Route::group(['prefix' => 'pages', 'as' => 'page.'], function () {
        Route::view('/404-page', 'admin.pages.404')->name('404');
        Route::view('/blank-page', 'admin.pages.blank')->name('blank');
        Route::view('/create-account-page', 'admin.pages.create-account')->name('create-account');
        Route::view('/forgot-password-page', 'admin.pages.forgot-password')->name('forgot-password');
        Route::view('/login-page', 'admin.pages.login')->name('login');
    });
});

// Route::middleware(['admin'])->group(function () {
//     Route::view('/buttons', 'admin.buttons')->name('buttons');
//     Route::view('/cards', 'admin.cards')->name('cards');
//     Route::view('/charts', 'admin.charts')->name('charts');
//     Route::view('/forms', 'admin.forms')->name('forms');
//     Route::view('/modals', 'admin.modals')->name('modals');
//     Route::view('/tables', 'admin.tables')->name('tables');
// })
// ;
Route::middleware(['auth', 'editor'])->group(function () {

    Route::get('/editor/dashboard', function () {
        return 'Hi EDITOR ';
    })->name('editor_dashboard');
})
;
// Route::resource('users', UserController::class);
// Route::resource('clients', ClientController::class);
// Route::resource('vehicules', VehiculeController::class);
// Route::resource('mecaniciens', MecanicienController::class);
// Route::resource('reparations', ReparationController::class);

require __DIR__ . '/auth.php';
