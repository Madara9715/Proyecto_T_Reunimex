<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table ='productos';

    protected $fillable = [
        'clave','categoriaproducto_id','nombre_producto','descripcion','imagen','tipoproducto_id','proveedore_id','marca_id','activo',
        'imagen','tipoproducto_id','proveedore_id','marca_id','activo',
    ];

    public function esActivo(){
        if($this->activo==1){
            return true;
          }
          return false;
    }
    
    public function tipoproducto(){
        return $this->belongsTo('App\Tipoproducto');
    }

    public function presentaciones(){
        return $this->belongsToMany('App\Presentacione')
        ->using('App\PresentacioneProducto')
        ->withTimestamps()
        ->withPivot('id','cantidad','unidad','precio_adquisicion','descuento_id','precio_publico','precio_distribuidor', 'activo');
    }

    public function categoriaproducto(){
        return $this->belongsTo('App\Categoriaproducto');
    }

    public function proveedore(){
        return $this->belongsTo('App\Proveedore');
    }

    public function marca(){
        return $this->belongsTo('App\Marca');
    }

    public function composicion (){
        return $this->hasOne('App\Composicione');
    }


    public function almacenes(){
        return $this->belongsToMany('App\Almacene')
        ->using('App\AlmaceneProducto')
        ->withTimestamps()
        ->withPivot('stock');
    }

    public function inventarios(){
        return $this->belongsToMany('App\Inventario')
        ->using('App\InventarioProducto')
        ->withPivot('presentacione_id','presentacioneproducto_id' ,'stock','status')
        ->withTimestamps();
    }

    public function ventas(){
        return $this->belongsToMany('App\Venta')
        ->using('App\ProductoVenta')
        ->withPivot('cantidad','importe','descuento_id','total_importe');
    }

    public function pedidos(){
        return $this->belongsToMany('App\Pedido')
        ->using('App\PedidoProducto')
        ->withPivot('cantidad','subtotal');
    }

    public function movimientos(){
        return $this->belongsToMany('App\Movimiento')
        ->using('App\MovimientoProducto')
        ->withPivot('cantidad');
    } 
    
    protected static function boot()
    {
        parent::boot();
        self::created(function($newpro){
            if (($newpro->id) > 1000) {
                $newpro->update([
                    'clave' => 'P-' . $newpro->id,
                ]);
            }else if (($newpro->id) > 100) {
                $newpro->update([
                    'clave' => 'P-0' . $newpro->id,
                ]);
            } else if (($newpro->id) > 10) {
                $newpro->update([
                    'clave' => 'P-00' . $newpro->id,
                ]);
            }  
            else {
                $newpro->update([
                    'clave' => 'P-000' . $newpro->id,
                ]);
            }
        });
    }

}
