<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
     protected $table='entregas';

    protected $primaryKey='identrega';

    public $timestamps=false;


    protected $fillable =[
    	'idempleado',
    	'codigo',
    	'administrador',
    	'fecha',
    	'estado',
        ];

    protected $guarded =[

    ];
}
