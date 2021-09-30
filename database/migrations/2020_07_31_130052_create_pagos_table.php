<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('deuda_id')->constrained('deudas');
            $table->integer('numero_pago');
            $table->string('folio', 50)->unique();
            $table->foreignId('tipopago_id')->constrained('tipopagos');
            $table->double('saldo_anterior', 30, 3)->nullable();
            $table->double('monto_abonado', 30, 3)->nullable();
            $table->double('saldo_actual', 30, 3)->nullable();
            $table->text('detalles')->nullable();
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
        Schema::dropIfExists('pagos');
    }
}
