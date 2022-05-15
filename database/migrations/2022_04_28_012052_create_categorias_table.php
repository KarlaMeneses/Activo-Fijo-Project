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
            $table->string('tipo_activo')->nullable();; //tipo de activo tangible,inttangible y inversion
            $table->string('cacateristica')->nullable();; //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
            $table->integer('vida_util')->nullable(); //años de vida de un activo 
            $table->integer('valor_residual')->nullable(); //% de vida del activo fijo
            //$table->string('id_depreciacion');
            //$table->string('valor_residual');
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
