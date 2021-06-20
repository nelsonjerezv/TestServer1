<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsSeccionHormigonSeccionMortero extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orden_trabajo_terreno', function (Blueprint $table) {
            $table->string('seccion_hormigon_habilitada', 75)->nullable();
            $table->string('seccion_mortero_habilitada', 75)->nullable();
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
            $table->dropColumn(['seccion_hormigon_habilitada', 'seccion_mortero_habilitada']);
        });
    }
}
