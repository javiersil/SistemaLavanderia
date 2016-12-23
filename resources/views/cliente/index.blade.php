@extends('plantilla')



@section('head')

<div  class="row col-md-12">
<a class="btn btn-primary" href="{{  action('ClienteController@create')}}" role="button"> <i class="fa fa-user"></i>Crear cliente</a>
</div>
@endsection
@section('contenedor')






<div class="row"><table class="table  table-bordered">
<thead>
	
	<tr>
		<td>Nombre</td>
		<td>Direccion</td>
	     <td>Telefono</td>
		<td>Acciones</td>
	</tr>
</thead>
<tbody>
	
 @foreach( $clientes  as $cliente)
<tr>
	<td>{{  $cliente->nombre  }}</td>
    <td>{{  $cliente->direccion  }}</td>
      <td>{{  $cliente->telefono  }}</td>
   
    <td>  
  <a class="btn btn-primary" href="{{  action('ClienteController@show',$cliente->id)}}" role="button"> <i class="fa fa-search"></i>ver pedidos</a>
   <a class="btn btn-info" href="/pedidos/create/{{$cliente->id}}" role="button"> <i class="fa fa-exchange"></i>Crear pedido</a>
 <a class="btn btn-success" href="{{  action('ClienteController@edit',$cliente->id)}}" role="button"> <i class="fa fa-edit"></i>editar</a>
</td>


</tr>


@endforeach

</tbody>

</table>
{!! $clientes->links() !!}
</div>


@endsection