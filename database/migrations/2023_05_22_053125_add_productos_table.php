<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('presentacion');
            $table->boolean('estado')->default(false);
            $table->integer('stock')->default(null)->nullable();
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('distribuidora_id');

            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('distribuidora_id')->references('id')->on('distribuidoras');
            $table->string('imagen')->default(null)->nullable();

            $table->timestamps();
        });      }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
