<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacunacionesTable extends Migration
{
    public function up()
{
    Schema::create('vacunaciones', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('mascota_id');
        $table->string('vacuna');
        $table->date('fecha_aplicacion');
        $table->integer('dias_siguiente_dosis'); 
        $table->date('fecha_proxima_dosis')->nullable();
        $table->boolean('activo')->default(true); // Borrado lógico
        $table->timestamps();

        $table->foreign('mascota_id')->references('id')->on('mascotas')->onDelete('cascade');
    });
}


    public function down()
    {
        Schema::dropIfExists('vacunaciones');
    }
}

