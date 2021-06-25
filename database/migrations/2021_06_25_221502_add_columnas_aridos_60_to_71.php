<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnasAridos60To71 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orden_trabajo_terreno', function (Blueprint $table) {
            $table->string('ensayos_aceptacion_aridos', 50)->nullable();
            $table->string('ensayos_dosificacion_hormigon', 50)->nullable();
            $table->string('ensayos_sin_probetas_prueba', 50)->nullable();
            $table->string('ensayos_con_probetas_prueba', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orden_trabajo_terreno', function (Blueprint $table) {
            $table->dropColumn(['ensayos_aceptacion_aridos', 'ensayos_dosificacion_hormigon', 'ensayos_sin_probetas_prueba', 'ensayos_con_probetas_prueba']);
        });
    }
}
