<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    //criterios de filtrado de buscqueda

    public function scopeBuscarpor($query,$tipo,$buscar){

    	if(($tipo) && ($buscar) ){
    		return $query->where("$tipo",'like',"%$buscar%");
    	}

    }

    
    	
    
    
}
