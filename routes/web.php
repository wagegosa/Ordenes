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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('marcas', 'MarcasController');

Route::resource('categorias', 'CategoriasController');

Route::resource('productos', 'ProductosController');

Route::resource('ordenes', 'OrdenesController');

Route::resource('asignaciones', 'AsignacionesController');

// Importar archivo de Excel
Route::post('import-list-excel', 'OrdenesController@importExcel')->name('ordenes.import.excel');

// Route::post('import-list-excel', 'UserController@importExcel')->name('users.import.excel');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
