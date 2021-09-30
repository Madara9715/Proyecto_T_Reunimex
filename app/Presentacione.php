<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentacione extends Model
{
    protected $table ='presentaciones';
    
    protected $fillable = [
        'id','clave','nombre_presentacionP','detalle',
    ];

    public function productos(){
        return $this->belongsToMany('App\Producto')
        ->using('App\PresentacioneProducto')
        ->withTimestamps()
        ->withPivot('id','cantidad','unidad','precio_adquisicion','descuento_id','precio_publico','precio_distribuidor', 'activo');
    }

}
