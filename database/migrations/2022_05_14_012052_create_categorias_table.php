<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();; //bienes de cuenta contable nombre de la cuenta (contabilidad)
            $table->string('descripcion')->nullable();; ////descripción de la cuenta terreno,edificio etc
            $table->string('estado')->nullable(); //% de vida del activo fijo
            $table->unsignedBigInteger('id_depreciacion');
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
        Schema::dropIfExists('categorias');
    }
}
