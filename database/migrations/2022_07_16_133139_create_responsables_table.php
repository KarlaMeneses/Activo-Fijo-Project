<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsables', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('empleado');
            $table->string('cargo');
            $table->string('estado')->default('Firmado');
            $table->date('fecha');

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->on('users')->references('id')->onDelete('cascade');

            $table->unsignedBigInteger('id_ubicacion')->nullable();
            $table->foreign('id_ubicacion')->on('ubicacion')->references('id')->onDelete('cascade');
            $table->timestamps();
        });
    }
    /*
- informe basico de los activos fijos a entregar ppor
nro
descripcion del activo
estado


-inforacion basia de los activos fijo parte del empleado
activo
detalle
valor

firma funcionario responsable

recibi conforme
/*

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsables');
    }
}
