<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveUniquenessFromEnsayosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ensayo_probetas_hormigon', function (Blueprint $table) {
            $table->dropUnique('ensayo_probetas_hormigon_num_informe_unique');
            $table->string('num_informe')->nullable()->change();
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
            $table->string('num_informe', 75)->nullable(false)->unique()->change();
        });
    }
}
