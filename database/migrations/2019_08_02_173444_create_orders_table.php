<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->date('fechaImpresion');
            $table->bigInteger('numero');
            $table->bigInteger('monto_s');
            $table->bigInteger('monto_a');
            $table->text('obs')->nullable();
            $table->string('estado');
            $table->string('lugarEmision');
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
        Schema::dropIfExists('orders');
    }
}
