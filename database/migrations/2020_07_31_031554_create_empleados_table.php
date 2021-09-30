<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('tipoempleado_id')->constrained('tipoempleados');
            $table->foreignId('departamento_id')->constrained('departamentos');
            $table->string('clave',15)->unique()->nullable();
            $table->string('nombre_empleado',50);
            $table->string('apellido_p',50);
            $table->string('apellido_m',50);
            $table->bigInteger('telefono_fijo')->nullable();
            $table->bigInteger('telefono_movil')->nullable();
            $table->string('direccion',200);
            $table->string('correo_electronico',200)->nullable()->unique();
            $table->date('fecha_nacimiento')->nullable();
            $table->tinyInteger('edad');
            $table->tinyInteger('sexo');
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('empleados');
    }
}
