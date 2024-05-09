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
    return view('auth.login');
})->name('login');

Route::get('/concentrado', function () {    
    return view('read');
})->name('read')->middleware('auth');

Route::get('/users', function () {
    return view('auth.register');
})->name('users')->middleware('auth');

Route::get('/GetExcel', function () {
    return view('getexcel');
})->name('excel')->middleware('auth');

/* rutas para obtener datos */
Route::get('/gettable', [PostController::class, 'table'])->middleware('auth');

Route::get('/ShowData', [PostController::class, 'ShowData'])->middleware('auth');

/* RUTAS PARA CREAR Y ACTULIZAR */
Route::post('/CreateData', [PostController::class, 'CreateData'])->middleware('auth');

Route::post('/UpdateData', [PostController::class, 'UpdateData'])->name('UpdateData')->middleware('auth');

// Route::get('/cerrar_censo', [PostController::class, '']);

/* guarda los datos una vez qeu se restablece la conexiona internet */
Route::get('/AddData', [PostController::class, 'AddData'])->middleware('auth');

/* RUTAS A LAS QUE SOLO PUEDE ENTRAR EL ADMIN */
/* EUTAS PARA GENERAR EL EXCEL */
Route::get('/Excel-Concentrado', [PostController::class, 'ExcelConcentrado'])->name('Concentrado')->middleware('auth');

Route::post('/Session', [UsersController::class, 'Login'])->name('Session');

Route::post('/logout', [UsersController::class, 'SessionDestroy'])->name('logout')->middleware('auth');

/* obtiene los datos para la tabla usuarios */
Route::get('/getusers', [UsersController::class, 'gettable'])->middleware('auth');

Route::get('/ShowUsers', [UsersController::class, 'getUsers'])->middleware('auth');

Route::post('/create_users', [UsersController::class, 'CreateOrUpdate'])->name('create_users')->middleware('auth');

// Route::post('/delete_users', [PostController::class, 'delete'])->name('delete_users')->middleware('auth');




// Route::get('/lista_censos', function () {
//     return view('read');
// })->name('read');



