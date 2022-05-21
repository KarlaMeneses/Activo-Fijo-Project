<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivosfijoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activosfijo', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->nullable();
            $table->string('detalle')->nullable();
          //  $table->string('costo')->nullable();
            $table->date('fecha')->nullable();
            $table->string('estado')->nullable();
          /*  $table->unsignedBigInteger('id_ubicacion');
            $table->foreign('id_ubicacion')->on('ubicaciones')->references('id')->onDelete('cascade');
            
            $table->unsignedBigInteger('id_factura');
            $table->foreign('id_factura')->on('facturas')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')->on('categorias')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('id_ubicacion');
            $table->foreign('id_ubicacion')->on('ubicaciones')->references('id')->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activosfijo');
    }
}
