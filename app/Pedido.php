<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //



      /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pedidos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

    'id_user','id_cliente', 'precio', 'anticipo','observaciones',
        
    ];


      public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
    
      public function user()
    {
        return $this->belongsTo('App\User');
    }

   
    
}

