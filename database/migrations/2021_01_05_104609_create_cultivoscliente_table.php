<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCultivosclienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cultivoscliente', function (Blueprint $table) {
            //
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('ruta_id')->constrained('ruta');
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->date('fecha_siembra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cultivoscliente');
    }
}
