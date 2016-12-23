
@extends('plantilla')

@section('head')
 <h3>Crear Usuario</h3>
<div  class="row col-md-12">
<a class="btn btn-default" href="{{  action('UsuarioController@index')}}" role="button">Cancelar</a>
</div>
@endsection


@section('contenedor')



  <div class="row  ">
    {!!  Form::open(array('action' => 'UsuarioController@store'))    !!}
  <div class="row" >
 <div class="form-group">

<div class="col-md-6">{!!  Form::label('Nombre') !!}
{!!  Form::text('nombre',null, array('class' => 'form-control')) !!}</div>
</div>

 <div class="form-group">
 <div class="col-md-6">{!!  Form::label('Direción') !!}
{!!  Form::text('domicilio', null,array('class' => 'form-control')) !!}</div>

</div>

 <div class="form-group">
 <div class="col-md-6" >
{!!  Form::label('Correo') !!}
{!!  Form::email('correo' ,null, array('class' => 'form-control')) !!}
</div>
</div>

 <div class="form-group">
 <div class="col-md-6" >
{!!  Form::label('contraseña') !!}
 <input type="password" class="form-control" name="contraseña" placeholder="Password">
</div>
</div>

 <div class="form-group">
 <div class="col-md-6" >
{!!  Form::label('Número telefónico') !!}
{!!  Form::number('telefono' ,null ,array('class' => 'form-control')) !!}
</div>
</div>

 <div class="form-group">

<div class="col-md-6" >{!!  Form::label('tipo') !!}
<select class="form-control" name="tipo">
  <option 
 
   value="administrador">Administrador</option>
  <option 

  value="empleado">Empleado</option>
 
</select></div>



</div>

</div>


<div class="hr-line-dashed"></div>

 <div class="form-group">
{!!Form::submit('Guardar',array('class' => 'btn btn-primary')) !!}
</div>
{!!  Form::close() !!}
   </div>

	

@endsection   




