<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
      protected $table = 'clientes';
          protected $fillable = [
        'nombre','direccion','telefono'
    ];


     public function pedidos()
    {

    
        return $this->hasMany('App\Pedido')->orderby('estado','desc');
    
    }


public function scopeBuscar($query,$nombre){

return $query->where('nombre','like',"%$nombre%");

}

}
