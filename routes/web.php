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
Route::get('/admin', function(){
    return view('admin');
})->middleware('auth')->name("admin");

/*-------------------------------------------------------------------------
| Categorías
|--------------------------------------------------------------------------
*/
Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/new', [CategoriesController::class, 'new'])->name('admin.categories.new');
Route::post('/admin/categories/store', [CategoriesController::class, 'store'])->name('admin.categories.store');
Route::get('/admin/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
Route::post('/admin/categories/update/{id}', [CategoriesController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/delete/{id}', [CategoriesController::class, 'delete'])->name('admin.categories.delete');

/*-------------------------------------------------------------------------
| Posts
|--------------------------------------------------------------------------
*/
Route::get('/admin/posts/livewire', [PostsController::class, 'livewire'])->name('admin.posts.livewire');
Route::get('/admin/posts', [PostsController::class, 'index'])->name('admin.posts.index');
Route::get('/admin/posts/new', [PostsController::class, 'new'])->name('admin.posts.new');
Route::post('/admin/posts/store', [PostsController::class, 'store'])->name('admin.posts.store');
Route::get('/admin/posts/edit/{id}', [PostsController::class, 'edit'])->name('admin.posts.edit');
Route::post('/admin/posts/update/{id}', [PostsController::class, 'update'])->name('admin.posts.update');
Route::delete('/admin/posts/delete/{id}', [PostsController::class, 'delete'])->name('admin.posts.delete');

/*-------------------------------------------------------------------------
| Usuarios
|--------------------------------------------------------------------------
*/
Route::get('/admin/users', [UsersController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/new', [UsersController::class, 'new'])->name('admin.users.new');
Route::post('/admin/users/store', [UsersController::class, 'store'])->name('admin.users.store');
Route::get('/admin/users/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');
Route::post('/admin/users/update/{id}', [UsersController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/delete/{id}', [UsersController::class, 'delete'])->name('admin.users.delete');

Auth::routes();
