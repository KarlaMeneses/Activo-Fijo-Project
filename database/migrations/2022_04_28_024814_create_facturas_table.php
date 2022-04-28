<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->string('nit');
            $table->string('ciudad');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('email');
            $table->string('formapago');
            $table->string('cantidad');
            $table->string('vunitario');
            $table->string('vtotal');
            $table->string('tipo');
            $table->string('vendedor')->nullable();
            $table->string('referencia')->nullable();
            $table->string('articulo');
            $table->string('comprador')->nullable();
            $table->string('descripcion');
            $table->unsignedBigInteger('idnota')->nullable();
            $table->foreign('idnota')->on('notas')->references('id')->onDelete('cascade');
            $table->string('valorpagar')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }


// User 
// nit
// regimen
// ciudad
// direccion
// telefono 
// correo electronico 
// forma de pago 

//--compra
// vendedor
// referencia
// articulo y/o servicio
// cantidad
// unitario
//  total a paagar

//---venta
//comprador 
// codigo 
// descripcion
// cantidad
// v/r unitario 
// v/r total 
// valor a pagar

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
