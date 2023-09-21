<?php

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
//aceder a models de Imagen de Eloquent 
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    //echo "Hello World";
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/configuracion', [App\Http\Controllers\UserController::class, 'config'])->name('config');//config va a ser el nombre que se le pne en las vistas

Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');//config va a ser el nombre que se le pne en las vistas

Route::get('user/avatar/{filename}', [App\Http\Controllers\UserController::class, 'getImage'])->name('user.avatar');//config va a ser el nombre que se le pne en las vistas