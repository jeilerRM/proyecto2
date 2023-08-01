<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',function (){
        return view('auth.login');
    });

Route::get('/empleados', function () {
    return view('empleados.index');
});

//Route::get('empleados/create','App\Http\Controllers\EmpleadoController@create');

Route::resource('empleados', EmpleadoController::class)->middleware('auth');

Route::resource('empleados','App\Http\Controllers\EmpleadoController');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//cuando el usuario se loguee busca controlador y busca la clase index para ejecutarla
Route::group(['middleware'=>'auth'],function(){
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
