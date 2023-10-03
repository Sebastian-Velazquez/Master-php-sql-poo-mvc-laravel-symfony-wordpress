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

Route::get('/configuracion', [App\Http\Controllers\UserController::class, 'config'])
    ->middleware('auth') //middllwares que no te deja entrar si no estas logueado
    ->name('config'); //config va a ser el nombre que se le pne en las vistas

Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update'); //config va a ser el nombre que se le pne en las vistas

Route::get('user/avatar/{filename}', [App\Http\Controllers\UserController::class, 'getImage'])->name('user.avatar');//config va a ser el nombre que se le pne en las vistas

Route::get('/subir-imagen', [App\Http\Controllers\ImageController::class , 'create'])
    ->middleware('auth') //middllwares que no te deja entrar si no estas logueado
    ->name('imageCreate'); //config va a ser el nombre que se le pne en las vistas

Route::post('/image/save', [App\Http\Controllers\ImageController::class, 'save'])->name('image.save'); //config va a ser el nombre que se le pne en las vistas

//Image publicado
Route::get('image/file/{filename}', [App\Http\Controllers\ImageController::class, 'getImage'])->name('image.file');//config va a ser el nombre que se le pne en las vistas

//ruta para ir a detalle de imagen
Route::get('imagen/{id}', [App\Http\Controllers\ImageController::class, 'detail'])->name('image.detail');//config va a ser el nombre que se le pne en las vistas

//Guardar comentarios
Route::post('/comment/save', [App\Http\Controllers\CommentController::class, 'save'])->name('comment.save'); //config va a ser el nombre que se le pne en las vistas

//Eliminar comentario
Route::get('comment/delete/{id}', [App\Http\Controllers\CommentController::class, 'delete'])->name('comment.delete');//config va a ser el nombre que se le pne en las vistas
