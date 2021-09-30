<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table ='inventarios';

    protected $fillable = [
        'empleado_id','clave','detalles','activo',
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

    public function productos(){
        return $this->belongsToMany('App\Producto')
        ->using('App\InventarioProducto')
        ->withPivot('presentacione_id','presentacioneproducto_id' ,'stock','stock_restante','status')
        ->withTimestamps();
    }

    public function productosactivos(){
        return $this->belongsToMany('App\Producto')
        ->using('App\InventarioProducto')
        ->withPivot('id','presentacione_id','presentacioneproducto_id','stock','stock_restante','status')
        ->withTimestamps()
        ->wherePivot('status', 1);
    }

    public function productosinactivos(){
        return $this->belongsToMany('App\Producto')
        ->using('App\InventarioProducto')
        ->withPivot('presentacione_id','presentacioneproducto_id' ,'stock','stock_restante','status')
        ->withTimestamps()
        ->wherePivot('status', 0);
    }

    public function origenes()
    {
        return $this->morphMany('App\MOrigen','originable');
    }

    public function destinos()
    {
        return $this->morphMany('App\MDestino','destinable');
    }

    public function presentacioneproductos()
    {
        return $this->belongsToMany('App\PresentacioneProducto','inventario_producto','inventario_id','presentacioneproducto_id','id','id','id')
        ->withPivot('stock','stock_restante')
        ->withTimestamps();
    }

    
    public function presentacioneproductosactiva()
    {
        return $this->belongsToMany('App\PresentacioneProducto','inventario_producto','inventario_id','presentacioneproducto_id','id','id','id')
        ->withPivot('stock','stock_restante','status')
        ->withTimestamps()
        ->wherePivot('status', 1);
    }

    public function presentacioneproductosinactiva()
    {
        return $this->belongsToMany('App\PresentacioneProducto','inventario_producto','inventario_id','presentacioneproducto_id','id','id','id')
        ->withPivot('stock','stock_restante','status')
        ->withTimestamps()
        ->wherePivot('status', 0);
    }

    public function presentaciones()
    {
        return $this->belongsToMany('App\Presentacione','inventario_producto','inventario_id','presentacione_id','id','id','id')
        ->withPivot('stock')
        ->withTimestamps();
    }
    protected static function boot()
    {
        parent::boot();
        self::created(function($newinventario){
            if (($newinventario->id) > 1000) {
                $newinventario->update([
                    'clave' => 'I-' . $newinventario->id,
                ]);
            }else if (($newinventario->id) > 100) {
                $newinventario->update([
                    'clave' => 'I-0' . $newinventario->id,
                ]);
            } else if (($newinventario->id) > 10) {
                $newinventario->update([
                    'clave' => 'I-00' . $newinventario->id,
                ]);
            }  
            else {
                $newinventario->update([
                    'clave' => 'I-000' . $newinventario->id,
                ]);
            }
        });
    }
}

