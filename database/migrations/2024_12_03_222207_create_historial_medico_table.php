<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialMedicoTable extends Migration
{
    public function up()
    {
        Schema::create('historial_medico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mascota_id');
            $table->string('diagnostico');
            $table->text('tratamiento')->nullable();
            $table->string('medicamento')->nullable();
            $table->date('fecha');
            $table->boolean('activo')->default(true);
            $table->timestamps();

            $table->foreign('mascota_id')->references('id')->on('mascotas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial_medico');
    }
}
