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

// Pagina raiz redirige a pagina de inicio de publicaciones
Route::get('/', [App\Http\Controllers\PublicationController::class, 'index'])->name('home');

// Recurso para acciones de publicaciones
Route::resource('publications', PublicationController::class);

// Recurso para acciones de comentarios
Route::resource('comments', CommentController::class);

// Recurso para acciones de comentarios anidados
Route::resource('nested_comments', NestedCommentController::class);

//Route::get('/home', 'HomeController@index')->name('home');
