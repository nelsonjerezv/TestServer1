<?php
if (App::environment('production')) {
    URL::forceScheme('https');
}
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
Route::group(['middleware' => ['cors']], function () {
    Route::get('/', function () {
        return redirect('/formularios');
    });


    Route::get('/formularios', 'OrdenTrabajoTerrenoController@index');
    Route::get('/formularios/todas-las-ordenes', 'OrdenTrabajoTerrenoController@todasLasOrdenes');
    Route::get('/formularios/editar-formulario', 'OrdenTrabajoTerrenoController@editarFormulario');
    Route::post('/formularios/guardar-formulario', 'OrdenTrabajoTerrenoController@guardarFormulario');
    Route::post('/formularios/guardar-ensayo-compresion', 'OrdenTrabajoTerrenoController@guardarFormulario');
    Route::post('/formularios/eliminar-formulario', 'OrdenTrabajoTerrenoController@eliminarFormulario');
    Route::resource('formularios', 'OrdenTrabajoTerrenoController');


    Route::get('/ensayos', 'EnsayosHormigonController@index');
    Route::get('/ensayos/todos-los-ensayos', 'EnsayosHormigonController@todosLosEnsayos');
    Route::get('/ensayos/editar-ensayo', 'EnsayosHormigonController@editarEnsayo');
    Route::post('/ensayos/guardar-ensayo-compresion', 'EnsayosHormigonController@guardarEnsayo');
    Route::post('/ensayos/eliminar-ensayo', 'EnsayosHormigonController@eliminarEnsayo');
    Route::resource('ensayos', 'EnsayosHormigonController');



    Route::get('/informeHormigon', 'EnsayosHormigonController@index');

    Route::get('/imprimir-informe-hormigon/{indice}', function ($indice) {
        // $pdf = PDF::loadView('informe_hormigon');
        // return $pdf->download('informe_hormigon.pdf');

        $pdf = PDF::loadView('informe_hormigon', ['indice' => $indice]);
        return $pdf->stream();
    });

    Route::get('/imprimir-informe-hormigon', function () {
        // $pdf = PDF::loadView('informe_hormigon');
        // return $pdf->download('informe_hormigon.pdf');

        $pdf = PDF::loadView('informe_hormigon');
        return $pdf->download('informe_hormigon.pdf');
    });

});