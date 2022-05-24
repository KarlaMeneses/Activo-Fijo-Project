<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallefacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallefactura', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->string('articulo');
            $table->decimal('valor_unitario')->nullable();
            $table->decimal('valor_total')->nullable();
            $table->decimal('descuento')->nullable();
            $table->string('codigo')->nullable();
            $table->unsignedBigInteger('idfactura');
            $table->foreign('idfactura')->on('facturas')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('detallefactura');
    }
}
