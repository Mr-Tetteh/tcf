<?php

use App\Livewire\Admin\FamilyGathering;
use App\Livewire\Admin\RecordManagement;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->name('admin.dashboard');
        Route::get('/admin_users', \App\Livewire\Admin\AdminUsers::class)->name('admin.admin_users');
        Route::get('/register_member', \App\Livewire\Admin\RegisterMember::class)->name('admin.register_member');
        Route::get('/sermon', \App\Livewire\Admin\Sermon::class)->name('admin.sermon');
        Route::get('gallery', \App\Livewire\Admin\Gallery::class)->name('admin.gallery');
        Route::get('/study_material', \App\Livewire\Admin\StudyMaterial::class)->name('admin.study_material');
        Route::get('family_gathering', FamilyGathering::class)->name('admin.family_gathering');
        Route::get('record_management', RecordManagement::class)->name('admin.record_management');
        Route::get('/finance', \App\Livewire\Admin\Finance::class)->name('admin.finance');
        Route::get('/online_translations', \App\Livewire\Admin\Online::class)->name('admin.online');
        Route::get('/contact', \App\Livewire\Admin\Contact::class)->name('admin.contact');
        Route::get('/registration_by_all_years',\App\Livewire\Admin\FamilyGatheringAllYears::class )->name('admin.familyGatheringAllYears');
        Route::get('/admin.events', \App\Livewire\Admin\Events::class)->name('admin.events');
    });
});
