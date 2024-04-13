<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Lamparas;
use App\Models\Medidas;

// Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/', function () {    
    return view('welcome');
})->name('welcome');

Route::get('/concentrado', function () {    
    return view('read');
})->name('read');

Route::get('/gettable', [PostController::class, 'table']);

Route::get('/ShowData', [PostController::class, 'ShowData']);

/* RUTAS PARA CREAR Y ACTULIZAR */
Route::post('/CreateData', [PostController::class, 'CreateData']);

Route::post('/UpdateData', [PostController::class, 'UpdateData'])->name('UpdateData');

Route::get('/cerrar_censo', [PostController::class, '']);

/* RUTAS A LAS QUE SOLO PUEDE ENTRAR EL ADMIN */
/* EUTAS PARA GENERAR EL EXCEL */
Route::get('/Excel-Concentrado', [PostController::class, 'ExcelConcentrado'])->name('Concentrado');

Route::get('/users', [PostController::class, 'getUsers'])->name('users');

Route::post('/create_users', [PostController::class, 'CreateOrUpdate'])->name('create_users');

Route::post('/delete_users', [PostController::class, 'delete'])->name('delete_users');




// Route::get('/lista_censos', function () {
//     return view('read');
// })->name('read');



