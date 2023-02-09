<?php


use App\Http\Controllers\contactController;
use App\Http\Controllers\portfolioController;
use App\Models\contactModel;
use App\Models\portfolioModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// back-end routes
Route::middleware(['auth', 'verified'])->prefix('admin')->controller(contactController::class)->group(function (){
    Route::view('contact', 'admin.contact.contact_default',
        ['data' => contactModel::all()])->name('contact-show');
    Route::post('contact_remove', 'contactRemove')->name('contact-remove');
    Route::post('contact_create', 'contactCreate')->name('contact-create');
});

// front-end routes
Route::controller(contactController::class)->group(function (){

    Route::view('/contact', 'frontend.pages.contact_us.contact')
        ->name('contact');

});
