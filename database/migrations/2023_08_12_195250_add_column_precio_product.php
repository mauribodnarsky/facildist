<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPrecioProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->float('precio_venta_default', 8, 2)->default(0.00); // Campo de precio con valor predeterminado 0.00

        });   
        Schema::table('ventas', function (Blueprint $table) {
            $table->float('precio_venta', 8, 2)->default(0.00); // Campo de precio con valor predeterminado 0.00
        });   
 }

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
