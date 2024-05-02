<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoLubricacionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('equipo_lubricacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipo_id');
            $table->unsignedBigInteger('lubricacion_id');
            $table->integer('numMuestra');
            $table->integer('dia');
            $table->string('turno');
            $table->string('muestra');
            $table->string('responsables');
          
            $table->timestamps();

            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('lubricacion_id')->references('id')->on('lubricacions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipo_lubricacion');
    }
}
