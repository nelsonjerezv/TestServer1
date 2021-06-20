<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsRetiroMuestraPersonDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orden_trabajo_terreno', function (Blueprint $table) {
            $table->string('encargado_retiro_muestras', 75)->nullable();
            $table->string('fecha_retiro_muestras', 75)->nullable();
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
            $table->dropColumn(['encargado_retiro_muestras', 'fecha_retiro_muestras']);
        });
    }
}
