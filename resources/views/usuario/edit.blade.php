
@extends('plantilla')


@section('head')
 <h3>Editar Usuario</h3>
<div  class="row col-md-12">
<a class="btn btn-default" href="{{  action('UsuarioController@index')}}" role="button">Cancelar</a>
</div>
@endsection



@section('contenedor')


 

    {!!  Form::open( array('action' => array ('UsuarioController@update', $usuario->id) ,  'method' => 'put' ) )    !!}
  <div class="row  ">

 <div class="form-group">

<div class="col-md-6">{!!  Form::label('Nombre') !!}
{!!  Form::text('nombre',$usuario->name, array('class' => 'form-control')) !!}</div>
</div>

 <div class="form-group">
 <div class="col-md-6">{!!  Form::label('Direcion') !!}
{!!  Form::text('domicilio', $usuario->domicilio,array('class' => 'form-control')) !!}</div>

</div>

 <div class="form-group">
 <div class="col-md-6" >
{!!  Form::label('Correo') !!}
{!!  Form::email('correo' ,$usuario->email, array('class' => 'form-control')) !!}
</div>
</div>


 <div class="form-group">
 <div class="col-md-6" >
{!!  Form::label('Numero telefonico') !!}
{!!  Form::number('telefono' ,$usuario->telefono ,array('class' => 'form-control')) !!}
</div>
</div>

 <div class="form-group">

<div class="col-md-6" >
{!!  Form::label('tipo') !!}
<select class="form-control" name="tipo">
  <option 
  @if ($usuario->tipo === 'administrador')  {!! 'selected'  !!}   @endif
   value="administrador">Administrador</option>
  <option 
  @if ($usuario->tipo === 'empleado')  {!! 'selected'  !!}   @endif
  value="empleado">Empleado</option>
 
</select></div>



</div>

 </div>


<div class="hr-line-dashed"></div>
  
 <div class="form-group">
{!!Form::submit('Editar',array('class' => 'btn btn-primary')) !!}
</div>


{!!  Form::close() !!}


  





<div class="hr-line-dashed"></div>


	
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar">
  Eliminar usuario
</button>










@endsection   

<!-- Modal -->
<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar usuario</h4>
      </div>
      <div class="modal-body">
         Esta seguro que desea eliminar el usuario "  {{ $usuario->name}}   "
      </div>
      <div class="modal-footer">
      {!!  Form::open( array('action' => array ('UsuarioController@destroy', $usuario->id) ,  'method' => 'delete' ) )    !!}
         <div class="form-group">
{!!Form::submit('Eliminar',array('class' => 'btn btn-danger')) !!}
</div>
{!!  Form::close() !!}
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      
      </div>
    </div>
  </div>
</div>