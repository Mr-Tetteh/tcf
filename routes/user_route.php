<?php
use Illuminate\Support\Facades\Route;
Route::prefix('users')->group(function () {
    Route::get('/', \App\Livewire\User\Home::class)->name('home');
    Route::get('/about', \App\Livewire\User\About::class)->name('about');
    Route::get('sermons', \App\Livewire\User\Sermons::class)->name('sermons');
    Route::get('gallery', \App\Livewire\User\Gallery::class)->name('gallery');


});
