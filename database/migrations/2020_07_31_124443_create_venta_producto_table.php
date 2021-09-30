<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_venta', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('venta_id')->constrained('ventas');
            $table->foreignId('producto_id')->constrained('productos');
            $table->foreignId('presentacione_id')->constrained('presentaciones');
            $table->foreignId('presentacioneproducto_id')->constrained('presentacione_producto');
            $table->integer('cantidad');
            $table->double('importe', 20, 3)->nullable();
            $table->foreignId('descuento_id')->constrained('descuentos')->nullable();
            $table->double('total_importe', 20, 3)->nullable();
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
        Schema::dropIfExists('producto_venta');
    }
}
