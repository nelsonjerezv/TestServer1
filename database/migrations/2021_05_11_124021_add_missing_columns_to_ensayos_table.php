<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMissingColumnsToEnsayosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ensayo_probetas_hormigon', function (Blueprint $table) {
            $table->string('error_cientocincuenta_mm', 75)->nullable();
            $table->string('refrentado_uno', 75)->nullable();
            $table->string('refrentado_dos', 75)->nullable();
            $table->string('refrentado_tres', 75)->nullable();
            $table->string('refrentado_cuatro', 75)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ensayo_probetas_hormigon', function (Blueprint $table) {
            $table->dropColumn(['error_cientocincuenta_mm', 'refrentado_uno', 'refrentado_dos', 'refrentado_tres', 'refrentado_cuatro']);
        });
    }
}
