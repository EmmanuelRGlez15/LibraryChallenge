<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
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

Route::redirect('/', '/books');

Route::get('/{catchall?}', function() {
    return view('app');
})->where('catchall', '^(?!api).*$')->name('home');

// Books
Route::get('/api/getBooks', [BookController::class, 'index'])->name('books.index');
Route::get('/api/getBooksByCategory/{category_id?}', [BookController::class, 'indexByCategory']);
Route::get('/api/getBooksByUser/{user_id?}', [BookController::class, 'indexByUser']);

Route::post('/api/books/store', [BookController::class, 'store'])->name('books.store');
Route::get('/api/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/api/books/{id}/update', [BookController::class, 'update'])->name('books.update');
Route::delete('/api/books/{id}/delete', [BookController::class, 'destroy'])->name('books.delete');
Route::post('/api/books/{id}/lend', [BookController::class, 'lend'])->name('books.lend');
Route::put('/api/books/{id}/return', [BookController::class, 'returnBook'])->name('books.return');
Route::get('/api/books/{id}/user', [BookController::class, 'user'])->name('books.user');

// Categories
Route::get('/api/getCategories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/api/categories/store', [CategoryController::class, 'store'])->name('categories.store');

// Users
Route::get('/api/users', [UserController::class, 'index'])->name('users.index');
Route::get('/api/getUsers', [UserController::class, 'getUsers'])->name('users.getUsers');
Route::post('/api/users/store', [UserController::class, 'store'])->name('users.store');