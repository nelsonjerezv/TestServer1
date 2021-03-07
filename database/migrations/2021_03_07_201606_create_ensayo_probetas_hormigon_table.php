<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnsayoProbetasHormigonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ensayo_probetas_hormigon', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_muestra', 100)->nullable();
            $table->string('ott', 100)->nullable();
            $table->string('num_informe', 100)->nullable();
            $table->string('camara_humeda', 100)->nullable();
            $table->string('piscina', 100)->nullable();
            $table->string('balanza', 100)->nullable();
            $table->string('num_pie_de_metro', 100)->nullable();
            $table->string('num_prensa', 100)->nullable();
            $table->string('num_cronometro', 100)->nullable();
            $table->string('error_trescientos_mm', 100)->nullable();
            $table->string('num_marmita', 100)->nullable();
            $table->string('num_dispositivo_refrentado', 100)->nullable();
            $table->string('num_micrometro', 100)->nullable();
            $table->string('num_molde_muestra_uno', 100)->nullable();
            $table->string('num_molde_muestra_dos', 100)->nullable();
            $table->string('num_molde_muestra_tres', 100)->nullable();
            $table->string('num_molde_muestra_cuatro', 100)->nullable();
            $table->string('fecha_confeccion_muestra_uno', 100)->nullable();
            $table->string('fecha_confeccion_muestra_dos', 100)->nullable();
            $table->string('fecha_confeccion_muestra_tres', 100)->nullable();
            $table->string('fecha_confeccion_muestra_cuatro', 100)->nullable();
            $table->string('fecha_ensayo_muestra_uno', 100)->nullable();
            $table->string('fecha_ensayo_muestra_dos', 100)->nullable();
            $table->string('fecha_ensayo_muestra_tres', 100)->nullable();
            $table->string('fecha_ensayo_muestra_cuatro', 100)->nullable();
            $table->string('edad_dias_muestra_uno', 100)->nullable();
            $table->string('edad_dias_muestra_dos', 100)->nullable();
            $table->string('edad_dias_muestra_tres', 100)->nullable();
            $table->string('edad_dias_muestra_cuatro', 100)->nullable();
            $table->string('refrentado_muestra_uno', 100)->nullable();
            $table->string('refrentado_muestra_dos', 100)->nullable();
            $table->string('refrentado_muestra_tres', 100)->nullable();
            $table->string('refrentado_muestra_cuatro', 100)->nullable();
            $table->string('perpendicularidad_muestra_uno', 100)->nullable();
            $table->string('perpendicularidad_muestra_dos', 100)->nullable();
            $table->string('perpendicularidad_muestra_tres', 100)->nullable();
            $table->string('perpendicularidad_muestra_cuatro', 100)->nullable();
            $table->string('planeidad_muestra_uno', 100)->nullable();
            $table->string('planeidad_muestra_dos', 100)->nullable();
            $table->string('planeidad_muestra_tres', 100)->nullable();
            $table->string('planeidad_muestra_cuatro', 100)->nullable();
            $table->string('espesor_superior_muestra_uno', 100)->nullable();
            $table->string('espesor_superior_muestra_dos', 100)->nullable();
            $table->string('espesor_superior_muestra_tres', 100)->nullable();
            $table->string('espesor_superior_muestra_cuatro', 100)->nullable();
            $table->string('espesor_inferior_muestra_uno', 100)->nullable();
            $table->string('espesor_inferior_muestra_dos', 100)->nullable();
            $table->string('espesor_inferior_muestra_tres', 100)->nullable();
            $table->string('espesor_inferior_muestra_cuatro', 100)->nullable();
            $table->string('espesor_promedio_muestra_uno', 100)->nullable();
            $table->string('espesor_promedio_muestra_dos', 100)->nullable();
            $table->string('espesor_promedio_muestra_tres', 100)->nullable();
            $table->string('espesor_promedio_muestra_cuatro', 100)->nullable();
            $table->string('d_uno_muestra_uno', 100)->nullable();
            $table->string('d_uno_muestra_dos', 100)->nullable();
            $table->string('d_uno_muestra_tres', 100)->nullable();
            $table->string('d_uno_muestra_cuatro', 100)->nullable();
            $table->string('d_dos_muestra_uno', 100)->nullable();
            $table->string('d_dos_muestra_dos', 100)->nullable();
            $table->string('d_dos_muestra_tres', 100)->nullable();
            $table->string('d_dos_muestra_cuatro', 100)->nullable();
            $table->string('h_uno_muestra_uno', 100)->nullable();
            $table->string('h_uno_muestra_dos', 100)->nullable();
            $table->string('h_uno_muestra_tres', 100)->nullable();
            $table->string('h_uno_muestra_cuatro', 100)->nullable();
            $table->string('h_dos_muestra_uno', 100)->nullable();
            $table->string('h_dos_muestra_dos', 100)->nullable();
            $table->string('h_dos_muestra_tres', 100)->nullable();
            $table->string('h_dos_muestra_cuatro', 100)->nullable();
            $table->string('d_uno_muestra_uno_corregida', 100)->nullable();
            $table->string('d_uno_muestra_dos_corregida', 100)->nullable();
            $table->string('d_uno_muestra_tres_corregida', 100)->nullable();
            $table->string('d_uno_muestra_cuatro_corregida', 100)->nullable();
            $table->string('d_dos_muestra_uno_corregida', 100)->nullable();
            $table->string('d_dos_muestra_dos_corregida', 100)->nullable();
            $table->string('d_dos_muestra_tres_corregida', 100)->nullable();
            $table->string('d_dos_muestra_cuatro_corregida', 100)->nullable();
            $table->string('h_uno_muestra_uno_corregida', 100)->nullable();
            $table->string('h_uno_muestra_dos_corregida', 100)->nullable();
            $table->string('h_uno_muestra_tres_corregida', 100)->nullable();
            $table->string('h_uno_muestra_cuatro_corregida', 100)->nullable();
            $table->string('h_dos_muestra_uno_corregida', 100)->nullable();
            $table->string('h_dos_muestra_dos_corregida', 100)->nullable();
            $table->string('h_dos_muestra_tres_corregida', 100)->nullable();
            $table->string('h_dos_muestra_cuatro_corregida', 100)->nullable();
            $table->string('masa_muestra_uno', 100)->nullable();
            $table->string('masa_muestra_dos', 100)->nullable();
            $table->string('masa_muestra_tres', 100)->nullable();
            $table->string('masa_muestra_cuatro', 100)->nullable();
            $table->string('error_muestra_uno', 100)->nullable();
            $table->string('error_muestra_dos', 100)->nullable();
            $table->string('error_muestra_tres', 100)->nullable();
            $table->string('error_muestra_cuatro', 100)->nullable();
            $table->string('masa_corregida_muestra_uno', 100)->nullable();
            $table->string('masa_corregida_muestra_dos', 100)->nullable();
            $table->string('masa_corregida_muestra_tres', 100)->nullable();
            $table->string('masa_corregida_muestra_cuatro', 100)->nullable();
            $table->string('volumen_muestra_uno', 100)->nullable();
            $table->string('volumen_muestra_dos', 100)->nullable();
            $table->string('volumen_muestra_tres', 100)->nullable();
            $table->string('volumen_muestra_cuatro', 100)->nullable();
            $table->string('volumen_metro_cubico_muestra_uno', 100)->nullable();
            $table->string('volumen_metro_cubico_muestra_dos', 100)->nullable();
            $table->string('volumen_metro_cubico_muestra_tres', 100)->nullable();
            $table->string('volumen_metro_cubico_muestra_cuatro', 100)->nullable();
            $table->string('densidad_muestra_uno', 100)->nullable();
            $table->string('densidad_muestra_dos', 100)->nullable();
            $table->string('densidad_muestra_tres', 100)->nullable();
            $table->string('densidad_muestra_cuatro', 100)->nullable();
            $table->string('area_muestra_uno', 100)->nullable();
            $table->string('area_muestra_dos', 100)->nullable();
            $table->string('area_muestra_tres', 100)->nullable();
            $table->string('area_muestra_cuatro', 100)->nullable();
            $table->string('carga_ensayo_muestra_uno', 100)->nullable();
            $table->string('carga_ensayo_muestra_dos', 100)->nullable();
            $table->string('carga_ensayo_muestra_tres', 100)->nullable();
            $table->string('carga_ensayo_muestra_cuatro', 100)->nullable();
            $table->string('carga_ensayo_mil_muestra_uno', 100)->nullable();
            $table->string('carga_ensayo_mil_muestra_dos', 100)->nullable();
            $table->string('carga_ensayo_mil_muestra_tres', 100)->nullable();
            $table->string('carga_ensayo_mil_muestra_cuatro', 100)->nullable();
            $table->string('tiempo_carga_muestra_uno', 100)->nullable();
            $table->string('tiempo_carga_muestra_dos', 100)->nullable();
            $table->string('tiempo_carga_muestra_tres', 100)->nullable();
            $table->string('tiempo_carga_muestra_cuatro', 100)->nullable();
            $table->string('resistencia_compresion_muestra_uno', 100)->nullable();
            $table->string('resistencia_compresion_muestra_dos', 100)->nullable();
            $table->string('resistencia_compresion_muestra_tres', 100)->nullable();
            $table->string('resistencia_compresion_muestra_cuatro', 100)->nullable();
            $table->string('factores_conversion_muestra_uno', 100)->nullable();
            $table->string('factores_conversion_muestra_dos', 100)->nullable();
            $table->string('factores_conversion_muestra_tres', 100)->nullable();
            $table->string('factores_conversion_muestra_cuatro', 100)->nullable();
            $table->string('resistencia_corregida_muestra_uno', 100)->nullable();
            $table->string('resistencia_corregida_muestra_dos', 100)->nullable();
            $table->string('resistencia_corregida_muestra_tres', 100)->nullable();
            $table->string('resistencia_corregida_muestra_cuatro', 100)->nullable();
            $table->string('velocidad_ensayo_muestra_uno', 100)->nullable();
            $table->string('velocidad_ensayo_muestra_dos', 100)->nullable();
            $table->string('velocidad_ensayo_muestra_tres', 100)->nullable();
            $table->string('velocidad_ensayo_muestra_cuatro', 100)->nullable();
            $table->string('tipo_rotura_muestra_uno', 100)->nullable();
            $table->string('tipo_rotura_muestra_dos', 100)->nullable();
            $table->string('tipo_rotura_muestra_tres', 100)->nullable();
            $table->string('tipo_rotura_muestra_cuatro', 100)->nullable();
            $table->string('aseguramiento_muestra_uno', 100)->nullable();
            $table->string('aseguramiento_muestra_dos', 100)->nullable();
            $table->string('aseguramiento_muestra_tres', 100)->nullable();
            $table->string('aseguramiento_muestra_cuatro', 100)->nullable();
            $table->string('cumple_muestra_uno', 100)->nullable();
            $table->string('cumple_muestra_dos', 100)->nullable();
            $table->string('cumple_muestra_tres', 100)->nullable();
            $table->string('cumple_muestra_cuatro', 100)->nullable();
            $table->string('velocidad_muestra_uno', 100)->nullable();
            $table->string('velocidad_muestra_dos', 100)->nullable();
            $table->string('velocidad_muestra_tres', 100)->nullable();
            $table->string('velocidad_muestra_cuatro', 100)->nullable();
            $table->string('observaciones', 100)->nullable();
            $table->string('ensayado_por', 100)->nullable();
            $table->string('fecha', 100)->nullable();
            $table->string('vb', 100)->nullable();

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
        Schema::dropIfExists('ensayo_probetas_hormigon');
    }
}
