<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('folio', 50)->unique();
            $table->foreignId('empleado_id')->constrained('empleados');
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->text('detalles')->nullable();
            $table->double('valor_pedido', 20, 3)->nullable();
            $table->dateTime('fecha_objetivo', 0)->nullable();
            $table->dateTime('fecha_envio', 0)->nullable();
            $table->timestamps();
            $table->tinyInteger('activo')->default(1);//estadus_pedido
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
