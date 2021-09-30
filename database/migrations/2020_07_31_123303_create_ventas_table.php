<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('folio', 100)->unique();
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->foreignId('empleado_id')->constrained('empleados');
            $table->foreignId('tipoventa_id')->constrained('tipoventas');
            $table->foreignId('tipopago_id')->constrained('tipopagos');
            $table->foreignId('descuento_id')->constrained('descuentos')->nullable();
            $table->double('subtotal_venta', 30, 3)->nullable();
            $table->double('total_venta', 30, 3)->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
            $table->tinyInteger('activo')->default(1);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
