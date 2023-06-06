<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')->prefix('admin')->name('admin.')->group(function () {

    //project resource
    Route::resource('projects', ProjectController::class);

    //contacts routes
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::delete('contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

    //dashboard routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
