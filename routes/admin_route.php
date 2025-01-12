<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->name('admin.dashboard');
});
