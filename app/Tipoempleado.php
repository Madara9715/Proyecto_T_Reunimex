<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipoempleado extends Model
{
    protected $table ='tipoempleados';
    public $timestamps = false;

    protected $fillable = [
        'clave','nombre_tipoE', 'descripcion',
    ];

    public function empleados (){
        return $this->hasMany('App\Empleado');
    }
}
