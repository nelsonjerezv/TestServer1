<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\OrdenTrabajoTerreno;
use App\Models\EnsayoProbetasHormigon;
use Maatwebsite\Excel\Facades\Excel;

class OrdenTrabajoTerrenoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $ordenes = $this->todasLasOrdenes();
        $ensayos = $this->todosLosEnsayos();
        $datos = [
            'ordenes' => $ordenes,
            'ensayos' => $ensayos
        ];
        return view('formularios', compact('datos'));
    }

    public function todasLasOrdenes($modo = false){
        if($modo){
            $busqueda = $modo == "porvalidar" ? false : true;
            $result = OrdenTrabajoTerreno::where('validado', $busqueda)->get();
            return $result;
        }
        return OrdenTrabajoTerreno::get();
    }

    public function todosLosEnsayos(){
        return EnsayoProbetasHormigon::get();
    }

    public function eliminarFormulario(Request $request){
        return OrdenTrabajoTerreno::destroy($request->id);
    }

    public function guardarFormulario(Request $request){

        // $ultimoNumInforme = OrdenTrabajoTerreno::latest('created_at')->first();
        // $ultimoNumIngreso = intVal($ultimoNumInforme->num_ingreso);
        // $ultimoNumIngreso++;
        // $numLibre = true;
        // while($numLibre){
        //     $repetido = OrdenTrabajoTerreno::where('num_ingreso', $ultimoNumIngreso)->get();
        //     if ( count($repetido) == 0 ) {
        //         $numLibre = false;
        //     } else {
        //         $ultimoNumIngreso++;
        //     }
        // }
        $ordenExistente = OrdenTrabajoTerreno::where('num_ott', $request->formulario['numOtt'])->get();
        if(count($ordenExistente)){
            $retorno = ['num_ott_existe'];
            return [$retorno, false];
        }

        $numerosMuestra = explode(",", $request->formulario['numIngreso']);
        $numerosMuestraExistentes = [];

        OrdenTrabajoTerreno::chunk(100, function ($ordenes) use(&$numerosMuestra, &$numerosMuestraExistentes) {
            foreach ($ordenes as $orden) {
                $numeros = explode(",", $orden['num_ingreso']);
                foreach ($numeros as $numeroMuestraEnOtt) {
                    if( in_array($numeroMuestraEnOtt, $numerosMuestra) ){
                        array_push($numerosMuestraExistentes, $numeroMuestraEnOtt);
                    }
                }
            }
        });
        if(count($numerosMuestraExistentes)){
            $retorno = ['num_muestra_repetido', $numerosMuestraExistentes];
            return [$retorno, false];
        }

        $formulario;
        $formulario['num_ott'] = $request->formulario['numOtt'];
        $formulario['num_cliente_obra'] = $request->formulario['numClienteObra'];
        $formulario['num_ingreso'] = $request->formulario['numIngreso'];
        // $formulario['num_ingreso'] = $ultimoNumIngres;
        $formulario['validado'] = false;
        $formulario['nombre_cliente'] = $request->formulario['nombreCliente'];
        $formulario['nombre_obra'] = $request->formulario['nombreObra'];
        $formulario['fono_obra'] = $request->formulario['fonoObra'];
        $formulario['direccion_obra'] = $request->formulario['direccionObra'];
        $formulario['encargado_obra'] = $request->formulario['encargadoObra'];
        $formulario['muestreo_de'] = $request->formulario['muestreoDe'];
        $formulario['extraccion'] = $request->formulario['extraccion'];
        $formulario['compactacion'] = $request->formulario['compactacion'];
        $formulario['tipo_molde_uno'] = $request->formulario['tipoMoldeUno'];
        $formulario['tipo_molde_dos'] = $request->formulario['tipoMoldeDos'];
        $formulario['tipo_molde_tres'] = $request->formulario['tipoMoldeTres'];
        $formulario['tipo_molde_cuatro'] = $request->formulario['tipoMoldeCuatro'];
        $formulario['tipo_molde_cinco'] = $request->formulario['tipoMoldeCinco'];
        $formulario['tipo_molde_seis'] = $request->formulario['tipoMoldeSeis'];
        $formulario['tipo_molde_siete'] = $request->formulario['tipoMoldeSiete'];
        $formulario['muestreado_por'] = $request->formulario['muestreadoPor'];
        $formulario['ensayado_por'] = $request->formulario['ensayadoPor'];
        $formulario['tipo_muestra'] = $request->formulario['tipoMuestra'];
        $formulario['amasada_hormigon'] = $request->formulario['amasadaHormigon'];
        $formulario['asentamiento_cono'] = $request->formulario['asentamientoCono'];
        $formulario['num_informe'] = $request->formulario['numInforme'];
        $formulario['segregacion'] = $request->formulario['segregacion'];
        $formulario['num_equipo_cono_abrams'] = $request->formulario['numEquipoConoAbrams'];
        $formulario['num_vibrador_inmersion'] = $request->formulario['numVibradorInmersion'];
        $formulario['num_equipo_cono_reducido'] = $request->formulario['numEquipoConoReducido'];
        $formulario['hora_muestreo'] = $request->formulario['horaMuestreo'];
        $formulario['hora_inicio_amasado'] = $request->formulario['horaInicioAmasado'];
        $formulario['t_ambiente'] = $request->formulario['tAmbiente'];
        $formulario['t_hormigon_mortero'] = $request->formulario['tHormigonMortero'];
        $formulario['proveedor'] = $request->formulario['proveedor'];
        $formulario['num_guia_despacho'] = $request->formulario['numGuiaDespacho'];
        $formulario['nombre_chofer'] = $request->formulario['nombreChofer'];
        $formulario['curado_inicial'] = $request->formulario['curadoInicial'];
        $formulario['elemento_hormigonado'] = $request->formulario['elementoHormigonado'];
        $formulario['ubicacion_elemento'] = $request->formulario['ubicacionElemento'];
        $formulario['tipo_hormigon_mortero'] = $request->formulario['tipoHormigonMortero'];
        $formulario['resistencia_especificada'] = $request->formulario['resistenciaEspecificada'];
        $formulario['fecha_confeccion'] = $request->formulario['fechaConfeccion'];
        $formulario['aditivo'] = $request->formulario['aditivo'];
        $formulario['num_mixer'] = $request->formulario['numMixer'];
        $formulario['traslado_probetas'] = $request->formulario['trasladoProbetas'];
        $formulario['retiro_muestra_otros'] = $request->formulario['retiroMuestraOtros'];
        $formulario['retiro_muestra_cantidad_un_dia'] = $request->formulario['retiroMuestraCantidadUnDia'];
        $formulario['retiro_muestra_cantidad_tres_dias'] = $request->formulario['retiroMuestraCantidadTresDias'];
        $formulario['retiro_muestra_cantidad_siete_dias'] = $request->formulario['retiroMuestraCantidadSieteDias'];
        $formulario['retiro_muestra_cantidad_catorce_dias'] = $request->formulario['retiroMuestraCantidadCatorceDias'];
        $formulario['retiro_muestra_cantidad_veintiocho_dias'] = $request->formulario['retiroMuestraCantidadVeintiochoDias'];
        $formulario['retiro_muestra_cantidad_otros'] = $request->formulario['retiroMuestraCantidadOtros'];
        $formulario['retiro_muestra_fecha_un_dia'] = $request->formulario['retiroMuestraFechaUnDia'];
        $formulario['retiro_muestra_fecha_tres_dias'] = $request->formulario['retiroMuestraFechaTresDias'];
        $formulario['retiro_muestra_fecha_siete_dias'] = $request->formulario['retiroMuestraFechaSieteDias'];
        $formulario['retiro_muestra_fecha_catorce_dias'] = $request->formulario['retiroMuestraFechaCatorceDias'];
        $formulario['retiro_muestra_fecha_veintiocho_dias'] = $request->formulario['retiroMuestraFechaVeintiochoDias'];
        $formulario['retiro_muestra_fecha_otros'] = $request->formulario['retiroMuestraFechaOtros'];
        $formulario['retiro_muestra_informe_un_dia'] = $request->formulario['retiroMuestraInformeUnDia'];
        $formulario['retiro_muestra_informe_tres_dias'] = $request->formulario['retiroMuestraInformeTresDias'];
        $formulario['retiro_muestra_informe_siete_dias'] = $request->formulario['retiroMuestraInformeSieteDias'];
        $formulario['retiro_muestra_informe_catorce_dias'] = $request->formulario['retiroMuestraInformeCatorceDias'];
        $formulario['retiro_muestra_informe_veintiocho_dias'] = $request->formulario['retiroMuestraInformeVeintiochoDias'];
        $formulario['retiro_muestra_informe_otros'] = $request->formulario['retiroMuestraInformeOtros'];
        $formulario['procedimiento_extraccion'] = $request->formulario['procedimientoExtraccion'];
        $formulario['muestra_ingresada_por_cliente'] = $request->formulario['muestraIngresadaPorCliente'];
        $formulario['fecha_ingreso'] = $request->formulario['fechaIngreso'];
        $formulario['fecha_visita_obra'] = $request->formulario['fechaVisitaObra'];
        $formulario['hora_llegada'] = $request->formulario['horaLlegada'];
        $formulario['hora_salida'] = $request->formulario['horaSalida'];
        $formulario['responsable_en_obra'] = $request->formulario['responsableEnObra'];
        $formulario['dens_aparente_hormigon'] = $request->formulario['densAparenteHormigon'];
        $formulario['dens_aparente_mortero'] = $request->formulario['densAparenteMortero'];
        $formulario['indice_esclerometrico'] = $request->formulario['indiceEsclerometrico'];
        $formulario['irregularidad_superficial'] = $request->formulario['irregularidadSuperficial'];
        $formulario['irregularidad_superficial_ml'] = $request->formulario['irregularidadSuperficialMl'];
        $formulario['observaciones'] = $request->formulario['observaciones'];
        $formulario['alteracion_muestra'] = $request->formulario['alteracionMuestra'];
        $formulario['observaciones_alteraciones_muestra'] = $request->formulario['observacionesAlteracionesMuestra'];
        $formulario['laboratorista'] = $request->formulario['laboratorista'];
        $formulario['ayudante'] = $request->formulario['ayudante'];
        $formulario['recibe_o_muestrea'] = $request->formulario['recibeOMuestrea'];
        $formulario['aridos_hormigon_muestra_uno'] = $request->formulario['aridosHormigonMuestraUno'];
        $formulario['aridos_hormigon_muestra_dos'] = $request->formulario['aridosHormigonMuestraDos'];
        $formulario['aridos_hormigon_muestra_tres'] = $request->formulario['aridosHormigonMuestraTres'];
        $formulario['aridos_hormigon_muestra_cuatro'] = $request->formulario['aridosHormigonMuestraCuatro'];
        $formulario['seccion_testigos_habilitada'] = $request->formulario['seccionTestigosHabilitada'];
        $formulario['seccion_aridos_habilitada'] = $request->formulario['seccionAridosHabilitada'];
        $formulario['seccion_otros_habilitada'] = $request->formulario['seccionOtrosHabilitada'];
        $formulario['seccion_retiro_muestras_habilitada'] = $request->formulario['seccionRetiroMuestrasHabilitada'];
        $formulario['seccion_hormigon_habilitada'] = $request->formulario['seccionHormigonHabilitada'];
        $formulario['seccion_mortero_habilitada'] = $request->formulario['seccionMorteroHabilitada'];
        $formulario['testigos_extraidos_seis'] = $request->formulario['testigosExtraidosSeis'];
        $formulario['testigos_extraidos_cuatro'] = $request->formulario['testigosExtraidosCuatro'];
        $formulario['testigos_extraidos_total'] = $request->formulario['testigosExtraidosTotal'];
        $formulario['testigos_ensayados_seis'] = $request->formulario['testigosEnsayadosSeis'];
        $formulario['testigos_ensayados_cuatro'] = $request->formulario['testigosEnsayadosCuatro'];
        $formulario['testigos_ensayados_total'] = $request->formulario['testigosEnsayadosTotal'];
        $formulario['encargado_retiro_muestras'] = $request->formulario['encargadoRetiroMuestras'];
        $formulario['fecha_retiro_muestras'] = $request->formulario['fechaRetiroMuestras'];
        $formulario['ensayos_aceptacion_aridos'] = $request->formulario['ensayosAceptacionAridos'];
        $formulario['ensayos_dosificacion_hormigon'] = $request->formulario['ensayosDosificacionHormigon'];
        $formulario['ensayos_sin_probetas_prueba'] = $request->formulario['ensayosSinProbetasPrueba'];
        $formulario['ensayos_con_probetas_prueba'] = $request->formulario['ensayosConProbetasPrueba'];


        $result;
        try {
            $result = OrdenTrabajoTerreno::create($formulario);
        } catch (QueryException $e) {
            return [$e, false];
        }
        return [$result, true];
    }

    public function actualizarFormulario(Request $request){

        // $ultimoNumInforme = OrdenTrabajoTerreno::latest('created_at')->first();
        // $ultimoNumIngreso = intVal($ultimoNumInforme->num_ingreso);
        // $ultimoNumIngreso++;
        // $numLibre = true;
        // while($numLibre){
        //     $repetido = OrdenTrabajoTerreno::where('num_ingreso', $ultimoNumIngreso)->get();
        //     if ( count($repetido) == 0 ) {
        //         $numLibre = false;
        //     } else {
        //         $ultimoNumIngreso++;
        //     }
        // }
        $ordenExistente = OrdenTrabajoTerreno::where([
            ['num_ott', $request->formulario['numOtt']],
            ['id', '!=', $request->formulario['id']]
            ])->get();
        if(count($ordenExistente)){
            $retorno = ['num_ott_existe'];
            return [$retorno, false];
        }

        $numerosMuestra = explode(",", $request->formulario['numIngreso']);
        $numerosMuestraExistentes = [];

        OrdenTrabajoTerreno::where('id', '!=', $request->formulario['id'])->chunk(100, function ($ordenes) use(&$numerosMuestra, &$numerosMuestraExistentes) {
            foreach ($ordenes as $orden) {
                $numeros = explode(",", $orden['num_ingreso']);
                foreach ($numeros as $numeroMuestraEnOtt) {
                    if( in_array($numeroMuestraEnOtt, $numerosMuestra) ){
                        array_push($numerosMuestraExistentes, $numeroMuestraEnOtt);
                    }
                }
            }
        });
        if(count($numerosMuestraExistentes)){
            $retorno = ['num_muestra_repetido', $numerosMuestraExistentes];
            return [$retorno, false];
        }

        $formulario = OrdenTrabajoTerreno::find($request->formulario['id']);

        $formulario->num_ott = $request->formulario['numOtt'];
        $formulario->num_cliente_obra = $request->formulario['numClienteObra'];
        $formulario->num_ingreso = $request->formulario['numIngreso'];
        // $formulario->num_ingreso = $ultimoNumIngres;
        $formulario->nombre_cliente = $request->formulario['nombreCliente'];
        $formulario->nombre_obra = $request->formulario['nombreObra'];
        $formulario->fono_obra = $request->formulario['fonoObra'];
        $formulario->direccion_obra = $request->formulario['direccionObra'];
        $formulario->encargado_obra = $request->formulario['encargadoObra'];
        $formulario->muestreo_de = $request->formulario['muestreoDe'];
        $formulario->extraccion = $request->formulario['extraccion'];
        $formulario->compactacion = $request->formulario['compactacion'];
        $formulario->tipo_molde_uno = $request->formulario['tipoMoldeUno'];
        $formulario->tipo_molde_dos = $request->formulario['tipoMoldeDos'];
        $formulario->tipo_molde_tres = $request->formulario['tipoMoldeTres'];
        $formulario->tipo_molde_cuatro = $request->formulario['tipoMoldeCuatro'];
        $formulario->tipo_molde_cinco = $request->formulario['tipoMoldeCinco'];
        $formulario->tipo_molde_seis = $request->formulario['tipoMoldeSeis'];
        $formulario->tipo_molde_siete = $request->formulario['tipoMoldeSiete'];
        $formulario->muestreado_por = $request->formulario['muestreadoPor'];
        $formulario->ensayado_por = $request->formulario['ensayadoPor'];
        $formulario->tipo_muestra = $request->formulario['tipoMuestra'];
        $formulario->amasada_hormigon = $request->formulario['amasadaHormigon'];
        $formulario->asentamiento_cono = $request->formulario['asentamientoCono'];
        $formulario->num_informe = $request->formulario['numInforme'];
        $formulario->segregacion = $request->formulario['segregacion'];
        $formulario->num_equipo_cono_abrams = $request->formulario['numEquipoConoAbrams'];
        $formulario->num_vibrador_inmersion = $request->formulario['numVibradorInmersion'];
        $formulario->num_equipo_cono_reducido = $request->formulario['numEquipoConoReducido'];
        $formulario->hora_muestreo = $request->formulario['horaMuestreo'];
        $formulario->hora_inicio_amasado = $request->formulario['horaInicioAmasado'];
        $formulario->t_ambiente = $request->formulario['tAmbiente'];
        $formulario->t_hormigon_mortero = $request->formulario['tHormigonMortero'];
        $formulario->proveedor = $request->formulario['proveedor'];
        $formulario->num_guia_despacho = $request->formulario['numGuiaDespacho'];
        $formulario->nombre_chofer = $request->formulario['nombreChofer'];
        $formulario->curado_inicial = $request->formulario['curadoInicial'];
        $formulario->elemento_hormigonado = $request->formulario['elementoHormigonado'];
        $formulario->ubicacion_elemento = $request->formulario['ubicacionElemento'];
        $formulario->tipo_hormigon_mortero = $request->formulario['tipoHormigonMortero'];
        $formulario->resistencia_especificada = $request->formulario['resistenciaEspecificada'];
        $formulario->fecha_confeccion = $request->formulario['fechaConfeccion'];
        $formulario->aditivo = $request->formulario['aditivo'];
        $formulario->num_mixer = $request->formulario['numMixer'];
        $formulario->traslado_probetas = $request->formulario['trasladoProbetas'];
        $formulario->retiro_muestra_otros = $request->formulario['retiroMuestraOtros'];
        $formulario->retiro_muestra_cantidad_un_dia = $request->formulario['retiroMuestraCantidadUnDia'];
        $formulario->retiro_muestra_cantidad_tres_dias = $request->formulario['retiroMuestraCantidadTresDias'];
        $formulario->retiro_muestra_cantidad_siete_dias = $request->formulario['retiroMuestraCantidadSieteDias'];
        $formulario->retiro_muestra_cantidad_catorce_dias = $request->formulario['retiroMuestraCantidadCatorceDias'];
        $formulario->retiro_muestra_cantidad_veintiocho_dias = $request->formulario['retiroMuestraCantidadVeintiochoDias'];
        $formulario->retiro_muestra_cantidad_otros = $request->formulario['retiroMuestraCantidadOtros'];
        $formulario->retiro_muestra_fecha_un_dia = $request->formulario['retiroMuestraFechaUnDia'];
        $formulario->retiro_muestra_fecha_tres_dias = $request->formulario['retiroMuestraFechaTresDias'];
        $formulario->retiro_muestra_fecha_siete_dias = $request->formulario['retiroMuestraFechaSieteDias'];
        $formulario->retiro_muestra_fecha_catorce_dias = $request->formulario['retiroMuestraFechaCatorceDias'];
        $formulario->retiro_muestra_fecha_veintiocho_dias = $request->formulario['retiroMuestraFechaVeintiochoDias'];
        $formulario->retiro_muestra_fecha_otros = $request->formulario['retiroMuestraFechaOtros'];
        $formulario->retiro_muestra_informe_un_dia = $request->formulario['retiroMuestraInformeUnDia'];
        $formulario->retiro_muestra_informe_tres_dias = $request->formulario['retiroMuestraInformeTresDias'];
        $formulario->retiro_muestra_informe_siete_dias = $request->formulario['retiroMuestraInformeSieteDias'];
        $formulario->retiro_muestra_informe_catorce_dias = $request->formulario['retiroMuestraInformeCatorceDias'];
        $formulario->retiro_muestra_informe_veintiocho_dias = $request->formulario['retiroMuestraInformeVeintiochoDias'];
        $formulario->retiro_muestra_informe_otros = $request->formulario['retiroMuestraInformeOtros'];
        $formulario->procedimiento_extraccion = $request->formulario['procedimientoExtraccion'];
        $formulario->muestra_ingresada_por_cliente = $request->formulario['muestraIngresadaPorCliente'];
        $formulario->fecha_ingreso = $request->formulario['fechaIngreso'];
        $formulario->fecha_visita_obra = $request->formulario['fechaVisitaObra'];
        $formulario->hora_llegada = $request->formulario['horaLlegada'];
        $formulario->hora_salida = $request->formulario['horaSalida'];
        $formulario->responsable_en_obra = $request->formulario['responsableEnObra'];
        $formulario->dens_aparente_hormigon = $request->formulario['densAparenteHormigon'];
        $formulario->dens_aparente_mortero = $request->formulario['densAparenteMortero'];
        $formulario->indice_esclerometrico = $request->formulario['indiceEsclerometrico'];
        $formulario->irregularidad_superficial = $request->formulario['irregularidadSuperficial'];
        $formulario->irregularidad_superficial_ml = $request->formulario['irregularidadSuperficialMl'];
        $formulario->observaciones = $request->formulario['observaciones'];
        $formulario->alteracion_muestra = $request->formulario['alteracionMuestra'];
        $formulario->observaciones_alteraciones_muestra = $request->formulario['observacionesAlteracionesMuestra'];
        $formulario->laboratorista = $request->formulario['laboratorista'];
        $formulario->ayudante = $request->formulario['ayudante'];
        $formulario->recibe_o_muestrea = $request->formulario['recibeOMuestrea'];
        $formulario->aridos_hormigon_muestra_uno = $request->formulario['aridosHormigonMuestraUno'];
        $formulario->aridos_hormigon_muestra_dos = $request->formulario['aridosHormigonMuestraDos'];
        $formulario->aridos_hormigon_muestra_tres = $request->formulario['aridosHormigonMuestraTres'];
        $formulario->aridos_hormigon_muestra_cuatro = $request->formulario['aridosHormigonMuestraCuatro'];
        $formulario->seccion_testigos_habilitada = $request->formulario['seccionTestigosHabilitada'];
        $formulario->seccion_aridos_habilitada = $request->formulario['seccionAridosHabilitada'];
        $formulario->seccion_otros_habilitada = $request->formulario['seccionOtrosHabilitada'];
        $formulario->seccion_retiro_muestras_habilitada = $request->formulario['seccionRetiroMuestrasHabilitada'];
        $formulario->seccion_hormigon_habilitada = $request->formulario['seccionHormigonHabilitada'];
        $formulario->seccion_mortero_habilitada = $request->formulario['seccionMorteroHabilitada'];
        $formulario->testigos_extraidos_seis = $request->formulario['testigosExtraidosSeis'];
        $formulario->testigos_extraidos_cuatro = $request->formulario['testigosExtraidosCuatro'];
        $formulario->testigos_extraidos_total = $request->formulario['testigosExtraidosTotal'];
        $formulario->testigos_ensayados_seis = $request->formulario['testigosEnsayadosSeis'];
        $formulario->testigos_ensayados_cuatro = $request->formulario['testigosEnsayadosCuatro'];
        $formulario->testigos_ensayados_total = $request->formulario['testigosEnsayadosTotal'];
        $formulario->encargado_retiro_muestras = $request->formulario['encargadoRetiroMuestras'];
        $formulario->fecha_retiro_muestras = $request->formulario['fechaRetiroMuestras'];
        $formulario->ensayos_aceptacion_aridos = $request->formulario['ensayosAceptacionAridos'];
        $formulario->ensayos_dosificacion_hormigon = $request->formulario['ensayosDosificacionHormigon'];
        $formulario->ensayos_sin_probetas_prueba = $request->formulario['ensayosSinProbetasPrueba'];
        $formulario->ensayos_con_probetas_prueba = $request->formulario['ensayosConProbetasPrueba'];


        try {
            $formulario->save();
            //     $result = OrdenTrabajoTerreno::create($formulario);
        } catch (QueryException $e) {
            return [$e, false];
        }
        return [$formulario, true];
    }

    public function verFormulario($id){
        $orden = OrdenTrabajoTerreno::where('id', $id)->first();
        $accion = 'ver';

        return view('ver_formulario_ott', compact('accion', 'orden') );
    }

    public function editarFormulario($id){
        $orden = OrdenTrabajoTerreno::where('id', $id)->first();
        $accion = 'editar';

        return view('ver_formulario_ott', compact('accion', 'orden') );
    }

    public function validarFormulario(Request $request){
        $orden = OrdenTrabajoTerreno::where('id', $request->id)->first();
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
        $orden = OrdenTrabajoTerreno::where('id', $request->id)->first();

        $orden->validado = false;
        try {
            $orden->save();
        } catch (QueryException $e) {
            return [$e, false];
        }
        return [$orden, true];
    }
}