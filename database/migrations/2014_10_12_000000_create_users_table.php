<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*MIGRATIONS CreateUsersTable POR DEFECTO 
    por convension seguir el siguiente formato...
    PHP ARTISAN MAKE:MIGRATION create_nombres_table
*/

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('foto')->nullable();
            $table->string('sexo')->nullable();
            $table->integer('edad')->nullable();
            $table->string('cargo')->nullable(); // Se debe borrar
            $table->string('direccion')->nullable();
            $table->integer('telefono')->nullable();
           // $table->string('rol')->nullable(); // por borrar
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            /* $table->unsignedBigInteger('idempresa')->nullable();
            $table->foreign('idempresa')->on('empresa')->references('id')->onDelete('cascade'); */
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
