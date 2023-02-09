<?php


use App\Http\Controllers\blogCategoryController;
use App\Http\Controllers\blogController;
use App\Http\Controllers\portfolioController;
use App\Models\blogModel;
use App\Models\portfolioModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// back-end routes
Route::middleware(['auth', 'verified'])->prefix('admin')->controller(blogController::class)->group(function (){
    Route::post('blog_category_create', 'blogCategoryCreate')->name('blog-category-create');
    Route::view('blog_category_add', 'admin.blog.categories.category_add')->name('blog-category-add');
});

// back-end routes
Route::middleware(['auth', 'verified'])->prefix('admin')->controller(blogController::class)->group(function (){
    Route::view('blog', 'admin.blog.blog_default',
    ['data' => DB::table('blog_posts_view')->get()])->name('blog-show');
    Route::view('blog_add', 'admin.blog.blog_add',
    ['categories' => DB::table('blog_category')->get()])->name('blog-add');
    Route::post('blog_create', 'blogCreate')->name('blog-create');
    Route::get('blog_edit/{id}', 'blogEdit')->name('blog-edit');
    Route::post('blog_update', 'blogUpdate')->name('blog-update');
    Route::post('blog_remove', 'blogRemove')->name('blog-remove');
});

// front-end routes
Route::controller(blogController::class)->group(function (){
    Route::view('/blog', 'frontend.pages.blog.blog',
        ['data' => blogModel::all(),
            'categories' => DB::table('blog_category')->get()
        ])
        ->name('blog-full-page');

    Route::view('/blog_details/{id}', 'frontend.pages.blog.blog_details',
        ['data' => []])
        ->name('blog-details-page');

    Route::view('/blog_details/latest', 'frontend.pages.blog.blog_details',
        ['data' => []])
        ->name('blog-details-page-latest');

});
