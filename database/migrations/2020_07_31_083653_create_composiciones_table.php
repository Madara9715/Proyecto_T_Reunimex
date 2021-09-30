<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComposicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('composiciones', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('producto_id')->constrained('productos');
            $table->foreignId('presentacione_id')->constrained('presentaciones');
            $table->foreignId('presentacioneproducto_id')->constrained('presentacione_producto');
            $table->string('clave', 20)->unique()->nullable();
            $table->text('descripcion')->nullable();
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
        Schema::dropIfExists('composiciones');
    }
}
