<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ClienteEmpleado extends Pivot
{
    protected $table ='cliente_empleado';
    protected $fillable = [
        'empleado_id','cliente_id', 'activo',
    ];

    public function esActivo(){
        if($this->activo==1){
            return true;
          }
          return false;
    }
    
}
