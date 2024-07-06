<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [ProfileController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/add-event', [ProfileController::class, 'add_event'])->name('add_event');
    Route::get('/delete-event/{id}', [ProfileController::class, 'delete_event'])->name('delete_event');
    Route::get('/view-event/{id}', [ProfileController::class, 'view_event'])->name('view_event');
    Route::get('/edit-event/{id}', [ProfileController::class, 'edit_event'])->name('edit_event');
    Route::post('/update-event', [ProfileController::class, 'update_event'])->name('update_event');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
