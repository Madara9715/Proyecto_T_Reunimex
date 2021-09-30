<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedore extends Model
{
    protected $table ='proveedores';

    protected $fillable = [
        'clave','nombre_proveedor','contacto','telefono_fijo','telefono_movil','direccion','correo_electronico','pagina','activo',
    ];

    public function esActivo(){
        if($this->activo==1){
            return true;
          }
          return false;
    }
    
    public function marcas(){
        return $this->belongsToMany('App\Marca')
        ->using('App\MarcaProveedore')
        ->withTimestamps();
    }

    public function productos (){
        return $this->hasMany('App\Producto');
    }

    public function direcciones()
    {
        return $this->morphMany('App\Direccione','direccionable');
    }
}
