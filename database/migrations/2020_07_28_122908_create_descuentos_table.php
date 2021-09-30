<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescuentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descuentos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('clave', 10)->unique()->nullable();
            $table->string('nombre_descuento',100);
            $table->double('porcentaje_descuento', 20, 2)->nullable();
            $table->double('valor_descuento', 20, 3)->nullable();
            $table->string('descripcion',250)->nullable();
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
        Schema::dropIfExists('descuentos');
    }
}
