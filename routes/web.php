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
    return redirect('/formularios');
});


Route::get('/formularios', 'OrdenTrabajoTerrenoController@index');
Route::get('/formularios/todas-las-ordenes', 'OrdenTrabajoTerrenoController@todasLasOrdenes');
Route::post('/formularios/guardar-formulario', 'OrdenTrabajoTerrenoController@guardarFormulario');
Route::resource('formularios', 'OrdenTrabajoTerrenoController');