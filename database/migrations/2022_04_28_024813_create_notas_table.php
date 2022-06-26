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
            $table->string('codigo')->nullable();
            $table->integer('ayuda')->nullable();
            //NOTA COMPRA
            $table->string('proveedor')->nullable();
            $table->string('direccion')->nullable();
            $table->integer('telefono')->nullable();
            $table->decimal('totales')->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->string('foto')->nullable();
            $table->string('tipo')->nullable();
            //NOTA VENTA
            $table->string('adquirente')->nullable();
            $table->date('fecha_venta')->nullable();
            $table->string('encargado')->nullable();
            $table->string('cargo')->nullable();
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
