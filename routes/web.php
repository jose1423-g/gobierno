<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Lamparas;
use App\Models\Medidas;

// Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/', function () {    
    return view('welcome');
})->name('welcome');

Route::get('/getmedidas', [PostController::class, 'GetMedidas'])->name('getmedidas');

Route::get('/getlamparas', [PostController::class, 'GetLamparas'])->name('getlamparas');

/* ruta para crear un nuevo registro */
Route::post('/CreateData', [PostController::class, 'CreateData'])->name('CreateData');

Route::get('/lista_censos', function () {
    return view('read');
})->name('read');



