<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnsayoProbetasHormigon;
use App\Models\OrdenTrabajoTerreno;
use App\Exports\EnsayosHormigonExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\QueryException;
use PDF;

class EnsayosHormigonController extends Controller
{
    public function index($indice = false){
        if ($indice == false) {
            $ensayos = $this->todosLosEnsayos();
            $datos = [
                'ensayos' => $ensayos
            ];
            return view('informe_hormigon', compact('datos'));
        }
        $ensayo = EnsayoProbetasHormigon::where('id', $indice)->first();
        $datos = [
            'ensayo' => $ensayo
        ];
        return view('informe_hormigon', compact('ensayo'));
    }

    public function todosLosEnsayos($modo = false){
        if($modo){
            $busqueda = ($modo == "porvalidar") ? false : true;
            $result = EnsayoProbetasHormigon::where('validado', $busqueda)->with('ott')->get();
            return $result;
        }
        return EnsayoProbetasHormigon::get();
    }

    public function eliminarEnsayo(Request $request){
        return EnsayoProbetasHormigon::destroy($request->id);
    }

    public function guardarEnsayo(Request $request){
        $ensayo;
        // $ensayo[''] = mb_strtoupper($request->ensayo['']);


        $ensayo['num_ingreso'] = mb_strtoupper($request->ensayo['numIngreso']);
        $ensayo['ott'] = mb_strtoupper($request->ensayo['OTT']);
        $ensayo['validado'] = false;
        $ensayo['num_informe'] = mb_strtoupper($request->ensayo['numInforme']);
        $ensayo['camara_humeda'] = mb_strtoupper($request->ensayo['camaraHumeda']);
        $ensayo['piscina'] = mb_strtoupper($request->ensayo['piscina']);
        $ensayo['balanza'] = mb_strtoupper($request->ensayo['balanza']);
        $ensayo['num_pie_de_metro'] = mb_strtoupper($request->ensayo['numPieDeMetro']);
        $ensayo['num_prensa'] = mb_strtoupper($request->ensayo['numPrensa']);
        $ensayo['num_cronometro'] = mb_strtoupper($request->ensayo['numCronometro']);
        $ensayo['error_trescientos_mm'] = mb_strtoupper($request->ensayo['errorTrescientosMm']);
        $ensayo['num_marmita'] = mb_strtoupper($request->ensayo['numMarmita']);
        $ensayo['num_dispositivo_refrentado'] = mb_strtoupper($request->ensayo['numDispositivoRefrentado']);
        $ensayo['num_micrometro'] = mb_strtoupper($request->ensayo['numMicrometro']);
        $ensayo['num_molde_muestra_uno'] = mb_strtoupper($request->ensayo['numMoldeMuestraUno']);
        $ensayo['num_molde_muestra_dos'] = mb_strtoupper($request->ensayo['numMoldeMuestraDos']);
        $ensayo['num_molde_muestra_tres'] = mb_strtoupper($request->ensayo['numMoldeMuestraTres']);
        $ensayo['num_molde_muestra_cuatro'] = mb_strtoupper($request->ensayo['numMoldeMuestraCuatro']);
        $ensayo['fecha_confeccion_muestra_uno'] = mb_strtoupper($request->ensayo['fechaConfeccionMuestraUno']);
        $ensayo['fecha_confeccion_muestra_dos'] = mb_strtoupper($request->ensayo['fechaConfeccionMuestraDos']);
        $ensayo['fecha_confeccion_muestra_tres'] = mb_strtoupper($request->ensayo['fechaConfeccionMuestraTres']);
        $ensayo['fecha_confeccion_muestra_cuatro'] = mb_strtoupper($request->ensayo['fechaConfeccionMuestraCuatro']);
        $ensayo['fecha_ensayo_muestra_uno'] = mb_strtoupper($request->ensayo['fechaEnsayoMuestraUno']);
        $ensayo['fecha_ensayo_muestra_dos'] = mb_strtoupper($request->ensayo['fechaEnsayoMuestraDos']);
        $ensayo['fecha_ensayo_muestra_tres'] = mb_strtoupper($request->ensayo['fechaEnsayoMuestraTres']);
        $ensayo['fecha_ensayo_muestra_cuatro'] = mb_strtoupper($request->ensayo['fechaEnsayoMuestraCuatro']);
        $ensayo['edad_dias_muestra_uno'] = mb_strtoupper($request->ensayo['edadDiasMuestraUno']);
        $ensayo['edad_dias_muestra_dos'] = mb_strtoupper($request->ensayo['edadDiasMuestraDos']);
        $ensayo['edad_dias_muestra_tres'] = mb_strtoupper($request->ensayo['edadDiasMuestraTres']);
        $ensayo['edad_dias_muestra_cuatro'] = mb_strtoupper($request->ensayo['edadDiasMuestraCuatro']);
        $ensayo['refrentado_muestra_uno'] = mb_strtoupper($request->ensayo['refrentadoMuestraUno']);
        $ensayo['refrentado_muestra_dos'] = mb_strtoupper($request->ensayo['refrentadoMuestraDos']);
        $ensayo['refrentado_muestra_tres'] = mb_strtoupper($request->ensayo['refrentadoMuestraTres']);
        $ensayo['refrentado_muestra_cuatro'] = mb_strtoupper($request->ensayo['refrentadoMuestraCuatro']);
        $ensayo['refrentado_corregido_muestra_uno'] = mb_strtoupper($request->ensayo['refrentadoCorregidoMuestraUno']);
        $ensayo['refrentado_corregido_muestra_dos'] = mb_strtoupper($request->ensayo['refrentadoCorregidoMuestraDos']);
        $ensayo['refrentado_corregido_muestra_tres'] = mb_strtoupper($request->ensayo['refrentadoCorregidoMuestraTres']);
        $ensayo['refrentado_corregido_muestra_cuatro'] = mb_strtoupper($request->ensayo['refrentadoCorregidoMuestraCuatro']);
        $ensayo['perpendicularidad_muestra_uno'] = mb_strtoupper($request->ensayo['perpendicularidadMuestraUno']);
        $ensayo['perpendicularidad_muestra_dos'] = mb_strtoupper($request->ensayo['perpendicularidadMuestraDos']);
        $ensayo['perpendicularidad_muestra_tres'] = mb_strtoupper($request->ensayo['perpendicularidadMuestraTres']);
        $ensayo['perpendicularidad_muestra_cuatro'] = mb_strtoupper($request->ensayo['perpendicularidadMuestraCuatro']);
        $ensayo['planeidad_muestra_uno'] = mb_strtoupper($request->ensayo['planeidadMuestraUno']);
        $ensayo['planeidad_muestra_dos'] = mb_strtoupper($request->ensayo['planeidadMuestraDos']);
        $ensayo['planeidad_muestra_tres'] = mb_strtoupper($request->ensayo['planeidadMuestraTres']);
        $ensayo['planeidad_muestra_cuatro'] = mb_strtoupper($request->ensayo['planeidadMuestraCuatro']);
        $ensayo['espesor_superior_muestra_uno'] = mb_strtoupper($request->ensayo['espesorSuperiorMuestraUno']);
        $ensayo['espesor_superior_muestra_dos'] = mb_strtoupper($request->ensayo['espesorSuperiorMuestraDos']);
        $ensayo['espesor_superior_muestra_tres'] = mb_strtoupper($request->ensayo['espesorSuperiorMuestraTres']);
        $ensayo['espesor_superior_muestra_cuatro'] = mb_strtoupper($request->ensayo['espesorSuperiorMuestraCuatro']);
        $ensayo['espesor_inferior_muestra_uno'] = mb_strtoupper($request->ensayo['espesorInferiorMuestraUno']);
        $ensayo['espesor_inferior_muestra_dos'] = mb_strtoupper($request->ensayo['espesorInferiorMuestraDos']);
        $ensayo['espesor_inferior_muestra_tres'] = mb_strtoupper($request->ensayo['espesorInferiorMuestraTres']);
        $ensayo['espesor_inferior_muestra_cuatro'] = mb_strtoupper($request->ensayo['espesorInferiorMuestraCuatro']);
        $ensayo['espesor_promedio_muestra_uno'] = mb_strtoupper($request->ensayo['espesorPromedioMuestraUno']);
        $ensayo['espesor_promedio_muestra_dos'] = mb_strtoupper($request->ensayo['espesorPromedioMuestraDos']);
        $ensayo['espesor_promedio_muestra_tres'] = mb_strtoupper($request->ensayo['espesorPromedioMuestraTres']);
        $ensayo['espesor_promedio_muestra_cuatro'] = mb_strtoupper($request->ensayo['espesorPromedioMuestraCuatro']);
        $ensayo['d_uno_muestra_uno'] = mb_strtoupper($request->ensayo['dUnoMuestraUno']);
        $ensayo['d_uno_muestra_dos'] = mb_strtoupper($request->ensayo['dUnoMuestraDos']);
        $ensayo['d_uno_muestra_tres'] = mb_strtoupper($request->ensayo['dUnoMuestraTres']);
        $ensayo['d_uno_muestra_cuatro'] = mb_strtoupper($request->ensayo['dUnoMuestraCuatro']);
        $ensayo['d_dos_muestra_uno'] = mb_strtoupper($request->ensayo['dDosMuestraUno']);
        $ensayo['d_dos_muestra_dos'] = mb_strtoupper($request->ensayo['dDosMuestraDos']);
        $ensayo['d_dos_muestra_tres'] = mb_strtoupper($request->ensayo['dDosMuestraTres']);
        $ensayo['d_dos_muestra_cuatro'] = mb_strtoupper($request->ensayo['dDosMuestraCuatro']);
        $ensayo['h_uno_muestra_uno'] = mb_strtoupper($request->ensayo['hUnoMuestraUno']);
        $ensayo['h_uno_muestra_dos'] = mb_strtoupper($request->ensayo['hUnoMuestraDos']);
        $ensayo['h_uno_muestra_tres'] = mb_strtoupper($request->ensayo['hUnoMuestraTres']);
        $ensayo['h_uno_muestra_cuatro'] = mb_strtoupper($request->ensayo['hUnoMuestraCuatro']);
        $ensayo['h_dos_muestra_uno'] = mb_strtoupper($request->ensayo['hDosMuestraUno']);
        $ensayo['h_dos_muestra_dos'] = mb_strtoupper($request->ensayo['hDosMuestraDos']);
        $ensayo['h_dos_muestra_tres'] = mb_strtoupper($request->ensayo['hDosMuestraTres']);
        $ensayo['h_dos_muestra_cuatro'] = mb_strtoupper($request->ensayo['hDosMuestraCuatro']);
        $ensayo['d_uno_muestra_uno_corregida'] = mb_strtoupper($request->ensayo['dUnoMuestraUnoCorregida']);
        $ensayo['d_uno_muestra_dos_corregida'] = mb_strtoupper($request->ensayo['dUnoMuestraDosCorregida']);
        $ensayo['d_uno_muestra_tres_corregida'] = mb_strtoupper($request->ensayo['dUnoMuestraTresCorregida']);
        $ensayo['d_uno_muestra_cuatro_corregida'] = mb_strtoupper($request->ensayo['dUnoMuestraCuatroCorregida']);
        $ensayo['d_dos_muestra_uno_corregida'] = mb_strtoupper($request->ensayo['dDosMuestraUnoCorregida']);
        $ensayo['d_dos_muestra_dos_corregida'] = mb_strtoupper($request->ensayo['dDosMuestraDosCorregida']);
        $ensayo['d_dos_muestra_tres_corregida'] = mb_strtoupper($request->ensayo['dDosMuestraTresCorregida']);
        $ensayo['d_dos_muestra_cuatro_corregida'] = mb_strtoupper($request->ensayo['dDosMuestraCuatroCorregida']);
        $ensayo['h_uno_muestra_uno_corregida'] = mb_strtoupper($request->ensayo['hUnoMuestraUnoCorregida']);
        $ensayo['h_uno_muestra_dos_corregida'] = mb_strtoupper($request->ensayo['hUnoMuestraDosCorregida']);
        $ensayo['h_uno_muestra_tres_corregida'] = mb_strtoupper($request->ensayo['hUnoMuestraTresCorregida']);
        $ensayo['h_uno_muestra_cuatro_corregida'] = mb_strtoupper($request->ensayo['hUnoMuestraCuatroCorregida']);
        $ensayo['h_dos_muestra_uno_corregida'] = mb_strtoupper($request->ensayo['hDosMuestraUnoCorregida']);
        $ensayo['h_dos_muestra_dos_corregida'] = mb_strtoupper($request->ensayo['hDosMuestraDosCorregida']);
        $ensayo['h_dos_muestra_tres_corregida'] = mb_strtoupper($request->ensayo['hDosMuestraTresCorregida']);
        $ensayo['h_dos_muestra_cuatro_corregida'] = mb_strtoupper($request->ensayo['hDosMuestraCuatroCorregida']);
        $ensayo['masa_muestra_uno'] = mb_strtoupper($request->ensayo['masaMuestraUno']);
        $ensayo['masa_muestra_dos'] = mb_strtoupper($request->ensayo['masaMuestraDos']);
        $ensayo['masa_muestra_tres'] = mb_strtoupper($request->ensayo['masaMuestraTres']);
        $ensayo['masa_muestra_cuatro'] = mb_strtoupper($request->ensayo['masaMuestraCuatro']);
        $ensayo['error_muestra_uno'] = mb_strtoupper($request->ensayo['errorMuestraUno']);
        $ensayo['error_muestra_dos'] = mb_strtoupper($request->ensayo['errorMuestraDos']);
        $ensayo['error_muestra_tres'] = mb_strtoupper($request->ensayo['errorMuestraTres']);
        $ensayo['error_muestra_cuatro'] = mb_strtoupper($request->ensayo['errorMuestraCuatro']);
        $ensayo['masa_corregida_muestra_uno'] = mb_strtoupper($request->ensayo['masaCorregidaMuestraUno']);
        $ensayo['masa_corregida_muestra_dos'] = mb_strtoupper($request->ensayo['masaCorregidaMuestraDos']);
        $ensayo['masa_corregida_muestra_tres'] = mb_strtoupper($request->ensayo['masaCorregidaMuestraTres']);
        $ensayo['masa_corregida_muestra_cuatro'] = mb_strtoupper($request->ensayo['masaCorregidaMuestraCuatro']);
        $ensayo['volumen_muestra_uno'] = mb_strtoupper($request->ensayo['volumenMuestraUno']);
        $ensayo['volumen_muestra_dos'] = mb_strtoupper($request->ensayo['volumenMuestraDos']);
        $ensayo['volumen_muestra_tres'] = mb_strtoupper($request->ensayo['volumenMuestraTres']);
        $ensayo['volumen_muestra_cuatro'] = mb_strtoupper($request->ensayo['volumenMuestraCuatro']);
        $ensayo['volumen_metro_cubico_muestra_uno'] = mb_strtoupper($request->ensayo['volumenMetroCubicoMuestraUno']);
        $ensayo['volumen_metro_cubico_muestra_dos'] = mb_strtoupper($request->ensayo['volumenMetroCubicoMuestraDos']);
        $ensayo['volumen_metro_cubico_muestra_tres'] = mb_strtoupper($request->ensayo['volumenMetroCubicoMuestraTres']);
        $ensayo['volumen_metro_cubico_muestra_cuatro'] = mb_strtoupper($request->ensayo['volumenMetroCubicoMuestraCuatro']);
        $ensayo['densidad_muestra_uno'] = mb_strtoupper($request->ensayo['densidadMuestraUno']);
        $ensayo['densidad_muestra_dos'] = mb_strtoupper($request->ensayo['densidadMuestraDos']);
        $ensayo['densidad_muestra_tres'] = mb_strtoupper($request->ensayo['densidadMuestraTres']);
        $ensayo['densidad_muestra_cuatro'] = mb_strtoupper($request->ensayo['densidadMuestraCuatro']);
        $ensayo['area_muestra_uno'] = mb_strtoupper($request->ensayo['areaMuestraUno']);
        $ensayo['area_muestra_dos'] = mb_strtoupper($request->ensayo['areaMuestraDos']);
        $ensayo['area_muestra_tres'] = mb_strtoupper($request->ensayo['areaMuestraTres']);
        $ensayo['area_muestra_cuatro'] = mb_strtoupper($request->ensayo['areaMuestraCuatro']);
        $ensayo['carga_ensayo_muestra_uno'] = mb_strtoupper($request->ensayo['cargaEnsayoMuestraUno']);
        $ensayo['carga_ensayo_muestra_dos'] = mb_strtoupper($request->ensayo['cargaEnsayoMuestraDos']);
        $ensayo['carga_ensayo_muestra_tres'] = mb_strtoupper($request->ensayo['cargaEnsayoMuestraTres']);
        $ensayo['carga_ensayo_muestra_cuatro'] = mb_strtoupper($request->ensayo['cargaEnsayoMuestraCuatro']);
        $ensayo['carga_ensayo_mil_muestra_uno'] = mb_strtoupper($request->ensayo['cargaEnsayoMilMuestraUno']);
        $ensayo['carga_ensayo_mil_muestra_dos'] = mb_strtoupper($request->ensayo['cargaEnsayoMilMuestraDos']);
        $ensayo['carga_ensayo_mil_muestra_tres'] = mb_strtoupper($request->ensayo['cargaEnsayoMilMuestraTres']);
        $ensayo['carga_ensayo_mil_muestra_cuatro'] = mb_strtoupper($request->ensayo['cargaEnsayoMilMuestraCuatro']);
        $ensayo['tiempo_carga_muestra_uno'] = mb_strtoupper($request->ensayo['tiempoCargaMuestraUno']);
        $ensayo['tiempo_carga_muestra_dos'] = mb_strtoupper($request->ensayo['tiempoCargaMuestraDos']);
        $ensayo['tiempo_carga_muestra_tres'] = mb_strtoupper($request->ensayo['tiempoCargaMuestraTres']);
        $ensayo['tiempo_carga_muestra_cuatro'] = mb_strtoupper($request->ensayo['tiempoCargaMuestraCuatro']);
        $ensayo['resistencia_compresion_muestra_uno'] = mb_strtoupper($request->ensayo['resistenciaCompresionMuestraUno']);
        $ensayo['resistencia_compresion_muestra_dos'] = mb_strtoupper($request->ensayo['resistenciaCompresionMuestraDos']);
        $ensayo['resistencia_compresion_muestra_tres'] = mb_strtoupper($request->ensayo['resistenciaCompresionMuestraTres']);
        $ensayo['resistencia_compresion_muestra_cuatro'] = mb_strtoupper($request->ensayo['resistenciaCompresionMuestraCuatro']);
        $ensayo['factores_conversion_muestra_uno'] = mb_strtoupper($request->ensayo['factoresConversionMuestraUno']);
        $ensayo['factores_conversion_muestra_dos'] = mb_strtoupper($request->ensayo['factoresConversionMuestraDos']);
        $ensayo['factores_conversion_muestra_tres'] = mb_strtoupper($request->ensayo['factoresConversionMuestraTres']);
        $ensayo['factores_conversion_muestra_cuatro'] = mb_strtoupper($request->ensayo['factoresConversionMuestraCuatro']);
        $ensayo['resistencia_corregida_muestra_uno'] = mb_strtoupper($request->ensayo['resistenciaCorregidaMuestraUno']);
        $ensayo['resistencia_corregida_muestra_dos'] = mb_strtoupper($request->ensayo['resistenciaCorregidaMuestraDos']);
        $ensayo['resistencia_corregida_muestra_tres'] = mb_strtoupper($request->ensayo['resistenciaCorregidaMuestraTres']);
        $ensayo['resistencia_corregida_muestra_cuatro'] = mb_strtoupper($request->ensayo['resistenciaCorregidaMuestraCuatro']);
        $ensayo['velocidad_ensayo_muestra_uno'] = mb_strtoupper($request->ensayo['velocidadEnsayoMuestraUno']);
        $ensayo['velocidad_ensayo_muestra_dos'] = mb_strtoupper($request->ensayo['velocidadEnsayoMuestraDos']);
        $ensayo['velocidad_ensayo_muestra_tres'] = mb_strtoupper($request->ensayo['velocidadEnsayoMuestraTres']);
        $ensayo['velocidad_ensayo_muestra_cuatro'] = mb_strtoupper($request->ensayo['velocidadEnsayoMuestraCuatro']);
        $ensayo['tipo_rotura_muestra_uno'] = mb_strtoupper($request->ensayo['tipoRoturaMuestraUno']);
        $ensayo['tipo_rotura_muestra_dos'] = mb_strtoupper($request->ensayo['tipoRoturaMuestraDos']);
        $ensayo['tipo_rotura_muestra_tres'] = mb_strtoupper($request->ensayo['tipoRoturaMuestraTres']);
        $ensayo['tipo_rotura_muestra_cuatro'] = mb_strtoupper($request->ensayo['tipoRoturaMuestraCuatro']);
        $ensayo['aseguramiento_muestra_uno'] = mb_strtoupper($request->ensayo['aseguramientoMuestraUno']);
        $ensayo['aseguramiento_muestra_dos'] = mb_strtoupper($request->ensayo['aseguramientoMuestraDos']);
        $ensayo['aseguramiento_muestra_tres'] = mb_strtoupper($request->ensayo['aseguramientoMuestraTres']);
        $ensayo['aseguramiento_muestra_cuatro'] = mb_strtoupper($request->ensayo['aseguramientoMuestraCuatro']);
        $ensayo['cumple_muestra_uno'] = mb_strtoupper($request->ensayo['cumpleMuestraUno']);
        $ensayo['cumple_muestra_dos'] = mb_strtoupper($request->ensayo['cumpleMuestraDos']);
        $ensayo['cumple_muestra_tres'] = mb_strtoupper($request->ensayo['cumpleMuestraTres']);
        $ensayo['cumple_muestra_cuatro'] = mb_strtoupper($request->ensayo['cumpleMuestraCuatro']);
        $ensayo['velocidad_muestra_uno'] = mb_strtoupper($request->ensayo['velocidadMuestraUno']);
        $ensayo['velocidad_muestra_dos'] = mb_strtoupper($request->ensayo['velocidadMuestraDos']);
        $ensayo['velocidad_muestra_tres'] = mb_strtoupper($request->ensayo['velocidadMuestraTres']);
        $ensayo['velocidad_muestra_cuatro'] = mb_strtoupper($request->ensayo['velocidadMuestraCuatro']);
        $ensayo['observaciones'] = mb_strtoupper($request->ensayo['observaciones']);
        $ensayo['ensayado_por'] = mb_strtoupper($request->ensayo['ensayadoPor']);
        $ensayo['fecha'] = mb_strtoupper($request->ensayo['fecha']);
        $ensayo['vb'] = mb_strtoupper($request->ensayo['vb']);

        $result;
        try {
            $result = EnsayoProbetasHormigon::create($ensayo);
        } catch (QueryException $e) {
            return [$e, false];
        }
        return [$result, true];
    }

    public function exportarEnsayoPdf($id, $direccionSolicitante, $localizacionObra, $numProyecto, $numCorrelativoInformeObra, $numCorrelativoObra, $curadoInicial, $lugarEnsayos, $fechaMuestreoManual){
        $ensayo = EnsayoProbetasHormigon::where('id', $id)->first();
        $orden = OrdenTrabajoTerreno::where('num_ott', $ensayo['ott'])->first();
        $datos = (object) [
            'direccionSolicitante' => $direccionSolicitante,
            'localizacionObra' => $localizacionObra,
            'numProyecto' => $numProyecto,
            'numCorrelativoInformeObra' => $numCorrelativoInformeObra,
            'numCorrelativoObra' => $numCorrelativoObra,
            'curadoInicial' => $curadoInicial,
            'lugarEnsayos' => $lugarEnsayos,
            'fechaMuestreoManual' => $fechaMuestreoManual,
            'ensayo' => $ensayo
        ];
        // dd($orden, $datos);
        $pdf = PDF::loadView('informe_hormigon',  compact('datos', 'orden') )->setOption('dpi', 600);
        $pdf->setOption('no-background', true);

        return $pdf->stream();
    }

    public function exportarEnsayoExcel($id, $direccionSolicitante, $localizacionObra, $numProyecto, $numCorrelativoInformeObra, $numCorrelativoObra, $curadoInicial, $lugarEnsayos, $fechaMuestreoManual = false){
        $ensayo = EnsayoProbetasHormigon::where('id', $id)->first();
        $orden = OrdenTrabajoTerreno::where('num_ott', $ensayo['ott'])->first();
        $datos = (object) [
            'direccionSolicitante' => $direccionSolicitante,
            'localizacionObra' => $localizacionObra,
            'numProyecto' => $numProyecto,
            'numCorrelativoInformeObra' => $numCorrelativoInformeObra,
            'numCorrelativoObra' => $numCorrelativoObra,
            'curadoInicial' => $curadoInicial,
            'lugarEnsayos' => $lugarEnsayos,
            'fechaMuestreoManual' => !$fechaMuestreoManual ? '-' : $fechaMuestreoManual,
            'ensayo' => $ensayo
        ];

        // return 1;
        return Excel::download(new EnsayosHormigonExport($datos, $orden), 'test.xlsx');

        // return Excel::create('New file', function($excel) {
        //     $excel->sheet('New sheet', function($sheet) {
        //         $sheet->loadView('informe_hormigon',  compact('datos', 'orden') );
        //     });
        // });
    }

    public function verEnsayoPdf($id, $direccionSolicitante, $localizacionObra, $numProyecto, $numCorrelativoInformeObra, $numCorrelativoObra, $curadoInicial, $lugarEnsayos, $fechaMuestreoManual = false){
        $ensayo = EnsayoProbetasHormigon::where('id', $id)->first();
        $orden = OrdenTrabajoTerreno::where('num_ott', $ensayo['ott'])->first();
        $datos = (object) [
            'direccionSolicitante' => $direccionSolicitante,
            'localizacionObra' => $localizacionObra,
            'numProyecto' => $numProyecto,
            'numCorrelativoInformeObra' => $numCorrelativoInformeObra,
            'numCorrelativoObra' => $numCorrelativoObra,
            'curadoInicial' => $curadoInicial,
            'lugarEnsayos' => $lugarEnsayos,
            'fechaMuestreoManual' => !$fechaMuestreoManual ? '-' : $fechaMuestreoManual,
            'ensayo' => $ensayo
        ];
        // dd($orden, $datos);

        return view('informe_hormigon', compact('datos', 'orden'));
    }

    public function buscarOtt($busqueda){
        $ordenes = OrdenTrabajoTerreno::where('num_ott' , 'like', '%' . $busqueda . '%')->get();

        // $ordenes = OrdenTrabajoTerreno::where('num_cliente_obra' , 'like', '%' . $busqueda . '%')
        //                                 ->orWhere('laboratorista' , 'like', '%' . $busqueda . '%')
        //                                 ->orWhere('id' , $busqueda)
        //                                 ->get();

        return $ordenes;
    }


    public function validarFormulario(Request $request){
        $orden = EnsayoProbetasHormigon::where('id', $request->id)->first();
        // dd($orden);
        $orden->validado = true;
        try {
            $orden->save();
        } catch (QueryException $e) {
            return [$e, false];
        }
        return [$orden, true];
    }

    public function rechazarFormulario(Request $request){
        $orden = EnsayoProbetasHormigon::where('id', $request->id)->first();

        $orden->validado = false;
        try {
            $orden->save();
        } catch (QueryException $e) {
            return [$e, false];
        }
        return [$orden, true];
    }

}