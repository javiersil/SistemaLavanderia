
@extends('plantilla')


@section('contenedor')

<div class="row">
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


               @else
                 @if($pedido->estado === 'cancelado')

                  <p>Ya fue cancelado</p>

                   @else
                  
                        <p>Ya fue entregado</p>

                   @endif


                  
 @if(Auth::user()->is_admin())

 {!!  Form::open( array('action' => array ('PedidoController@destroy', $pedido->id) ,  'method' => 'delete' ) )    !!}
 <div class="form-group">
{!!Form::submit('Eliminar',array('class' => 'btn btn-danger')) !!}
</div>
{!!  Form::close() !!}


@endif

@endif
                   
<a class="btn btn-default" href="/pedidos/{{ $pedido->id}}" role="button">Ver pedido</a>
    </td>

	</tr>
	



@endforeach
</tbody>



</table>

{!! $pedidos->links() !!}
</div>	



@endsection