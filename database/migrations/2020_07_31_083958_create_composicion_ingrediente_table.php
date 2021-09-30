<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComposicionIngredienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('composicione_ingrediente', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('composicione_id')->constrained('composiciones');
            $table->foreignId('ingrediente_id')->constrained('ingredientes');
            $table->decimal('cantidad', 10, 3);
            $table->string('unidad_medida',20);
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
        Schema::dropIfExists('composicione_ingrediente');
    }
}
