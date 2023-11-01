<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDistribuidorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribuidoras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('correo');
            $table->string('direccion');

            $table->integer('estado')->default(null)->nullable();
            $table->integer('formato_menu')->default(null)->nullable();
            $table->string('plan')->default(null)->nullable();
            $table->string('razon_social')->default(null)->nullable();
          
            $table->string('logo')->default(null)->nullable();

            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
  

    }
}
