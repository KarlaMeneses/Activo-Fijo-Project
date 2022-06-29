<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantenimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->string('problema');
            $table->string('proveedor');
            $table->string('tiempo');
            $table->float('costo');
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            $table->date('fecha_aprox');
            $table->string('solucion');
            $table->string('estado');
            $table->unsignedBigInteger('id_activo');
            $table->foreign('id_activo')->on('activosfijo')->references('id')->onDelete('cascade');          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mantenimientos');
    }
}
