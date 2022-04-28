<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            //nota compra
            $table->integer('unidad');
            $table->string('concepto');
            $table->integer('precio_uni');
            $table->integer('importe');
            $table->string('condicion_pago');
            $table->date('fecha_envio');
            $table->date('fecha_entrega');
            $table->String('lugar_entrega');
            //nota venta
            $table->integer('nro_egreso');
            $table->string('almacen');
            $table->string('entregado_a');
            $table->unsignedBigInteger('id_responsable');
            $table->string('orden');
            $table->foreign('id_responsable')->on('users')->references('id')->onDelete('cascade');
            
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
        Schema::dropIfExists('notas');
    }
}
