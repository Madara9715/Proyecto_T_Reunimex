<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_producto', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('pedido_id')->constrained('pedidos');
            $table->foreignId('producto_id')->constrained('productos');
            $table->foreignId('presentacione_id')->constrained('presentaciones');
            $table->foreignId('presentacioneproducto_id')->constrained('presentacione_producto');
            $table->integer('cantidad');
            $table->double('subtotal', 20, 3);
            //$table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_producto');
    }
}
