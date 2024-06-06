<?php
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\MecanicienController;
use App\Http\Controllers\PieceRechangeController;
use App\Http\Controllers\RendezVouController;
use App\Http\Controllers\ReparationController;
use App\Http\Controllers\ReparationMecanico;
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

// Route::view('/', 'welcome');
Route::view('/', 'testwelcome');

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
        Route::resource('vehicules', VehiculeController::class);
        Route::resource('users', UserController::class);
        Route::resource('clients', ClientController::class);
        Route::resource('mecaniciens', MecanicienController::class);
        Route::resource('reparations', ReparationController::class);
        Route::resource('factures', FactureController::class);
        Route::resource('rendez-vous', RendezVouController::class);
        Route::resource('piece-rechanges', PieceRechangeController::class);
        Route::controller(UserController::class)->group(function () {
            Route::get('users-export', 'export')->name('users.export');
            Route::post('users-import', 'import')->name('users.import');
        });
        Route::prefix('pages')->name('page.')->group(function () {
            Route::view('/404-page', 'admin.pages.404')->name('404');
            Route::view('/blank-page', 'admin.pages.blank')->name('blank');
            Route::view('/create-account-page', 'admin.pages.create-account')->name('create-account');
            Route::view('/forgot-password-page', 'admin.pages.forgot-password')->name('forgot-password');
            Route::view('/login-page', 'admin.pages.login')->name('login__');
        });
    });
});

// Mecanico dashboard routes
Route::middleware(['auth', 'editor'])->group(function () {
    Route::get('/mecanic/dashboard', function () {
        return view('mecanico.test');
    })->name('editor_dashboard');
    Route::prefix('dashboard')->name('mecanico.')->group(function () {
        // Route::get('create', [ReparationMecanico::class, 'create'])->name('create');
        // Route::get('/', [ReparationMecanico::class, 'index'])->name('index'); // Route for listing reparations
        // Route::post('/', [ReparationMecanico::class, 'store'])->name('store');
        // Route::get('{reparation}/edit', [ReparationMecanico::class, 'edit'])->name('edit');
        // Route::put('{reparation}', [ReparationMecanico::class, 'update'])->name('update');
        Route::resource('reparation', ReparationMecanico::class);

    });

});


// Client dashboard routes
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/fixcars', function () {
        return view('clientUser.index');
    })->name('client_dashboard');
});

// Authentication routes
require __DIR__ . '/auth.php';
