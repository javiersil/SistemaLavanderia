@extends('plantilla')


@section('head')


<div  class="row">
<a class="btn btn-primary" href="{{  action('UsuarioController@create')}}" role="button">Crear usuario</a>
</div>

@endsection




@section('contenedor')


<div class="row"><table class="table  table-bordered">
<thead>
	
	<tr>
		<td>Nombre</td>
		<td>Correo</td>
		<td>tipo</td>
		<td>Acciones</td>
	</tr>
</thead>
<tbody>
	
 @foreach( $usuarios  as $usuario)
<tr>
	<td>{{  $usuario->name  }}</td>
    <td>{{  $usuario->email  }}</td>
    <td>{{  $usuario->tipo  }}</td>
    <td>  
  <a class="btn btn-primary" href="{{  action('UsuarioController@show',$usuario->id)}}" role="button"><i class="fa fa-search"></i>ver</a>
 <a class="btn btn-success" href="{{  action('UsuarioController@edit',$usuario->id)}}" role="button"><i class="fa fa-edit"></i>editar</a></td>

</tr>


@endforeach

</tbody>

</table>
{!! $usuarios->links() !!}
</div>


@endsection