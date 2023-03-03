<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::redirect('/home', '/admin');

Route::get('/posts/{category}', [HomeController::class, 'postsByCategory'])->name('posts.category');
Route::get('/post/{postId}', [HomeController::class, 'post'])->name('post');


// Middleware '/admin'
Route::get('/admin', function () {
    return view('admin');
})->middleware('auth')->name("admin");

Route::prefix('admin')->group(function () {

    /*-------------------------------------------------------------------------
| Categorías
|--------------------------------------------------------------------------
*/
    Route::get('/categories/livewire', [CategoriesController::class, 'livewire'])->name('admin.categories.livewire');
    Route::get('/categories', [CategoriesController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/new', [CategoriesController::class, 'new'])->name('admin.categories.new');
    Route::post('/categories/store', [CategoriesController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/edit/{category}', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
    Route::post('/categories/update/{id}', [CategoriesController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/delete/{id}', [CategoriesController::class, 'delete'])->name('admin.categories.delete');




    /*-------------------------------------------------------------------------
| Posts
|--------------------------------------------------------------------------
*/
    Route::get('/posts/livewire', [PostsController::class, 'livewire'])->name('admin.posts.livewire');
    Route::get('/posts', [PostsController::class, 'index'])->name('admin.posts.index');
    Route::get('/posts/new', [PostsController::class, 'new'])->name('admin.posts.new');
    Route::post('/posts/store', [PostsController::class, 'store'])->name('admin.posts.store');
    Route::get('/posts/edit/{id}', [PostsController::class, 'edit'])->name('admin.posts.edit');
    Route::post('/posts/update/{id}', [PostsController::class, 'update'])->name('admin.posts.update');
    Route::delete('/posts/delete/{id}', [PostsController::class, 'delete'])->name('admin.posts.delete');

    /*-------------------------------------------------------------------------
| Usuarios
|--------------------------------------------------------------------------
*/
    Route::group(function () {
        Route::get('/users', [UsersController::class, 'index'])->name('admin.users.index');
        Route::get('/users/new', [UsersController::class, 'new'])->name('admin.users.new');
        Route::post('/users/store', [UsersController::class, 'store'])->name('admin.users.store');
        Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');
        Route::post('/users/update/{id}', [UsersController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/delete/{id}', [UsersController::class, 'delete'])->name('admin.users.delete');
    })->middleware(['role:adnin']);
})->middleware('auth');
Auth::routes();
