<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\GraphController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/details/{id}/{type}', [GraphController::class, 'index'])->name('graph');



/* Admin routing */
Route::middleware(['auth:sanctum', 'verified'])->get('/admin', [AdminController::class, 'index'])->name('admin panel');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/createNewAccount', [AdminController::class, 'register'])->name('admin register');

Route::middleware(['auth:sanctum', 'verified'])->post('/admin/createNewAccount', [AdminController::class, 'createNewAccount']);

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/editExistingAccounts', [AdminController::class, 'editExistingAccounts'])->name('admin account overview');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/deletion/{id}', [AdminController::class, 'deleteAccount'])->name('admin deletion');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/editFishpond/{id}', [AdminController::class, 'editFishpond'])->name('admin edit fishponds');

Route::middleware(['auth:sanctum', 'verified'])->post('/admin/editFishpond/{id}', [AdminController::class, 'confirmEditFishpond']);

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/editFishpond/{id}/{dataType}', [AdminController::class, 'editDangerzones'])->name('admin edit dangerzone');

Route::middleware(['auth:sanctum', 'verified'])->post('/admin/editFishpond/{id}/{dataType}', [AdminController::class, 'confirmEditDangerzones']);