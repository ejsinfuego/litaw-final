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

Route::get('/', [ThesesController::class, 'index', 'navBar'])->name('dashboard');
Route::get('search/{title}', [ThesesController::class, 'search']);
Route::get('/theses', [ThesesController::class, 'index'])->name('theses');
Route::get('/search/year/', [ThesesController::class, 'sortYear'])->name('sortYear');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('submit', [ThesesController::class, 'submit'])->name('submit')->middleware(['auth', 'role:registeredUser|contentModerator']);
});

Route::resource('theses', ThesesController::class)
    ->only(['store', 'destroy'])
        ->middleware(['auth', 'verified', 'role:registeredUser|contentModerator']);

//update
Route::patch('theses/{theses}', [ThesesController::class, 'update'])->middleware(['auth', 'verified'])->name('theses.update');

Route::get('theses/{theses}/edit', [ThesesController::class, 'edit'])->middleware(['auth', 'verified'])->name('theses.edit');

//comment and like
Route::patch('theses/{theses}/comment', [ThesesController::class, 'comment'])->middleware(['auth', 'verified'])->name('theses.comment');
Route::get('theses/{theses}/like', [ThesesController::class, 'like'])->middleware(['auth', 'verified'])->name('theses.like');


Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', UserController::class);
    Route::resource('/permission', PermissionController::class);
    Route::get('/moderator', [ModeratorController::class, 'index'])->name('index');

});

Route::middleware(['auth', 'verified', 'role:contentModerator|admin'])->name('moderator.')->prefix('moderator')->group(function() {
    Route::get('/', [ModeratorController::class, 'index'])->name('index');
    Route::get('/approve/{theses}', [ModeratorController::class, 'approve'])->name('approve');
    Route::get('/reject/{theses}', [ModeratorController::class, 'reject'])->name('reject');
    Route::get('/users', [ModeratorController::class, 'users'])->name('users');
    Route::patch('/{user}/ban', [RolesController::class, 'ban'])->name('ban');
    Route::get('/unban/{user}', [RolesController::class,'unban'])->name('unban');
    Route::get('/stats', [ThesesController::class, 'stats'])->name('stats');
});


Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('logout');

Route::get('year/', [ThesesController::class, 'years'])->name('years');
Route::get('course/{course}', [ThesesController::class, 'courses'])->name('course');
Route::get('view/{theses}', [ThesesController::class, 'singleThesis'])->name('view-thesis');
Route::get('categories/{key}', [ThesesController::class, 'categories'])->name('categories');
Route::get('/data', [ThesesController::class, 'data'])->name('visualize');