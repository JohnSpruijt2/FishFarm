<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\GraphController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\uploadImageController;
use App\Http\Controllers\MeasurementController;
use App\Http\Middleware\isAdmin;

use Laravel\Fortify\Http\Controllers\RegisteredUserController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified', 'subbed'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified', 'subbed'])->get('/details/{id}/{type}', [GraphController::class, 'index'])->name('graph');

Route::middleware(['auth:sanctum', 'verified', 'subbed'])->get('/details/{id}', [GraphController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified', 'subbed'])->get('/wallet', [WalletController::Class, 'index'])->name('wallet');

Route::middleware(['auth:sanctum', 'verified'])->get('/subscription', [SubscriptionController::Class, 'index'])->name('subscription');

Route::middleware(['auth:sanctum', 'verified'])->post('/updateSubscriptionType', [SubscriptionController::class, 'confirmUpdateSubscriptionType']);

Route::middleware(['auth:sanctum', 'verified', 'subbed'])->get('/uploadImage', [uploadImageController::class, 'index'])->name('uploadImage');

Route::middleware(['auth:sanctum', 'verified', 'subbed'])->post('/uploadImages/{id}', [uploadImageController::class, 'uploadImages']);

Route::middleware(['auth:sanctum', 'verified', 'subbed'])->get('/recentMeasurements', [MeasurementController::class, 'showRecent'])->name('recent measurements');

Route::middleware(['auth:sanctum', 'verified', 'subbed'])->get('/allMeasurements', [MeasurementController::class, 'showAll'])->name('all measurements');

Route::middleware(['auth:sanctum', 'verified', 'subbed'])->get('/measurement/{id}', [MeasurementController::class, 'showPicture'])->name('picture measurement');

/* Admin routing */
Route::middleware(['auth:sanctum', 'verified', isAdmin::class])->get('/admin', [AdminController::class, 'index'])->name('admin panel');

Route::middleware(['auth:sanctum', 'verified', isAdmin::class])->get('/admin/createNewAccount', [AdminController::class, 'register'])->name('admin register');

Route::middleware(['auth:sanctum', 'verified', isAdmin::class])->post('/admin/createNewAccount', [AdminController::class, 'createNewAccount']);

Route::middleware(['auth:sanctum', 'verified', isAdmin::class])->get('/admin/editExistingAccounts', [AdminController::class, 'editExistingAccounts'])->name('admin account overview');

Route::middleware(['auth:sanctum', 'verified', isAdmin::class])->get('/admin/deletion/{id}', [AdminController::class, 'deleteAccount'])->name('admin deletion');

Route::middleware(['auth:sanctum', 'verified', isAdmin::class])->get('/admin/editFishpond/{id}', [AdminController::class, 'editFishpond'])->name('admin edit fishponds');

Route::middleware(['auth:sanctum', 'verified', isAdmin::class])->post('/admin/editFishpond/{id}', [AdminController::class, 'confirmEditFishpond']);

Route::middleware(['auth:sanctum', 'verified', isAdmin::class])->post('/admin/updateFishType/{id}', [AdminController::class, 'confirmUpdateFishType']);

Route::middleware(['auth:sanctum', 'verified', isAdmin::class])->get('/admin/editFishpond/{id}/{dataType}', [AdminController::class, 'editDangerzones'])->name('admin edit dangerzone');

Route::middleware(['auth:sanctum', 'verified', isAdmin::class])->post('/admin/editFishpond/{id}/{dataType}', [AdminController::class, 'confirmEditDangerzones']);

Route::middleware(['auth:sanctum', 'verified', isAdmin::class])->get('/admin/editFishpondSensors/{id}', [AdminController::class, 'editSensors'])->name('admin edit sensors');

Route::middleware(['auth:sanctum', 'verified', isAdmin::class])->post('/admin/editFishpondSensors/{id}', [AdminController::class, 'confirmEditSensors']);

Route::middleware(['auth:sanctum', 'verified', isAdmin::class])->get('/admin/transactions', [AdminController::class, 'showTransactions'])->name('admin transactions');
