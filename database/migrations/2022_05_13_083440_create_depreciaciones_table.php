<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepreciacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depreciaciones', function (Blueprint $table) {
            $table->id();
            //$table->string('nombre')->nullable();; //bienes de cuenta contable nombre de la cuenta (contabilidad)
            //$table->string('descripcion')->nullable();; ////descripción de la cuenta terreno,edificio etc
            //$table->string('id_categoria')->nullable();; //tipo de activo tangible,inttangible y inversion
            //$table->string('id_vida_util')->nullable();; //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
            //$table->integer('id_tipo_activo')->nullable(); //años de vida de un activo 
            //$table->integer('procesar')->nullable(); //% de vida del activo fijo
            //$table->string('id_depreciacion');
            //$table->string('valor_residual');
            $table->timestamps();
            /*
¿Qué me dice el Decreto Supremo DS 24051 en su artículo 22?
22 del DS 24051, dispone que los bienes del activo fijo comenzarán a depreciarse impositivamente desde el momento en que se inicie su utilización y uso, para lo cual se entiende ya
 debieron estar previamente registrados o activados”.
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('depreciaciones');
    }
}
