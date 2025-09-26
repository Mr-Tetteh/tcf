<?php

use App\Livewire\admin\FamilyGathering;
use App\Livewire\admin\RecordManagement;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', \App\Livewire\admin\Dashboard::class)->name('admin.dashboard');
        Route::get('/admin_users', \App\Livewire\admin\AdminUsers::class)->name('admin.admin_users');
        Route::get('/register_member', \App\Livewire\admin\RegisterMember::class)->name('admin.register_member');
        Route::get('/sermon', \App\Livewire\admin\Sermon::class)->name('admin.sermon');
        Route::get('gallery', \App\Livewire\admin\Gallery::class)->name('admin.gallery');
        Route::get('/study_material', \App\Livewire\admin\StudyMaterial::class)->name('admin.study_material');
        Route::get('family_gathering', FamilyGathering::class)->name('admin.family_gathering');
        Route::get('record_management', RecordManagement::class)->name('admin.record_management');
        Route::get('/finance', \App\Livewire\admin\Finance::class)->name('admin.finance');
        Route::get('/online_translations', \App\Livewire\admin\Online::class)->name('admin.online');
        Route::get('/contact', \App\Livewire\admin\Contact::class)->name('admin.contact');
        Route::get('/registration_by_all_years',\App\Livewire\admin\FamilyGatheringAllYears::class )->name('admin.familyGatheringAllYears');
        Route::get('/admin.events', \App\Livewire\admin\Events::class)->name('admin.events');
    });
});
