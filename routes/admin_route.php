<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->name('admin.dashboard');
    Route::get('/admin_users', \App\Livewire\Admin\AdminUsers::class)->name('admin.admin_users');
    Route::get('/register_member', \App\Livewire\Admin\RegisterMember::class)->name('admin.register_member');
});
