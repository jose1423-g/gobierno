<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


/* ruta para crear un nuevo registro */
Route::post('/createdata', [post::class, 'create'])->name('create');

Route::get('/lista_censos', function () {
    return view('read');
})->name('read');

// Route::get('/create', [post::class, 'create'])->name('create');

