<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\User\Home::class)->name('home');
