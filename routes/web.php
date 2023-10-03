<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\RolesController;
use App\Models\Theses;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThesesController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ThesesController::class, 'index'])->name('dashboard');
Route::get('search/{title}', [ThesesController::class, 'search']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('submit', [ThesesController::class, 'submit'])->name('submit');
});

Route::resource('theses', ThesesController::class)
    ->only(['store', 'edit', 'destroy',])
    ->middleware(['auth', 'verified']);

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', UserController::class);
    Route::resource('/permission', PermissionController::class);
});

Route::middleware(['auth', 'role:contentModerator'])->name('moderator.')->prefix('moderator')->group(function() {
    Route::get('/', [ModeratorController::class, 'index'])->name('index');
});

Route::get('theses/approve/{theses}', [ThesesController::class, 'approve'])->middleware(['auth']);

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('logout');

Route::get('year/{year}', [ThesesController::class, 'years']);
Route::get('view/{theses}', [ThesesController::class, 'singleThesis'])->name('view-thesis');
Route::get('categories/{key}', [ThesesController::class, 'categories'])->name('categories');
    