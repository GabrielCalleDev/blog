<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/posts/{category}', [HomeController::class, 'postsByCategory'])->name('posts.category');
Route::get('/post/{postId}', [HomeController::class, 'post'])->name('post');

Route::get('/admin', function(){
    return view('admin');
})->middleware('auth');

/*-------------------------------------------------------------------------
| Categorías
|--------------------------------------------------------------------------
*/
Route::get('/admin/categories', [CategoriesController::Class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/new', [CategoriesController::Class, 'new'])->name('admin.categories.new');
Route::post('/admin/categories/store', [CategoriesController::Class, 'store'])->name('admin.categories.store');
Route::get('/admin/categories/edit/{id}', [CategoriesController::Class, 'edit'])->name('admin.categories.edit');
Route::post('/admin/categories/update/{id}', [CategoriesController::Class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/delete/{id}', [CategoriesController::Class, 'delete'])->name('admin.categories.delete');

/*-------------------------------------------------------------------------
| Posts
|--------------------------------------------------------------------------
*/
Route::get('/admin/posts', [PostsController::Class, 'index'])->name('admin.posts.index');
Route::get('/admin/posts/new', [PostsController::Class, 'new'])->name('admin.posts.new');
Route::post('/admin/posts/store', [PostsController::Class, 'store'])->name('admin.posts.store');
Route::get('/admin/posts/edit/{id}', [PostsController::Class, 'edit'])->name('admin.posts.edit');
Route::post('/admin/posts/update/{id}', [PostsController::Class, 'update'])->name('admin.posts.update');
Route::delete('/admin/posts/delete/{id}', [PostsController::Class, 'delete'])->name('admin.posts.delete');

/*-------------------------------------------------------------------------
| Usuarios
|--------------------------------------------------------------------------
*/
Route::get('/admin/users', [UsersController::Class, 'index'])->name('admin.users.index');


Auth::routes();
