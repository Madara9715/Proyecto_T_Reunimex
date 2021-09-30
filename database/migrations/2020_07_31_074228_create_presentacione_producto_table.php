<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresentacioneProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presentacione_producto', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('producto_id')->constrained('productos');
            $table->foreignId('presentacione_id')->constrained('presentaciones');
            $table->decimal('cantidad', 10, 3);
            $table->string('unidad',15);
            $table->double('precio_adquisicion', 15, 3)->nullable();
            $table->foreignId('descuento_id')->constrained('descuentos')->nullable();
            $table->double('precio_publico', 15, 3);
            $table->double('precio_distribuidor', 15, 3);
            $table->tinyInteger('activo')->default(1);
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
        Schema::dropIfExists('presentacione_producto');
    }
}
