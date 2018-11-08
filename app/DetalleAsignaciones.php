<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class DetalleAsignaciones extends Model
{
   protected $table='detalle_entrega';

    protected $primaryKey='iddetalle_entrega';

    public $timestamps=false;


    protected $fillable =[
    	
    	'identrega',
    	'idarticulo',
    	'cantidad'

            ];

    protected $guarded =[

    ];
}
