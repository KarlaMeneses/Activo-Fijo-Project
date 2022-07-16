<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
            /*
¿Qué me dice el Decreto Supremo DS 24051 en su artículo 22?
22 del DS 24051, dispone que los bienes del activo fijo comenzarán a depreciarse impositivamente desde el momento en que se inicie su utilización y uso, para lo cual se entiende ya
 debieron estar previamente registrados o activados”.
            */
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
            $table->integer('año')->nullable(); 
            $table->integer('valor')->nullable(); 
            $table->integer('d_acumulada')->default("0");
            $table->unsignedBigInteger('id_activo')->nullable();
            $table->foreign('id_activo')->on('activosfijo')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('depreciaciones');
    }
}
