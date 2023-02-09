<?php


use App\Http\Controllers\portfolioController;
use App\Models\portfolioModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// back-end routes
Route::middleware(['auth', 'verified'])->prefix('admin')->controller(portfolioController::class)->group(function (){
    Route::view('portfolio', 'admin.portfolio.portfolio_default', [
        'data' => DB::table('portfolio_projects_view')->select()->get()
    ])->name('portfolio-show');
    Route::post('portfolio/delete', 'portfolioRemove')->name('portfolio-remove');
    Route::get('portfolio/edit/{id}', 'portfolioEdit')->name('portfolio-edit');
    Route::post('portfolio/update', 'portfolioUpdate')->name('portfolio-update');
    Route::view('portfolio/add', 'admin.portfolio.portfolio_add',
        ['categories' => DB::table('portfolio_category')->select('id', 'category_name')->get()])
        ->name('portfolio-add');
    Route::post('portfolio/create', 'portfolioCreate')->name('portfolio-create');
});

// front-end routes
Route::controller(portfolioController::class)->group(function (){
    Route::view('/portfolio', 'frontend.pages.portfolio.portfolio',
        ['data' => portfolioModel::all(),
        'categories' => DB::table('portfolio_category')->get()
        ])
        ->name('portfolio-full-page');

    Route::view('/portfolio_details/{id}', 'frontend.pages.portfolio.portfolio_details',
        ['data' => []])
        ->name('portfolio-details-page');

    Route::view('/portfolio_details/latest', 'frontend.pages.portfolio.portfolio_details',
        ['data' => []])
        ->name('portfolio-details-page-latest');

});
