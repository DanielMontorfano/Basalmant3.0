<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->date('fechaInicio')->nullable()->after('unidad');  // Añade el campo fechaInicio después del campo unidad
            $table->date('fechaFin')->nullable()->after('fechaInicio'); // Añade el campo fechaInicio después del campo unidad
            $table->integer('duracion')->nullable()->after('fechaFin'); // Añade el campo duracion
            $table->string('pyctoUnidad')->nullable()->after('duracion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('fechaInicio');
            $table->dropColumn('fechaFin');
            $table->dropColumn('duracion');
            $table->dropColumn('pyctoUnidad');
        });
    }
};
