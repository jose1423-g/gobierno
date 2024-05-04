<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsersController;

// Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/', function () {    
    return view('welcome');
})->name('welcome');

Route::get('/offline', function () {    
    return view('vendor.laravelpwa.offline');
});

Route::get('/login', function () {    
    return view('login');
})->name('login');

Route::get('/concentrado', function () {    
    return view('read');
})->name('read');
// ->middleware('auth');

Route::get('/users', function () {    
    return view('register');
})->name('users');



/* rutas para obtener datos */
Route::get('/gettable', [PostController::class, 'table']);

Route::get('/ShowData', [PostController::class, 'ShowData']);

/* RUTAS PARA CREAR Y ACTULIZAR */
Route::post('/CreateData', [PostController::class, 'CreateData']);

Route::post('/UpdateData', [PostController::class, 'UpdateData'])->name('UpdateData');

// Route::get('/cerrar_censo', [PostController::class, '']);

/* guarda los datos una vez qeu se restablece la conexiona internet */
Route::get('/AddData', [PostController::class, 'AddData']);

/* RUTAS A LAS QUE SOLO PUEDE ENTRAR EL ADMIN */
/* EUTAS PARA GENERAR EL EXCEL */
Route::get('/Excel-Concentrado', [PostController::class, 'ExcelConcentrado'])->name('Concentrado');

/* obtiene los datos para la tabla usuarios */
Route::get('/getusers', [UsersController::class, 'gettable']);

Route::get('/ShowUsers', [UsersController::class, 'getUsers']);

Route::post('/create_users', [UsersController::class, 'CreateOrUpdate'])->name('create_users');

// Route::post('/update', [UsersController::class, 'CreateUser'])->name('update_users');

Route::post('/delete_users', [PostController::class, 'delete'])->name('delete_users');




// Route::get('/lista_censos', function () {
//     return view('read');
// })->name('read');



