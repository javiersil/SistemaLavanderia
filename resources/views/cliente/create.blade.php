
@extends('plantilla')



@section('head')
 <h3>Crear Cliente</h3>
<div  class="row col-md-12">
<a class="btn btn-default" href="{{  action('ClienteController@index')}}" role="button">Cancelar</a>
</div>
@endsection


@section('contenedor')



 
  <div class="row  ">
    {!!  Form::open(array('action' => 'ClienteController@store'))    !!}

 <div class="row" >
 <div class="form-group">
 

<div class="col-md-8">{!!  Form::label('Nombre') !!}
{!!  Form::text('nombre',null, array('class' => 'form-control')) !!}</div>
</div>

 <div class="form-group">

 <div class="col-md-8">
 <div class="hr-line-dashed"></div>
 {!!  Form::label('Dirección') !!}
{!!  Form::text('direccion', null,array('class' => 'form-control')) !!}</div>

</div>

 


 <div class="form-group">
 <div class="col-md-8" >
 <div class="hr-line-dashed"></div>
{!!  Form::label('Número telefónico') !!}
{!!  Form::number('telefono' ,null ,array('class' => 'form-control')) !!}
</div>
</div>



</div>


<div class="hr-line-dashed"></div>
 <div class="form-group">
{!!Form::submit('Guardar',array('class' => 'btn btn-primary')) !!}
</div>
{!!  Form::close() !!}
   </div>
	

@endsection   


