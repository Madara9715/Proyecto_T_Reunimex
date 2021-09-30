<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarioProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario_producto', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('inventario_id')->constrained('inventarios');
            $table->foreignId('producto_id')->constrained('productos');
            $table->foreignId('presentacione_id')->constrained('presentaciones');
            $table->foreignId('presentacioneproducto_id')->constrained('presentacione_producto');
            $table->integer('stock');
            $table->integer('stock_restante');
            $table->integer('status');
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
        Schema::dropIfExists('inventario_producto');
    }
}
