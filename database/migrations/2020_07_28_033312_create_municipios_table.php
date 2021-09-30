<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('clave', 15)->nullable();
            $table->string('nombre_municipio', 100);
            $table->tinyInteger('activo')->default(1);
            $table->foreignId('estado_id')->constrained('estados');
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
        Schema::dropIfExists('municipios');
    }
}
