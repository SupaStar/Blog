<?php

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


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', "PublicacionController@verPagina")->name('inicio.show');
Route::get('/NuevaP', function () {
    return view('Publicacion.nuevaPublicacion');
})->name('nPub.show');
Route::post('/enviarPublicacion', 'PublicacionController@nueva')->name('nPub.new');
Route::get('/verPublicacion/{id?}', 'PublicacionController@ver')->name('nPub.ver');
Route::post('/editarPublicacion/{id}', 'PublicacionController@editar')->name('Pub.edit');
Route::get('/verPerfil/{id}', 'PerfilController@ver')->name('Perfil.ver');
Route::get('/cargarPublic/{id?}', 'PerfilController@cargarPublicaciones')->name('perfil.public');
Route::delete('/eliminarPub/{id?}', 'PublicacionController@eliminarPub')->name('Pub.del');
Route::get('/{locale}',function($locale){
    App::setLocale($locale);
    return redirect()->action('PublicacionController@verPagina');
})->name('change.locale');