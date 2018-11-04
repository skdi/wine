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

Route::get('prueba/{name}','pruebaControler@prueba');



Route::resource('admin/voluntarios','VoluntarioControler');
Route::resource('admin/servicios','ServicioController');

Route::resource('admin','AdministradorControler');