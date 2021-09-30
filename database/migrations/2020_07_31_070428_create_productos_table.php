<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('clave', 15)->unique();
            $table->foreignId('categoriaproducto_id')->constrained('categoriaproductos');
            $table->string('nombre_producto',100);
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable(); 
            $table->foreignId('tipoproducto_id')->constrained('tipoproductos');
            $table->foreignId('proveedore_id')->constrained('proveedores')->nullable();
            $table->foreignId('marca_id')->constrained('marcas')->nullable();
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
        Schema::dropIfExists('productos');
    }
}
