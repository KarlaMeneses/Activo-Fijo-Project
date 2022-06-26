<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoliActivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soli_activo', function (Blueprint $table) {
            $table->id();
            $table->string('item');
            $table->string('unidad');
            $table->integer('cantidad');
            $table->unsignedBigInteger('id_sol');
            $table->foreign('id_sol')->on('solicitud')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('soli_activo');
    }
}
