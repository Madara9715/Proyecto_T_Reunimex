<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ComposicioneIngrediente extends Pivot
{
    protected $table ='composicione_ingrediente';
    protected $fillable = [
        'composicione_id','ingrediente_id','cantidad','unidad_medida',
    ];
}
