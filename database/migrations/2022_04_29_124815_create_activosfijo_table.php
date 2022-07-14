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
            $table->string('d_anual')->nullable();
            $table->string('codigo')->nullable();
            $table->string('foto')->nullable(); //añadi imagen al activo atte:luishiño
            $table->string('nombre')->nullable();
            $table->string('detalle')->nullable();
            $table->string('tipo')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->string('proveedor')->nullable();
            $table->decimal('costo')->nullable();
            $table->decimal('valor_residual')->nullable();
            $table->string('estado')->nullable();
            $table->string('responsable')->default("No asignado");
            $table->unsignedBigInteger('id_ubicacion')->nullable();
            $table->foreign('id_ubicacion')->on('ubicacion')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('id_factura')->nullable();
            $table->foreign('id_factura')->on('facturas')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('id_depreciacion')->nullable();
            $table->foreign('id_depreciacion')->on('depreciaciones')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('activosfijo');
    }
}
