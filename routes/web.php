<?php

use App\Http\Controllers\Admin\AdminTicketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
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

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');
require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/tickets', [TicketController::class, 'index'])->name('customer.index');
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('customer.create');
    Route::post('/tickets', [TicketController::class, 'store'])->name('customer.store');
    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('customer.show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes protected
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/tickets', [AdminTicketController::class, 'index'])->name('admin.index');
    Route::get('/tickets/{ticket}', [AdminTicketController::class, 'show'])->name('admin.show');
    Route::post('/tickets/{ticket}/respond', [AdminTicketController::class, 'respond'])->name('admin.respond');
    Route::post('/tickets/{ticket}/close', [AdminTicketController::class, 'close'])->name('admin.close');
});


