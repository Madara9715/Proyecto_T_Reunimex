<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacenes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('clave', 5)->unique()->nullable();
            $table->string('nombre_almacen',100);
            $table->text('detalles')->nullable();
            $table->bigInteger('telefono_fijo')->nullable();
            $table->string('direccion',200)->nullable();
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
        Schema::dropIfExists('almacenes');
    }
}
