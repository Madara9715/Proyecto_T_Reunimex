<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('clave',15)->unique()->nullable();
            $table->string('nombre_proveedor',200);
            $table->string('contacto',250);
            $table->bigInteger('telefono_fijo')->nullable();
            $table->bigInteger('telefono_movil')->nullable();
            $table->string('direccion',200);
            $table->string('correo_electronico',200)->nullable();
            $table->string('pagina',250)->nullable();
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
        Schema::dropIfExists('proveedores');
    }
}
