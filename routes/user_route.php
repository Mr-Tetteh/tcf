<?php
use Illuminate\Support\Facades\Route;
Route::prefix('users')->group(function () {
    Route::get('/', \App\Livewire\User\Home::class)->name('home');
    Route::get('/about', \App\Livewire\User\About::class)->name('about');


});
