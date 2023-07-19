<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDistribuidoraIdToCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categorias', function (Blueprint $table) {
            $table->dropColumn('imagen');

            $table->unsignedBigInteger('distribuidora_id')->nullable()->after('id');
            $table->foreign('distribuidora_id')->references('id')->on('distribuidoras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categorias', function (Blueprint $table) {
            $table->dropForeign(['distribuidora_id']);
            $table->dropColumn('distribuidora_id');
        });
    }
}
