<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\UsersController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post', [App\Http\Controllers\HomeController::class, 'post'])->name('post');



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

/*-------------------------------------------------------------------------
| Usuarios
|--------------------------------------------------------------------------
*/
Route::get('/admin/users', [UsersController::Class, 'index'])->name('admin.users.index');


Auth::routes();
