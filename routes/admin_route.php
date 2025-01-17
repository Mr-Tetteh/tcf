<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->name('admin.dashboard');
    Route::get('/admin_users', \App\Livewire\Admin\AdminUsers::class)->name('admin.admin_users');
    Route::get('/register_member', \App\Livewire\Admin\RegisterMember::class)->name('admin.register_member');
    Route::get('/sermon', \App\Livewire\Admin\Sermon::class)->name('admin.sermon');
    Route::get('gallery', \App\Livewire\Admin\Gallery::class)->name('admin.gallery');
    Route::get('/study_material', \App\Livewire\Admin\StudyMaterial::class)->name('admin.study_material');
});
