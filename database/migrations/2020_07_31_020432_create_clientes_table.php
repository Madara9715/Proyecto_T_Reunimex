<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('tipocliente_id')->constrained('tipoclientes');
            $table->string('clave',15)->unique()->nullable();
            $table->string('nombre_cliente',200);
            $table->string('apellido_p',50)->nullable();
            $table->string('apellido_m',50)->nullable();
            $table->bigInteger('telefono_fijo')->nullable();
            $table->bigInteger('telefono_movil')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
