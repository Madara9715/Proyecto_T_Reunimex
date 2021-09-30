<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoempleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipoempleados', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('clave', 4)->unique()->nullable();
            $table->string('nombre_tipoE',30);
            $table->string('descripcion',200)->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipoempleados');
    }
}
