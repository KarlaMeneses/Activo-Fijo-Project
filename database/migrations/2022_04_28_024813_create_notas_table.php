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
            $table->string('proveedor')->nullable();
            $table->string('direccion')->nullable();
            $table->integer('telefono')->nullable();
            $table->decimal('totales')->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->string('foto')->nullable();

            //detalles de la compra.   (foto de la nota compra)
/*         

            //DETALLES EXTRAS QUIZAS NECESARIO
            $table->string('condicion_pago')->nullable();
            $table->date('fecha_envio')->nullable();
            $table->string('lugar_entrega')->nullable();
*/

            //nota venta
            $table->integer('nro_egreso')->nullable();
            $table->string('almacen')->nullable();
            $table->string('entregado_a')->nullable();
            $table->unsignedBigInteger('id_responsable')->nullable();
            $table->string('orden')->nullable();
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
