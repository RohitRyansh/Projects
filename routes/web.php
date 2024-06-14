<?php

use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile','edit')->name('profile.edit');
        Route::patch('/profile','update')->name('profile.update');
        Route::delete('/profile','destroy')->name('profile.destroy');
    });

    Route::controller(LeadController::class)->group(function () {
        Route::get('/leads', 'index')->name('leads');
        Route::get('/leads/create', 'create')->name('leads.create');
        Route::post('/leads/store', 'store')->name('leads.store');
        Route::get('/leads/{lead}/show', 'show')->name('leads.show');
        Route::get('/leads/{lead}/edit', 'edit')->name('leads.edit');
        Route::put('/leads/{lead}/update', 'update')->name('leads.update');
        Route::delete('/leads/{lead}/delete', 'delete')->name('leads.delete');
    });
});

require __DIR__.'/auth.php';
