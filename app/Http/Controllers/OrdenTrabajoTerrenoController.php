<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\OrdenTrabajoTerreno;
use App\Models\EnsayoProbetasHormigon;
use Maatwebsite\Excel\Facades\Excel;

class OrdenTrabajoTerrenoController extends Controller
{
    public function index(){
        $ordenes = $this->todasLasOrdenes();
        $ensayos = $this->todosLosEnsayos();
        $datos = [
            'ordenes' => $ordenes,
            'ensayos' => $ensayos
        ];
        return view('formularios', compact('datos'));
    }

    public function todasLasOrdenes(){
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

        $formulario;
        $formulario['num_ott'] = mb_strtoupper($request->formulario['numOtt']);
        $formulario['num_cliente_obra'] = mb_strtoupper($request->formulario['numClienteObra']);
        $formulario['num_ingreso'] = mb_strtoupper($request->formulario['numIngreso']);
        // $formulario['num_ingreso'] = $ultimoNumIngreso;
        $formulario['nombre_cliente'] = mb_strtoupper($request->formulario['nombreCliente']);
        $formulario['nombre_obra'] = mb_strtoupper($request->formulario['nombreObra']);
        $formulario['fono_obra'] = mb_strtoupper($request->formulario['fonoObra']);
        $formulario['direccion_obra'] = mb_strtoupper($request->formulario['direccionObra']);
        $formulario['encargado_obra'] = mb_strtoupper($request->formulario['encargadoObra']);
        $formulario['muestreo_de'] = mb_strtoupper($request->formulario['muestreoDe']);
        $formulario['extraccion'] = mb_strtoupper($request->formulario['extraccion']);
        $formulario['compactacion'] = mb_strtoupper($request->formulario['compactacion']);
        $formulario['tipo_molde_uno'] = mb_strtoupper($request->formulario['tipoMoldeUno']);
        $formulario['tipo_molde_dos'] = mb_strtoupper($request->formulario['tipoMoldeDos']);
        $formulario['tipo_molde_tres'] = mb_strtoupper($request->formulario['tipoMoldeTres']);
        $formulario['tipo_molde_cuatro'] = mb_strtoupper($request->formulario['tipoMoldeCuatro']);
        $formulario['tipo_molde_cinco'] = mb_strtoupper($request->formulario['tipoMoldeCinco']);
        $formulario['tipo_molde_seis'] = mb_strtoupper($request->formulario['tipoMoldeSeis']);
        $formulario['tipo_molde_siete'] = mb_strtoupper($request->formulario['tipoMoldeSiete']);
        $formulario['muestreado_por'] = mb_strtoupper($request->formulario['muestreadoPor']);
        $formulario['ensayado_por'] = mb_strtoupper($request->formulario['ensayadoPor']);
        $formulario['tipo_muestra'] = mb_strtoupper($request->formulario['tipoMuestra']);
        $formulario['amasada_hormigon'] = mb_strtoupper($request->formulario['amasadaHormigon']);
        $formulario['asentamiento_cono'] = mb_strtoupper($request->formulario['asentamientoCono']);
        $formulario['num_informe'] = mb_strtoupper($request->formulario['numInforme']);
        $formulario['segregacion'] = mb_strtoupper($request->formulario['segregacion']);
        $formulario['num_equipo_cono_abrams'] = mb_strtoupper($request->formulario['numEquipoConoAbrams']);
        $formulario['num_vibrador_inmersion'] = mb_strtoupper($request->formulario['numVibradorInmersion']);
        $formulario['num_equipo_cono_reducido'] = mb_strtoupper($request->formulario['numEquipoConoReducido']);
        $formulario['hora_muestreo'] = mb_strtoupper($request->formulario['horaMuestreo']);
        $formulario['hora_inicio_amasado'] = mb_strtoupper($request->formulario['horaInicioAmasado']);
        $formulario['t_ambiente'] = mb_strtoupper($request->formulario['tAmbiente']);
        $formulario['t_hormigon_mortero'] = mb_strtoupper($request->formulario['tHormigonMortero']);
        $formulario['proveedor'] = mb_strtoupper($request->formulario['proveedor']);
        $formulario['num_guia_despacho'] = mb_strtoupper($request->formulario['numGuiaDespacho']);
        $formulario['nombre_chofer'] = mb_strtoupper($request->formulario['nombreChofer']);
        $formulario['curado_inicial'] = mb_strtoupper($request->formulario['curadoInicial']);
        $formulario['elemento_hormigonado'] = mb_strtoupper($request->formulario['elementoHormigonado']);
        $formulario['ubicacion_elemento'] = mb_strtoupper($request->formulario['ubicacionElemento']);
        $formulario['tipo_hormigon_mortero'] = mb_strtoupper($request->formulario['tipoHormigonMortero']);
        $formulario['resistencia_especificada'] = mb_strtoupper($request->formulario['resistenciaEspecificada']);
        $formulario['fecha_confeccion'] = mb_strtoupper($request->formulario['fechaConfeccion']);
        $formulario['aditivo'] = mb_strtoupper($request->formulario['aditivo']);
        $formulario['num_mixer'] = mb_strtoupper($request->formulario['numMixer']);
        $formulario['traslado_probetas'] = mb_strtoupper($request->formulario['trasladoProbetas']);
        $formulario['retiro_muestra_otros'] = mb_strtoupper($request->formulario['retiroMuestraOtros']);
        $formulario['retiro_muestra_cantidad_un_dia'] = mb_strtoupper($request->formulario['retiroMuestraCantidadUnDia']);
        $formulario['retiro_muestra_cantidad_tres_dias'] = mb_strtoupper($request->formulario['retiroMuestraCantidadTresDias']);
        $formulario['retiro_muestra_cantidad_siete_dias'] = mb_strtoupper($request->formulario['retiroMuestraCantidadSieteDias']);
        $formulario['retiro_muestra_cantidad_catorce_dias'] = mb_strtoupper($request->formulario['retiroMuestraCantidadCatorceDias']);
        $formulario['retiro_muestra_cantidad_veintiocho_dias'] = mb_strtoupper($request->formulario['retiroMuestraCantidadVeintiochoDias']);
        $formulario['retiro_muestra_cantidad_otros'] = mb_strtoupper($request->formulario['retiroMuestraCantidadOtros']);
        $formulario['retiro_muestra_fecha_un_dia'] = mb_strtoupper($request->formulario['retiroMuestraFechaUnDia']);
        $formulario['retiro_muestra_fecha_tres_dias'] = mb_strtoupper($request->formulario['retiroMuestraFechaTresDias']);
        $formulario['retiro_muestra_fecha_siete_dias'] = mb_strtoupper($request->formulario['retiroMuestraFechaSieteDias']);
        $formulario['retiro_muestra_fecha_catorce_dias'] = mb_strtoupper($request->formulario['retiroMuestraFechaCatorceDias']);
        $formulario['retiro_muestra_fecha_veintiocho_dias'] = mb_strtoupper($request->formulario['retiroMuestraFechaVeintiochoDias']);
        $formulario['retiro_muestra_fecha_otros'] = mb_strtoupper($request->formulario['retiroMuestraFechaOtros']);
        $formulario['retiro_muestra_informe_un_dia'] = mb_strtoupper($request->formulario['retiroMuestraInformeUnDia']);
        $formulario['retiro_muestra_informe_tres_dias'] = mb_strtoupper($request->formulario['retiroMuestraInformeTresDias']);
        $formulario['retiro_muestra_informe_siete_dias'] = mb_strtoupper($request->formulario['retiroMuestraInformeSieteDias']);
        $formulario['retiro_muestra_informe_catorce_dias'] = mb_strtoupper($request->formulario['retiroMuestraInformeCatorceDias']);
        $formulario['retiro_muestra_informe_veintiocho_dias'] = mb_strtoupper($request->formulario['retiroMuestraInformeVeintiochoDias']);
        $formulario['retiro_muestra_informe_otros'] = mb_strtoupper($request->formulario['retiroMuestraInformeOtros']);
        $formulario['procedimiento_extraccion'] = mb_strtoupper($request->formulario['procedimientoExtraccion']);
        $formulario['muestra_ingresada_por_cliente'] = mb_strtoupper($request->formulario['muestraIngresadaPorCliente']);
        $formulario['fecha_ingreso'] = mb_strtoupper($request->formulario['fechaIngreso']);
        $formulario['fecha_visita_obra'] = mb_strtoupper($request->formulario['fechaVisitaObra']);
        $formulario['hora_llegada'] = mb_strtoupper($request->formulario['horaLlegada']);
        $formulario['hora_salida'] = mb_strtoupper($request->formulario['horaSalida']);
        $formulario['responsable_en_obra'] = mb_strtoupper($request->formulario['responsableEnObra']);
        $formulario['dens_aparente_hormigon'] = mb_strtoupper($request->formulario['densAparenteHormigon']);
        $formulario['dens_aparente_mortero'] = mb_strtoupper($request->formulario['densAparenteMortero']);
        $formulario['indice_esclerometrico'] = mb_strtoupper($request->formulario['indiceEsclerometrico']);
        $formulario['irregularidad_superficial'] = mb_strtoupper($request->formulario['irregularidadSuperficial']);
        $formulario['irregularidad_superficial_ml'] = mb_strtoupper($request->formulario['irregularidadSuperficialMl']);
        $formulario['observaciones'] = mb_strtoupper($request->formulario['observaciones']);
        $formulario['alteracion_muestra'] = mb_strtoupper($request->formulario['alteracionMuestra']);
        $formulario['observaciones_alteraciones_muestra'] = mb_strtoupper($request->formulario['observacionesAlteracionesMuestra']);
        $formulario['laboratorista'] = mb_strtoupper($request->formulario['laboratorista']);
        $formulario['ayudante'] = mb_strtoupper($request->formulario['ayudante']);
        $formulario['recibe_o_muestrea'] = mb_strtoupper($request->formulario['recibeOMuestrea']);
        $formulario['aridos_hormigon_muestra_uno'] = mb_strtoupper($request->formulario['aridosHormigonMuestraUno']);
        $formulario['aridos_hormigon_muestra_dos'] = mb_strtoupper($request->formulario['aridosHormigonMuestraDos']);
        $formulario['aridos_hormigon_muestra_tres'] = mb_strtoupper($request->formulario['aridosHormigonMuestraTres']);
        $formulario['aridos_hormigon_muestra_cuatro'] = mb_strtoupper($request->formulario['aridosHormigonMuestraCuatro']);
        $formulario['seccion_testigos_habilitada'] = mb_strtoupper($request->formulario['seccionTestigosHabilitada']);
        $formulario['seccion_aridos_habilitada'] = mb_strtoupper($request->formulario['seccionAridosHabilitada']);
        $formulario['seccion_otros_habilitada'] = mb_strtoupper($request->formulario['seccionOtrosHabilitada']);
        $formulario['seccion_retiro_muestras_habilitada'] = mb_strtoupper($request->formulario['seccionRetiroMuestrasHabilitada']);
        $formulario['testigos_extraidos_seis'] = mb_strtoupper($request->formulario['testigosExtraidosSeis']);
        $formulario['testigos_extraidos_cuatro'] = mb_strtoupper($request->formulario['testigosExtraidosCuatro']);
        $formulario['testigos_extraidos_total'] = mb_strtoupper($request->formulario['testigosExtraidosTotal']);
        $formulario['testigos_ensayados_seis'] = mb_strtoupper($request->formulario['testigosEnsayadosSeis']);
        $formulario['testigos_ensayados_cuatro'] = mb_strtoupper($request->formulario['testigosEnsayadosCuatro']);
        $formulario['testigos_ensayados_total'] = mb_strtoupper($request->formulario['testigosEnsayadosTotal']);

        $result;
        try {
            $result = OrdenTrabajoTerreno::create($formulario);
        } catch (QueryException $e) {
            return [$e, false];
        }
        return [$result, true];
    }

    public function verFormulario($id){
        $orden = OrdenTrabajoTerreno::where('id', $id)->first();
        $accion = 'ver';

        return view('ver_formulario_ott', compact('accion', 'orden') );
    }
}