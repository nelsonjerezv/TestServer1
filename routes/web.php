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
    Route::get('/formularios/todas-las-ordenes/{modo}', 'OrdenTrabajoTerrenoController@todasLasOrdenes');
    Route::get('/formularios/editar-formulario', 'OrdenTrabajoTerrenoController@editarFormulario');
    Route::get('/formularios/ver-ott/{id}', 'OrdenTrabajoTerrenoController@verFormulario');
    Route::get('/formularios/editar-ott/{id}', 'OrdenTrabajoTerrenoController@editarFormulario');
    Route::post('/formularios/validar-ott', 'OrdenTrabajoTerrenoController@validarFormulario');
    Route::post('/formularios/rechazar-ott', 'OrdenTrabajoTerrenoController@rechazarFormulario');
    Route::post('/formularios/guardar-formulario', 'OrdenTrabajoTerrenoController@guardarFormulario');
    Route::post('/formularios/actualizar-formulario', 'OrdenTrabajoTerrenoController@actualizarFormulario');
    Route::post('/formularios/guardar-ensayo-compresion', 'OrdenTrabajoTerrenoController@guardarFormulario');
    Route::post('/formularios/eliminar-formulario', 'OrdenTrabajoTerrenoController@eliminarFormulario');
    Route::resource('formularios', 'OrdenTrabajoTerrenoController');


    Route::get('/ensayos', 'EnsayosHormigonController@index');
    Route::get('/ensayos/todos-los-ensayos/{modo}', 'EnsayosHormigonController@todosLosEnsayos');
    Route::get('/ensayos/editar-ensayo', 'EnsayosHormigonController@editarEnsayo');
    Route::post('/formularios/validar-ensayo', 'EnsayosHormigonController@validarFormulario');
    Route::post('/formularios/rechazar-ensayo', 'EnsayosHormigonController@rechazarFormulario');
    Route::get('/ensayos/exportar-ensayo-pdf/{id}/{direccionSolicitante}/{localizacionObra}/{numProyecto}/{numCorrelativoInformeObra}/{numCorrelativoObra}/{curadoInicial}/{lugarEnsayos}/{fechaMuestreoManual}', 'EnsayosHormigonController@exportarEnsayoPdf');
    Route::get('/ensayos/exportar-ensayo-excel/{id}/{direccionSolicitante}/{localizacionObra}/{numProyecto}/{numCorrelativoInformeObra}/{numCorrelativoObra}/{curadoInicial}/{lugarEnsayos}/{fechaMuestreoManual}', 'EnsayosHormigonController@exportarEnsayoExcel');
    Route::get('/ensayos/ver-ensayo-pdf/{id}/{direccionSolicitante}/{localizacionObra}/{numProyecto}/{numCorrelativoInformeObra}/{numCorrelativoObra}/{curadoInicial}/{lugarEnsayos}/{fechaMuestreoManual}', 'EnsayosHormigonController@verEnsayoPdf');
    Route::get('/ensayos/buscar-ott/{busqueda}', 'EnsayosHormigonController@buscarOtt');
    Route::post('/ensayos/guardar-ensayo-compresion', 'EnsayosHormigonController@guardarEnsayo');
    Route::post('/ensayos/eliminar-ensayo', 'EnsayosHormigonController@eliminarEnsayo');
    Route::resource('ensayos', 'EnsayosHormigonController', ['only'=> ['index','create','store']]);



    Route::get('/informeHormigon', 'EnsayosHormigonController@index');
    Route::get('/informeHormigon/{indice}', 'EnsayosHormigonController@index');

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
        $pdf->setOption('no-background', true);
        // return $pdf->download('informe_hormigon.pdf');
        return $pdf->inline('record.pdf');

    });
