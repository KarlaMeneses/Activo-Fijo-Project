<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevalorizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revalorizacion', function (Blueprint $table) {
            $table->id();
            $table->string('tiempo_vida')->nullable();
            $table->decimal('valor')->default(0);
            $table->decimal('costo_revaluo')->default(0);
            $table->string('estado')->default("En espera");
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('id_activo');
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
        Schema::dropIfExists('revalorizacion');
    }
}
