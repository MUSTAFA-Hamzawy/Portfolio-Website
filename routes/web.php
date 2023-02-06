<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('/')->group(function(){
    Route::fallback(function (){
        return view('error_page');
    });
});

Route::get('/', function () {
<<<<<<< Updated upstream
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');
=======
    return view('frontend.welcome');
});
>>>>>>> Stashed changes

Route::get('/dashboard', function () {
    return view('layouts.app');
})->middleware(['auth', 'verified'])->name('dashboard');


// Admin routes
Route::controller(AdminController::class)->group(function (){
   Route::get('/admin/profile', 'profile')->name('admin.profile');
});


require __DIR__.'/auth.php';
require __DIR__ . '/admin.php';

