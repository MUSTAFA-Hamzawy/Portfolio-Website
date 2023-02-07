<?php


use App\Http\Controllers\aboutController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->prefix('admin')->controller(aboutController::class)->group(function (){
    Route::get('about', 'aboutShow')->name('about-show');
    Route::post('about_update', 'aboutUpdate')->name('about-update');
});
