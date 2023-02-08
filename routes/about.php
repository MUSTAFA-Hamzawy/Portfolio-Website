<?php


use App\Http\Controllers\aboutController;
use App\Models\aboutModel;
use Illuminate\Support\Facades\Route;

// back-end routes
Route::middleware(['auth', 'verified'])->prefix('admin')->controller(aboutController::class)->group(function (){
    Route::get('about', 'aboutShow')->name('about-show');
    Route::post('about_update', 'aboutUpdate')->name('about-update');
});

// front-end routes
Route::controller(aboutController::class)->group(function (){
    Route::view('/about', 'frontend.pages.about_full_page', ['data' => aboutModel::all()->first()])->name('about-full-page');
});
