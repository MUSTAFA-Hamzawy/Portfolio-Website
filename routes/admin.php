<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Brand Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->prefix('/admin')->controller(adminController::class)
    ->group(function() {
        // edit profile
        Route::view('profile', 'admin.profile.edit')->name('profile-edit');
        Route::post('profile_update', 'profileUpdate')->name('profile-update');
        Route::post('password_update', 'passwordUpdate')->name('password-update');

    });
