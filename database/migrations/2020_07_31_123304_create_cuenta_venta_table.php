<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deudas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('cuenta_id')->constrained('cuentas');
            $table->foreignId('venta_id')->constrained('ventas');
            $table->string('folio', 50)->unique();
            $table->double('valor_total', 30, 3)->nullable();
            $table->double('monto_abonado', 30, 3)->nullable();
            $table->double('monto_restante', 30, 3)->nullable();
            $table->double('valor_interes', 30, 3)->nullable();
            $table->dateTime('fecha_limite', 0)->nullable();
            $table->timestamps();
            $table->dateTime('fecha_liquidado', 0)->nullable();
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
        Schema::dropIfExists('deudas');
    }
}
