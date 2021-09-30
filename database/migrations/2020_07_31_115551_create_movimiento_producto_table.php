<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientoProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento_producto', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('movimiento_id')->constrained('movimientos');
            $table->foreignId('producto_id')->constrained('productos');
            $table->foreignId('presentacione_id')->constrained('presentaciones');
            $table->foreignId('presentacioneproducto_id')->constrained('presentacione_producto');
            $table->foreignId('operacione_id')->constrained('operaciones');
            $table->integer('cantidad');
            $table->double('valor', 30, 3)->nullable();
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
        Schema::dropIfExists('movimiento_producto');
    }
}
