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

Route::middleware(['auth:sanctum', 'verified'])->get('/uploadImage', [uploadImageController::class, 'index'])->name('uploadImage');

Route::middleware(['auth:sanctum', 'verified'])->post('/uploadImages/{id}', [uploadImageController::class, 'uploadImages']);

/* Admin routing */
Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/admin', [AdminController::class, 'index'])->name('admin panel');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/admin/createNewAccount', [AdminController::class, 'register'])->name('admin register');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->post('/admin/createNewAccount', [AdminController::class, 'createNewAccount']);

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/admin/editExistingAccounts', [AdminController::class, 'editExistingAccounts'])->name('admin account overview');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/admin/deletion/{id}', [AdminController::class, 'deleteAccount'])->name('admin deletion');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/admin/editFishpond/{id}', [AdminController::class, 'editFishpond'])->name('admin edit fishponds');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->post('/admin/editFishpond/{id}', [AdminController::class, 'confirmEditFishpond']);

Route::middleware(['auth:sanctum', 'verified', 'admin'])->post('/admin/updateFishType/{id}', [AdminController::class, 'confirmUpdateFishType']);

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/editFishpond/{id}/{dataType}', [AdminController::class, 'editDangerzones'])->name('admin edit dangerzone');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->post('/admin/editFishpond/{id}/{dataType}', [AdminController::class, 'confirmEditDangerzones']);

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/admin/editFishpondSensors/{id}', [AdminController::class, 'editSensors'])->name('admin edit sensors');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->post('/admin/editFishpondSensors/{id}', [AdminController::class, 'confirmEditSensors']);

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/admin/transactions', [AdminController::class, 'showTransactions'])->name('admin transactions');
