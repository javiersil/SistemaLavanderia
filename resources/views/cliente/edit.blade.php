
@extends('plantilla')

@section('head')
 <h3>Editar Cliente</h3>
<div  class="row col-md-12">
<a class="btn btn-default" href="{{  action('ClienteController@index')}}" role="button">
<i class="fa fa-mail-reply"></i>Cancelar</a>
</div>
@endsection
@section('contenedor')




 


    {!!  Form::open( array('action' => array ('ClienteController@update', $cliente->id) ,  'method' => 'put' ) )    !!}
 
 <div class="row" >
 <div class="form-group">

<div class="col-md-8">
{!!  Form::label('Nombre') !!}
{!!  Form::text('nombre',$cliente->nombre, array('class' => 'form-control')) !!}</div>
</div>

 <div class="form-group">
 <div class="col-md-8">
 <div class="hr-line-dashed"></div>
 {!!  Form::label('Direcion') !!}
{!!  Form::text('direccion', $cliente->direccion,array('class' => 'form-control')) !!}
</div>

</div>



 <div class="form-group">
 <div class="col-md-8" >
 <div class="hr-line-dashed"></div>
{!!  Form::label('Numero telefonico') !!}
{!!  Form::number('telefono' ,$cliente->telefono ,array('class' => 'form-control')) !!}
</div>
</div>


</div>


<div class="hr-line-dashed"></div>




{!!Form::submit('Editar',array('class' => 'btn btn-primary'  )) !!}





{!!  Form::close() !!}






<div class="hr-line-dashed"></div>


 @if(Auth::user()->is_admin())

	
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar">
 <i class="fa fa-trash-o"></i>
  Eliminar cliente
</button>









<!-- Modal -->
<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar usuario</h4>
      </div>
      <div class="modal-body">
         
         <p>Al eliminar el usuario se eliminaran todos sus pedidos, puede que algun pedido aun sigua en curso</p>
         <p>Esta seguro que desea eliminar el usuario "  {{ $cliente->nombre }}   "</p>
      </div>
      <div class="modal-footer">
      {!!  Form::open( array('action' => array ('ClienteController@destroy', $cliente->id) ,  'method' => 'delete' ) )    !!}
         <div class="form-group">
{!!Form::submit('Eliminar',array('class' => 'btn btn-danger')) !!}
</div>
{!!  Form::close() !!}
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      
      </div>
    </div>
  </div>
</div>

@endif






@endsection   




