<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallenotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallenotas', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->string('nombre')->nullable();
            $table->string('detalle');
            $table->decimal('precio_uni')->nullable();
            $table->decimal('total')->nullable();
            $table->unsignedBigInteger('id_notas');
            $table->foreign('id_notas')->on('notas')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('id_facturas');
            $table->foreign('id_facturas')->on('facturas')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('id_activosfijo')->nullable();
            $table->foreign('id_activosfijo')->on('activosfijo')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('detallenotas');
    }
}
