<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFacturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->string('estado')->nullable();
            $table->date('fecha_vencimiento');
            $table->float('total', 8, 2); // Declaración del campo "monto" como flotante con 8 dígitos totales y 2 decimales
            $table->float('total_abonado', 8, 2); // Declaración del campo "monto" como flotante con 8 dígitos totales y 2 decimales
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
        Schema::dropIfExists('facturas');
    }
}
