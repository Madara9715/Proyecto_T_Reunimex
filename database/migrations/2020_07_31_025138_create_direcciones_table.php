<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('estado_id')->constrained('estados');
            $table->foreignId('municipio_id')->constrained('municipios');
            $table->string('localidad',250)->nullable();
            $table->integer('codigo_postal')->nullable();
            $table->string('colonia',200)->nullable();
            $table->string('calle',200)->nullable();
            $table->integer('numero_interno')->nullable();
            $table->integer('numero_externo');
            $table->morphs('direccionable'); 
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
        Schema::dropIfExists('direcciones');
    }
}
