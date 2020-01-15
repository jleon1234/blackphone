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


Route::resource('/ventas', 'VentasController');
Route::resource('/clientes', 'ClientsController');
Route::resource('/recibos', 'Reparacion');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/exportarPDF/{id}', 'Reparacion@exportarPDF');