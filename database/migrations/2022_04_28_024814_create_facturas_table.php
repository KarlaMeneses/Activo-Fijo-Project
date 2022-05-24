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
            $table->string('direccion')->nullable();
            $table->string('telefono');
            $table->string('email')->nullable();
            $table->string('formapago');
            $table->date('fechaemitida')->nullable();
            $table->decimal('totaliva')->nullable();
            $table->decimal('iva')->nullable();
            $table->decimal('totalneto')->nullable();
            $table->string('foto')->nullable();
            $table->string('referencia')->nullable();
           
            $table->string('tipo');
            //venta
            $table->unsignedBigInteger('idvendedor')->nullable();
            $table->foreign('idvendedor')->on('users')->references('id')->onDelete('cascade');
            $table->string('comprador')->nullable();

            //compra
            $table->unsignedBigInteger('idcomprador')->nullable();
            $table->foreign('idcomprador')->on('users')->references('id')->onDelete('cascade');
            $table->string('vendedor')->nullable();
         
           
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
