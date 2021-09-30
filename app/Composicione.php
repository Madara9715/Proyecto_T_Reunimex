<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Composicione extends Model
{
    protected $table ='composiciones';

    protected $fillable = [
        'clave','producto_id', 'descripcion',
    ];

    public function ingredientes(){
        return $this->belongsToMany('App\Ingrediente')
        ->using('App\ComposicioneIngrediente')
        ->withPivot('cantidad','unidad_medida');
    }

    public function producto(){
        return $this->belongsTo('App\Producto');
    }
}
