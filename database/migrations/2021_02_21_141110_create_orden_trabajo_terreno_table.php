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

            $table->boolean('validado');
            $table->string('num_ott', 75)->unique();
            $table->string('num_cliente_obra', 75)->nullable();
            $table->string('nombre_cliente', 75)->nullable();
            $table->string('nombre_obra', 75)->nullable();
            $table->string('fono_obra', 75)->nullable();
            $table->string('direccion_obra', 75)->nullable();
            $table->string('encargado_obra', 75)->nullable();
            $table->string('muestreo_de', 75)->nullable();
            $table->string('extraccion', 75)->nullable();
            $table->string('compactacion', 75)->nullable();
            $table->string('tipo_molde_uno', 75)->nullable();
            $table->string('tipo_molde_dos', 75)->nullable();
            $table->string('tipo_molde_tres', 75)->nullable();
            $table->string('tipo_molde_cuatro', 75)->nullable();
            $table->string('tipo_molde_cinco', 75)->nullable();
            $table->string('tipo_molde_seis', 75)->nullable();
            $table->string('tipo_molde_siete', 75)->nullable();
            $table->string('muestreado_por', 75)->nullable();
            $table->string('ensayado_por', 75)->nullable();
            $table->string('tipo_muestra', 75)->nullable();
            $table->string('amasada_hormigon', 75)->nullable();
            $table->string('asentamiento_cono', 75)->nullable();
            $table->string('num_informe', 75)->nullable();
            $table->string('segregacion', 75)->nullable();
            $table->string('num_equipo_cono_abrams', 75)->nullable();
            $table->string('num_vibrador_inmersion', 75)->nullable();
            $table->string('num_equipo_cono_reducido', 75)->nullable();
            $table->string('num_ingreso', 75)->nullable();
            $table->string('hora_muestreo', 75)->nullable();
            $table->string('hora_inicio_amasado', 75)->nullable();
            $table->string('t_ambiente', 75)->nullable();
            $table->string('t_hormigon_mortero', 75)->nullable();
            $table->string('proveedor', 75)->nullable();
            $table->string('num_guia_despacho', 75)->nullable();
            $table->string('nombre_chofer', 75)->nullable();
            $table->string('curado_inicial', 75)->nullable();
            $table->string('elemento_hormigonado', 75)->nullable();
            $table->string('ubicacion_elemento', 75)->nullable();
            $table->string('tipo_hormigon_mortero', 75)->nullable();
            $table->string('resistencia_especificada', 75)->nullable();
            $table->string('fecha_confeccion', 75)->nullable();
            $table->string('aditivo', 75)->nullable();
            $table->string('num_mixer', 75)->nullable();
            $table->string('traslado_probetas', 75)->nullable();
            $table->string('retiro_muestra_otros', 75)->nullable();
            $table->string('retiro_muestra_cantidad_un_dia', 75)->nullable();
            $table->string('retiro_muestra_cantidad_tres_dias', 75)->nullable();
            $table->string('retiro_muestra_cantidad_siete_dias', 75)->nullable();
            $table->string('retiro_muestra_cantidad_catorce_dias', 75)->nullable();
            $table->string('retiro_muestra_cantidad_veintiocho_dias', 75)->nullable();
            $table->string('retiro_muestra_cantidad_otros', 75)->nullable();
            $table->string('retiro_muestra_fecha_un_dia', 75)->nullable();
            $table->string('retiro_muestra_fecha_tres_dias', 75)->nullable();
            $table->string('retiro_muestra_fecha_siete_dias', 75)->nullable();
            $table->string('retiro_muestra_fecha_catorce_dias', 75)->nullable();
            $table->string('retiro_muestra_fecha_veintiocho_dias', 75)->nullable();
            $table->string('retiro_muestra_fecha_otros', 75)->nullable();
            $table->string('retiro_muestra_informe_un_dia', 75)->nullable();
            $table->string('retiro_muestra_informe_tres_dias', 75)->nullable();
            $table->string('retiro_muestra_informe_siete_dias', 75)->nullable();
            $table->string('retiro_muestra_informe_catorce_dias', 75)->nullable();
            $table->string('retiro_muestra_informe_veintiocho_dias', 75)->nullable();
            $table->string('retiro_muestra_informe_otros', 75)->nullable();
            $table->string('procedimiento_extraccion', 75)->nullable();
            $table->string('muestra_ingresada_por_cliente', 75)->nullable();
            $table->string('fecha_ingreso', 75)->nullable();
            $table->string('fecha_visita_obra', 75)->nullable();
            $table->string('hora_llegada', 75)->nullable();
            $table->string('hora_salida', 75)->nullable();
            $table->string('responsable_en_obra', 75)->nullable();
            $table->string('dens_aparente_hormigon', 75)->nullable();
            $table->string('dens_aparente_mortero', 75)->nullable();
            $table->string('indice_esclerometrico', 75)->nullable();
            $table->string('irregularidad_superficial', 75)->nullable();
            $table->string('irregularidad_superficial_ml', 75)->nullable();
            $table->string('observaciones', 75)->nullable();
            $table->string('alteracion_muestra', 75)->nullable();
            $table->string('observaciones_alteraciones_muestra', 75)->nullable();
            $table->string('laboratorista', 75)->nullable();
            $table->string('ayudante', 75)->nullable();
            $table->string('recibe_o_muestrea', 75)->nullable();
            $table->string('aridos_hormigon_muestra_uno', 75)->nullable();
            $table->string('aridos_hormigon_muestra_dos', 75)->nullable();
            $table->string('aridos_hormigon_muestra_tres', 75)->nullable();
            $table->string('aridos_hormigon_muestra_cuatro', 75)->nullable();
            $table->string('seccion_testigos_habilitada', 75)->nullable();
            $table->string('seccion_aridos_habilitada', 75)->nullable();
            $table->string('seccion_otros_habilitada', 75)->nullable();
            $table->string('seccion_retiro_muestras_habilitada', 75)->nullable();
            $table->string('testigos_extraidos_seis', 75)->nullable();
            $table->string('testigos_extraidos_cuatro', 75)->nullable();
            $table->string('testigos_extraidos_total', 75)->nullable();
            $table->string('testigos_ensayados_seis', 75)->nullable();
            $table->string('testigos_ensayados_cuatro', 75)->nullable();
            $table->string('testigos_ensayados_total', 75)->nullable();

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
