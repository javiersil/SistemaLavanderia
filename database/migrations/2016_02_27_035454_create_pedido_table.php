<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
                  
        
            $table->integer('user_id')->unsigned();
            $table->integer('cliente_id')->unsigned();
            $table->integer('precio');
             $table->date('fecha_entrega');
              $table->string('estado');
              $table->float('anticipo');
               $table->string('observaciones');
            $table->timestamps();


             $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('user_id')->references('id')->on('users');
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
          Schema::drop('pedidos');
    }
}
