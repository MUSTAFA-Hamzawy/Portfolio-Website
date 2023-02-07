<?php


use App\Http\Controllers\homeBannerController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->prefix('admin')->controller(homeBannerController::class)->group(function (){
   Route::get('home_banner', 'homeBannerShow')->name('show-home-banner');
    Route::post('home_banner_update', 'homeBannerUpdate')->name('home-banner-update');
    });
