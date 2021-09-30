<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MarcaProveedore extends Pivot
{
    protected $table ='marca_proveedore';
    protected $fillable = [
        'proveedor_id','marca_id','activo',
    ];

    public function esActivo(){
        if($this->activo==1){
            return true;
          }
          return false;
    }
}
