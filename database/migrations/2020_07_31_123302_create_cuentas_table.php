<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('folio', 50)->unique();
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->double('valor_total', 30, 3)->nullable();
            $table->double('monto_abonado', 30, 3)->nullable();
            $table->double('monto_restante', 30, 3)->nullable();
            $table->double('valor_interes', 30, 3)->nullable();
            $table->timestamps();
            $table->tinyInteger('activo')->default(0);
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuentas');
    }
}
