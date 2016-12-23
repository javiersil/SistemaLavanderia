
@extends('plantilla')

@section('head')
 <h3>Editar Usuario</h3>
<div  class="row col-md-12">
<a class="btn btn-default" href="{{  action('UsuarioController@index')}}" role="button">Ir a usuarios</a>
</div>
@endsection
@section('contenedor')

<div class="row">


<div class="hr-line-dashed"></div>

<div class="form-group">

<label class="col-lg-2 control-label">Nombre</label>
<div class="col-lg-10">
<h2 class="form-control-static">{{  $usuario->name}}</h2></div>
   </div>

   

<div class="form-group">

<label class="col-lg-2 control-label">Domicilio</label>
<div class="col-lg-10">
<h2 class="form-control-static">{{  $usuario->domicilio}}</h2></div>
   </div>




   <div class="form-group">

<label class="col-lg-2 control-label">Telefono</label>
<div class="col-lg-10">
<h2 class="form-control-static">{{  $usuario->telefono }}</h2></div>
   </div>




   <div class="form-group">

<label class="col-lg-2 control-label">Tipo</label>
<div class="col-lg-10">
<h2 class="form-control-static">{{  $usuario->tipo }}</h2></div>
   </div>




   <div class="form-group">

<label class="col-lg-2 control-label">Email</label>
<div class="col-lg-10">
<h2 class="form-control-static">{{  $usuario->email}}</h2></div>
   </div>




	
  </div>


@endsection