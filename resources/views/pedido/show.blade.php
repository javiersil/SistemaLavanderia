
@extends('plantilla')


@section('contenedor')

<div class="row">
<div class="panel panel-default">
  <div class="panel-body">
   <h3>Cliente</h3>
<div>

	<p>Nombre: 
	 <a href="/clientes/{{  $pedido->cliente->id}}">
     <h3>{{  $pedido->cliente->nombre }}</h3></a>
	 </p>
	
</div>	

<div>
	<p>Direccion: <h3>{{  $pedido->cliente->direccion}}	</h3></p>

</div>	
<div>
	<p>Telefono: <h3>{{  $pedido->cliente->telefono }}	</h3></p>

</div>	

	
  </div>
</div>

</div>
<div class="row">
	<div class="panel panel-default">
  <div class="panel-body">
   <div>
	<h3>Pedido </h3>



	</div>
<div class="row">
 @if($pedido->estado === 'proceso')
 <a class="btn btn-default" href="/pedidos/cancelar/{{ $pedido->id}}" role="button">Cancelar pedido</a>
 @endif
 

<table class="table table-bordered">
	<thead><tr>
	<td>id_pedido</td>
		<td>precio total</td>
        <td>anticipo</td>
        <td>Resto</td>
       <td>creado por</td>
        
         <td>observaciones</td>
         <td>estado </td>
          <td>fecha de creado</td>
         <td>fecha de entregado</td>
         <td>acciones</td>
	</tr></thead>

<tbody>
	

	<tr>
	<td>{{  $pedido->id }}	</td>
		 <td>{{  $pedido->precio }}	</td>
		  <td>{{  $pedido->anticipo }}	</td>
		   <td>{{ $pedido->precio - $pedido->anticipo }}	</td>
		   <td>{{  $pedido->user->name}}	</td>
		   
		     <td>{{  $pedido->observaciones }}	</td>
		      <td>{{  $pedido->estado }}	</td>
		       <td>{{  $pedido->created_at }}	</td>
		       <td>{{  $pedido->fecha_entrega }}	</td>
		      <td>
		 @if($pedido->estado === 'proceso')
		      <a class="btn btn-primary" href="/pedidos/entregar/{{ $pedido->id}}" role="button">Entregar</a>


               @elseif($pedido->estado === 'cancelado')

                  <p>Ya fue cancelado</p>

               @else
                  
                        <p>Ya fue entregado</p>

                      
              @endif

		      </td>

	</tr>
	

</tbody>

</table>

</div>	
</div>
</div>
</div>

<div class="row">
	<div class="panel panel-default">
  <div class="panel-body">
   
	<h3>Servicios del pedido</h3>




<div class="row">
<table class="table table-bordered">
	<thead><tr>
	
		<td>nombre</td>
        <td>precio</td>
    
      
	</tr></thead>

<tbody>

@foreach($servicios as $servicio)
	<tr>
	
	<td>{{  $servicio->nombre }}	</td>
	<td>{{  $servicio->precio }}	</td>
		      

	</tr>
	
@endforeach



</tbody>



</table>

</div>	

  </div>
</div>

</div>

@endsection