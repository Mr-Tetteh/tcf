<?php

use App\Livewire\User\Studymaterial;
use Illuminate\Support\Facades\Route;
Route::prefix('users')->group(function () {
    Route::get('/', \App\Livewire\User\Home::class)->name('home');
    Route::get('/about', \App\Livewire\User\About::class)->name('about');
    Route::get('sermons', \App\Livewire\User\Sermons::class)->name('sermons');
    Route::get('gallery', \App\Livewire\User\Gallery::class)->name('gallery');
    Route::get('events', \App\Livewire\User\Events::class)->name('events');
    Route::get('contact', \App\Livewire\User\Contact::class)->name('contact');
    Route::get('/study-material', StudyMaterial::class)->name('study-material');



});
