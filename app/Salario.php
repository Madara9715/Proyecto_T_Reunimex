<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salario extends Model
{
    protected $table ='salarios';

    protected $fillable = [
        'empleado_id', 'monto' , 'activo',
    ];

    public function esActivo(){
        if($this->activo==1){
            return true;
          }
          return false;
    }
    
    public function empleado(){
        return $this->belongsTo('App\Empleado');
    }
    
}
