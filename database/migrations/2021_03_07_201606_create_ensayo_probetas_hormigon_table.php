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
            $table->string('validado', 10);
            $table->string('num_ingreso', 75)->nullable();
            $table->string('ott', 75)->nullable();
            $table->string('num_informe', 75)->unique();
            $table->string('camara_humeda', 75)->nullable();
            $table->string('piscina', 75)->nullable();
            $table->string('balanza', 75)->nullable();
            $table->string('num_pie_de_metro', 75)->nullable();
            $table->string('num_prensa', 75)->nullable();
            $table->string('num_cronometro', 75)->nullable();
            $table->string('error_trescientos_mm', 75)->nullable();
            $table->string('num_marmita', 75)->nullable();
            $table->string('num_dispositivo_refrentado', 75)->nullable();
            $table->string('num_micrometro', 75)->nullable();
            $table->string('num_molde_muestra_uno', 75)->nullable();
            $table->string('num_molde_muestra_dos', 75)->nullable();
            $table->string('num_molde_muestra_tres', 75)->nullable();
            $table->string('num_molde_muestra_cuatro', 75)->nullable();
            $table->string('fecha_confeccion_muestra_uno', 75)->nullable();
            $table->string('fecha_confeccion_muestra_dos', 75)->nullable();
            $table->string('fecha_confeccion_muestra_tres', 75)->nullable();
            $table->string('fecha_confeccion_muestra_cuatro', 75)->nullable();
            $table->string('fecha_ensayo_muestra_uno', 75)->nullable();
            $table->string('fecha_ensayo_muestra_dos', 75)->nullable();
            $table->string('fecha_ensayo_muestra_tres', 75)->nullable();
            $table->string('fecha_ensayo_muestra_cuatro', 75)->nullable();
            $table->string('edad_dias_muestra_uno', 75)->nullable();
            $table->string('edad_dias_muestra_dos', 75)->nullable();
            $table->string('edad_dias_muestra_tres', 75)->nullable();
            $table->string('edad_dias_muestra_cuatro', 75)->nullable();
            $table->string('refrentado_muestra_uno', 75)->nullable();
            $table->string('refrentado_muestra_dos', 75)->nullable();
            $table->string('refrentado_muestra_tres', 75)->nullable();
            $table->string('refrentado_muestra_cuatro', 75)->nullable();
            $table->string('refrentado_corregido_muestra_uno', 75)->nullable();
            $table->string('refrentado_corregido_muestra_dos', 75)->nullable();
            $table->string('refrentado_corregido_muestra_tres', 75)->nullable();
            $table->string('refrentado_corregido_muestra_cuatro', 75)->nullable();
            $table->string('perpendicularidad_muestra_uno', 75)->nullable();
            $table->string('perpendicularidad_muestra_dos', 75)->nullable();
            $table->string('perpendicularidad_muestra_tres', 75)->nullable();
            $table->string('perpendicularidad_muestra_cuatro', 75)->nullable();
            $table->string('planeidad_muestra_uno', 75)->nullable();
            $table->string('planeidad_muestra_dos', 75)->nullable();
            $table->string('planeidad_muestra_tres', 75)->nullable();
            $table->string('planeidad_muestra_cuatro', 75)->nullable();
            $table->string('espesor_superior_muestra_uno', 75)->nullable();
            $table->string('espesor_superior_muestra_dos', 75)->nullable();
            $table->string('espesor_superior_muestra_tres', 75)->nullable();
            $table->string('espesor_superior_muestra_cuatro', 75)->nullable();
            $table->string('espesor_inferior_muestra_uno', 75)->nullable();
            $table->string('espesor_inferior_muestra_dos', 75)->nullable();
            $table->string('espesor_inferior_muestra_tres', 75)->nullable();
            $table->string('espesor_inferior_muestra_cuatro', 75)->nullable();
            $table->string('espesor_promedio_muestra_uno', 75)->nullable();
            $table->string('espesor_promedio_muestra_dos', 75)->nullable();
            $table->string('espesor_promedio_muestra_tres', 75)->nullable();
            $table->string('espesor_promedio_muestra_cuatro', 75)->nullable();
            $table->string('d_uno_muestra_uno', 75)->nullable();
            $table->string('d_uno_muestra_dos', 75)->nullable();
            $table->string('d_uno_muestra_tres', 75)->nullable();
            $table->string('d_uno_muestra_cuatro', 75)->nullable();
            $table->string('d_dos_muestra_uno', 75)->nullable();
            $table->string('d_dos_muestra_dos', 75)->nullable();
            $table->string('d_dos_muestra_tres', 75)->nullable();
            $table->string('d_dos_muestra_cuatro', 75)->nullable();
            $table->string('h_uno_muestra_uno', 75)->nullable();
            $table->string('h_uno_muestra_dos', 75)->nullable();
            $table->string('h_uno_muestra_tres', 75)->nullable();
            $table->string('h_uno_muestra_cuatro', 75)->nullable();
            $table->string('h_dos_muestra_uno', 75)->nullable();
            $table->string('h_dos_muestra_dos', 75)->nullable();
            $table->string('h_dos_muestra_tres', 75)->nullable();
            $table->string('h_dos_muestra_cuatro', 75)->nullable();
            $table->string('d_uno_muestra_uno_corregida', 75)->nullable();
            $table->string('d_uno_muestra_dos_corregida', 75)->nullable();
            $table->string('d_uno_muestra_tres_corregida', 75)->nullable();
            $table->string('d_uno_muestra_cuatro_corregida', 75)->nullable();
            $table->string('d_dos_muestra_uno_corregida', 75)->nullable();
            $table->string('d_dos_muestra_dos_corregida', 75)->nullable();
            $table->string('d_dos_muestra_tres_corregida', 75)->nullable();
            $table->string('d_dos_muestra_cuatro_corregida', 75)->nullable();
            $table->string('h_uno_muestra_uno_corregida', 75)->nullable();
            $table->string('h_uno_muestra_dos_corregida', 75)->nullable();
            $table->string('h_uno_muestra_tres_corregida', 75)->nullable();
            $table->string('h_uno_muestra_cuatro_corregida', 75)->nullable();
            $table->string('h_dos_muestra_uno_corregida', 75)->nullable();
            $table->string('h_dos_muestra_dos_corregida', 75)->nullable();
            $table->string('h_dos_muestra_tres_corregida', 75)->nullable();
            $table->string('h_dos_muestra_cuatro_corregida', 75)->nullable();
            $table->string('masa_muestra_uno', 75)->nullable();
            $table->string('masa_muestra_dos', 75)->nullable();
            $table->string('masa_muestra_tres', 75)->nullable();
            $table->string('masa_muestra_cuatro', 75)->nullable();
            $table->string('error_muestra_uno', 75)->nullable();
            $table->string('error_muestra_dos', 75)->nullable();
            $table->string('error_muestra_tres', 75)->nullable();
            $table->string('error_muestra_cuatro', 75)->nullable();
            $table->string('masa_corregida_muestra_uno', 75)->nullable();
            $table->string('masa_corregida_muestra_dos', 75)->nullable();
            $table->string('masa_corregida_muestra_tres', 75)->nullable();
            $table->string('masa_corregida_muestra_cuatro', 75)->nullable();
            $table->string('volumen_muestra_uno', 75)->nullable();
            $table->string('volumen_muestra_dos', 75)->nullable();
            $table->string('volumen_muestra_tres', 75)->nullable();
            $table->string('volumen_muestra_cuatro', 75)->nullable();
            $table->string('volumen_metro_cubico_muestra_uno', 75)->nullable();
            $table->string('volumen_metro_cubico_muestra_dos', 75)->nullable();
            $table->string('volumen_metro_cubico_muestra_tres', 75)->nullable();
            $table->string('volumen_metro_cubico_muestra_cuatro', 75)->nullable();
            $table->string('densidad_muestra_uno', 75)->nullable();
            $table->string('densidad_muestra_dos', 75)->nullable();
            $table->string('densidad_muestra_tres', 75)->nullable();
            $table->string('densidad_muestra_cuatro', 75)->nullable();
            $table->string('area_muestra_uno', 75)->nullable();
            $table->string('area_muestra_dos', 75)->nullable();
            $table->string('area_muestra_tres', 75)->nullable();
            $table->string('area_muestra_cuatro', 75)->nullable();
            $table->string('carga_ensayo_muestra_uno', 75)->nullable();
            $table->string('carga_ensayo_muestra_dos', 75)->nullable();
            $table->string('carga_ensayo_muestra_tres', 75)->nullable();
            $table->string('carga_ensayo_muestra_cuatro', 75)->nullable();
            $table->string('carga_ensayo_mil_muestra_uno', 75)->nullable();
            $table->string('carga_ensayo_mil_muestra_dos', 75)->nullable();
            $table->string('carga_ensayo_mil_muestra_tres', 75)->nullable();
            $table->string('carga_ensayo_mil_muestra_cuatro', 75)->nullable();
            $table->string('tiempo_carga_muestra_uno', 75)->nullable();
            $table->string('tiempo_carga_muestra_dos', 75)->nullable();
            $table->string('tiempo_carga_muestra_tres', 75)->nullable();
            $table->string('tiempo_carga_muestra_cuatro', 75)->nullable();
            $table->string('resistencia_compresion_muestra_uno', 75)->nullable();
            $table->string('resistencia_compresion_muestra_dos', 75)->nullable();
            $table->string('resistencia_compresion_muestra_tres', 75)->nullable();
            $table->string('resistencia_compresion_muestra_cuatro', 75)->nullable();
            $table->string('factores_conversion_muestra_uno', 75)->nullable();
            $table->string('factores_conversion_muestra_dos', 75)->nullable();
            $table->string('factores_conversion_muestra_tres', 75)->nullable();
            $table->string('factores_conversion_muestra_cuatro', 75)->nullable();
            $table->string('resistencia_corregida_muestra_uno', 75)->nullable();
            $table->string('resistencia_corregida_muestra_dos', 75)->nullable();
            $table->string('resistencia_corregida_muestra_tres', 75)->nullable();
            $table->string('resistencia_corregida_muestra_cuatro', 75)->nullable();
            $table->string('velocidad_ensayo_muestra_uno', 75)->nullable();
            $table->string('velocidad_ensayo_muestra_dos', 75)->nullable();
            $table->string('velocidad_ensayo_muestra_tres', 75)->nullable();
            $table->string('velocidad_ensayo_muestra_cuatro', 75)->nullable();
            $table->string('tipo_rotura_muestra_uno', 75)->nullable();
            $table->string('tipo_rotura_muestra_dos', 75)->nullable();
            $table->string('tipo_rotura_muestra_tres', 75)->nullable();
            $table->string('tipo_rotura_muestra_cuatro', 75)->nullable();
            $table->string('aseguramiento_muestra_uno', 75)->nullable();
            $table->string('aseguramiento_muestra_dos', 75)->nullable();
            $table->string('aseguramiento_muestra_tres', 75)->nullable();
            $table->string('aseguramiento_muestra_cuatro', 75)->nullable();
            $table->string('cumple_muestra_uno', 75)->nullable();
            $table->string('cumple_muestra_dos', 75)->nullable();
            $table->string('cumple_muestra_tres', 75)->nullable();
            $table->string('cumple_muestra_cuatro', 75)->nullable();
            $table->string('velocidad_muestra_uno', 75)->nullable();
            $table->string('velocidad_muestra_dos', 75)->nullable();
            $table->string('velocidad_muestra_tres', 75)->nullable();
            $table->string('velocidad_muestra_cuatro', 75)->nullable();
            $table->string('observaciones', 75)->nullable();
            $table->string('ensayado_por', 75)->nullable();
            $table->string('fecha', 75)->nullable();
            $table->string('vb', 75)->nullable();

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
