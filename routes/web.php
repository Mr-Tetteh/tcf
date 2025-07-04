<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', App\Livewire\User\Home::class)->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('send', function () {
    return sendWithSMSONLINEGH('233559724772', 'Hello', 'GABSAB');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin_route.php';
require __DIR__.'/user_route.php';
