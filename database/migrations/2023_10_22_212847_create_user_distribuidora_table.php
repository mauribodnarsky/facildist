<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

    class CreateUserDistribuidoraTable extends Migration
    {
        public function up()
        {
            Schema::create('user_distribuidora', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('distribuidora_id');
                $table->timestamps();
                // Definición de las claves foráneas
                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('distribuidora_id')->references('id')->on('distribuidoras');
                  });
        }
    
        public function down()
        {
            Schema::dropIfExists('user_distribuidora');
        }
    }