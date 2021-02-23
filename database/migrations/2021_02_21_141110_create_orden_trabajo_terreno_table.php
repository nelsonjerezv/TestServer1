<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenTrabajoTerrenoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_trabajo_terreno', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_cliente_obra', 100)->nullable();
            $table->string('ott_number_hf', 100)->nullable();
            $table->string('nombre_cliente', 100)->nullable();
            $table->string('nombre_obra', 100)->nullable();
            $table->string('fono_obra', 100)->nullable();
            $table->string('direccion_obra', 100)->nullable();
            $table->string('encargado_obra', 100)->nullable();
            $table->string('muestreo_de', 100)->nullable();
            $table->string('extraccion', 100)->nullable();
            $table->string('compactacion', 100)->nullable();
            $table->string('tipo_molde', 100)->nullable();
            $table->string('muestreado_por', 100)->nullable();
            $table->string('ensayado_por', 100)->nullable();
            $table->string('tipo_muestra', 100)->nullable();
            $table->string('amasada_hormigon', 100)->nullable();
            $table->string('asentamiento_cono', 100)->nullable();
            $table->string('numero_informe', 100)->nullable();
            $table->string('segregacion', 100)->nullable();
            $table->string('num_equipo_cono_abrams', 100)->nullable();
            $table->string('num_vibrador_inmersion', 100)->nullable();
            $table->string('num_equipo_cono_reducido', 100)->nullable();
            $table->string('num_ingreso', 100)->nullable();
            $table->string('hora_muestreo', 100)->nullable();
            $table->string('hora_inicio_amasado', 100)->nullable();
            $table->string('t_ambiente', 100)->nullable();
            $table->string('t_hormigon_muestreo', 100)->nullable();
            $table->string('proveedor', 100)->nullable();
            $table->string('num_guia_despacho', 100)->nullable();
            $table->string('nombre_chofer', 100)->nullable();
            $table->string('curado_inicial', 100)->nullable();
            $table->string('elemento_hormigonado', 100)->nullable();
            $table->string('ubicacion_elemento', 100)->nullable();
            $table->string('tipo_hormigon_mortero', 100)->nullable();
            $table->string('resistencia_especificada', 100)->nullable();
            $table->string('fecha_confeccion', 100)->nullable();
            $table->string('aditivo', 100)->nullable();
            $table->string('num_mixer', 100)->nullable();
            $table->string('traslado_probetas', 100)->nullable();
            $table->string('retiro_muestra_otros', 100)->nullable();
            $table->string('retiro_muestra_cantidad_un_dia', 100)->nullable();
            $table->string('retiro_muestra_cantidad_tres_dias', 100)->nullable();
            $table->string('retiro_muestra_cantidad_siete_dias', 100)->nullable();
            $table->string('retiro_muestra_cantidad_catorce_dias', 100)->nullable();
            $table->string('retiro_muestra_cantidad_veintiocho_dias', 100)->nullable();
            $table->string('retiro_muestra_cantidad_otros', 100)->nullable();
            $table->string('retiro_muestra_fecha_un_dia', 100)->nullable();
            $table->string('retiro_muestra_fecha_tres_dias', 100)->nullable();
            $table->string('retiro_muestra_fecha_siete_dias', 100)->nullable();
            $table->string('retiro_muestra_fecha_catorce_dias', 100)->nullable();
            $table->string('retiro_muestra_fecha_veintiocho_dias', 100)->nullable();
            $table->string('retiro_muestra_fecha_otros', 100)->nullable();
            $table->string('retiro_muestra_informe_un_dia', 100)->nullable();
            $table->string('retiro_muestra_informe_tres_dias', 100)->nullable();
            $table->string('retiro_muestra_informe_siete_dias', 100)->nullable();
            $table->string('retiro_muestra_informe_catorce_dias', 100)->nullable();
            $table->string('retiro_muestra_informe_veintiocho_dias', 100)->nullable();
            $table->string('retiro_muestra_informe_otros', 100)->nullable();
            $table->string('procedimiento_extraccion', 100)->nullable();
            $table->string('muestra_ingresada_por_cliente', 100)->nullable();
            $table->string('fecha_ingreso', 100)->nullable();
            $table->string('fecha_visita_obra', 100)->nullable();
            $table->string('hora_llegada', 100)->nullable();
            $table->string('hora_salida', 100)->nullable();
            $table->string('responsable_en_obra', 100)->nullable();
            $table->string('dens_aparente_hormigon', 100)->nullable();
            $table->string('dens_aparente_mortero', 100)->nullable();
            $table->string('indice_esclerometrico', 100)->nullable();
            $table->string('irregularidad_superficial', 100)->nullable();
            $table->string('irregularidad_superficial_ml', 100)->nullable();
            $table->string('observaciones', 100)->nullable();
            $table->string('alteracion_muestra', 100)->nullable();
            $table->string('laboratorista', 100)->nullable();
            $table->string('ayudante', 100)->nullable();
            $table->string('recibe_o_muestrea', 100)->nullable();
            $table->string('aridos_hormigon_muestra_uno', 100)->nullable();
            $table->string('aridos_hormigon_muestra_dos', 100)->nullable();
            $table->string('aridos_hormigon_muestra_tres', 100)->nullable();
            $table->string('aridos_hormigon_muestra_cuatro', 100)->nullable();
            $table->string('seccion_testigos_habilitada', 100)->nullable();
            $table->string('seccion_aridos_habilitada', 100)->nullable();
            $table->string('testigos_extraidos_seis', 100)->nullable();
            $table->string('testigos_extraidos_cuatro', 100)->nullable();
            $table->string('testigos_extraidos_total', 100)->nullable();
            $table->string('testigos_ensayados_seis', 100)->nullable();
            $table->string('testigos_ensayados_cuatro', 100)->nullable();
            $table->string('testigos_ensayados_total', 100)->nullable();
            $table->string('observaciones_alteraciones_muestra', 100)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_trabajo_terreno');
    }
}
