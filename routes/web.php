<?php

use App\Http\Controllers\PostController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PostController::class, 'index']);

Route::resource('/post', PostController::class);

Route::get('/view/{code}', [PostController::class, 'view'])->name('posts.view');
Route::get('/add', [PostController::class, 'add'])->name('posts.add');
Route::get('/edit/{code}', [PostController::class, 'edit'])->name('posts.edit');
Route::get('/login', [PostController::class, 'login'])->name('posts.login');
Route::get('/pdf', [PostController::class, 'generatePDF'])->name('posts.pdf');
