
@extends('plantilla')



@section('head')

  <h3>Cliente</h3>
@endsection



@section('contenedor')

<div class="row ">

 

<div class="hr-line-dashed"></div>

<div class="form-group">

<label class="col-lg-2 control-label">Nombre</label>
<div class="col-lg-10">
<h2 class="form-control-static">{{  $cliente->nombre }}</h2></div>
   </div>



<div class="form-group">

<label class="col-lg-2 control-label">Direcion</label>

<div class="col-lg-10">

<h2 class="form-control-static">{{  $cliente->direccion}}</h2></div>
   </div>






   <div class="form-group">

<label class="col-lg-2 control-label">Telefono</label>
<div class="col-lg-10">
<h2 class="form-control-static">{{  $cliente->telefono }}</h2></div>
   </div>






 

</div>


<div class="row col-lg-12">
	
<div class="hr-line-dashed"></div>
   <div>
	<h3>Pedidos del cliente</h3>
<a class="btn btn-success" href="/pedidos/create/{{$cliente->id}}" role="button">Crear pedido</a>


	</div>
<div class="row">

<div class="hr-line-dashed"></div>
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
	
	@foreach( $pedidos  as $pedido)
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
                   

<a class="btn btn-default" href="/pedidos/{{ $pedido->id}}" role="button">Ver pedido</a>

		      </td>

	</tr>
	



@endforeach
</tbody>



</table>

{!! $pedidos->links() !!}
</div>	

 

</div>

@endsection