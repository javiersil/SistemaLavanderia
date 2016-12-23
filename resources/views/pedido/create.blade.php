
@extends('plantilla')


@section('contenedor')

<div class="row">
<div class="panel panel-default">
  <div class="panel-body">
   <h3>Cliente</h3>
<div>
	<p>Nombre: <h3>{{  $cliente->nombre }}</h3> </p>
	
</div>	

<div>
	<p>Direccion: <h3>{{  $cliente->direccion}}	</h3></p>

</div>	
<div>
	<p>Telefono: <h3>{{  $cliente->telefono }}	</h3></p>

</div>	

	
  </div>
</div>

</div>
<div class="row">
	<div class="panel panel-default">
  <div class="panel-body">
   <div>



 <h1>Crear un pedido</h1>
  {!!  Form::open( array('action' => array ('PedidoController@store', $cliente->id) ,  'method' => 'post' ) )    !!}


 <div class="row" >
 <div class="form-group">

<div class="col-md-12">

@foreach($servicios as $servicio)

   <div class="col-md-6">
   	 <label>
   
   {{ $servicio->nombre }} :  $ {{ $servicio->precio }}  por   {{ $servicio->unidad}} 

  
  </label>

   </div>
  
 <div class="col-md-4"> 
 <label>Cantidad  
  <div name="servicios">
 <input name="{{ $servicio->id}}" id="{{ $servicio->precio}}" type="number" value="0"  onchange="servicio();"></input>
 </div>
 </label>
 </div>
 



@endforeach


</div>



</div>

 

 
<div  id="error"></div>

 <div class="form-group">
 <div class="col-md-4" >
{!!  Form::label('Precio total') !!}

 <input id="preciototal"  type="number" value="0" disabled></input>

</div>
</div>



 <div class="form-group">
 <div class="col-md-4" >
{!!  Form::label('Anticipo') !!}


<input name="anticipo" type="number" value="0"  onchange="prev(this);"></input>


</div>
</div>

 <div class="form-group">
 <div class="col-md-8" >
{!!  Form::label('observaciones') !!}

 <textarea class = "form-control" rows="4" cols="50" name="observaciones">

</textarea> 

</div>
</div>

</div>



 <div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
{!!Form::submit('Guardar',array('class' => 'btn btn-primary')) !!}
</div>
</div>
{!!  Form::close() !!}

  </div>
</div>

</div>





@endsection

@section('js')

 <script src="/dist/js/pedido.js"></script>

@endsection