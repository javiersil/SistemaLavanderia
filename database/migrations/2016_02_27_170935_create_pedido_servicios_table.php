<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         //
        Schema::create('pedidos_servicios', function (Blueprint $table) {

            $table->increments('id');
                  
        
            $table->integer('pedido_id');
            $table->integer('servicio_id');
            $table->integer('cantidad');
           // $table->foreign('pedido_id')->references('id')->on('pedidos');
           // $table->foreign('servicio_id')->references('id')->on('servicios');
           
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
          Schema::drop('pedidos_servicios');
    }
}
