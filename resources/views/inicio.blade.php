



@extends('plantilla')






@section('head')




<div class="col-md-6"><a class="btn btn-primary" href="{{  action('ClienteController@create')}}" role="button"><i class="fa fa-user"></i>Crear cliente</a></div>

<div class="col-md-6"><a class="btn btn-primary" href="{{  action('ClienteController@index')}}" role="button"><i class="fa fa-search"></i>Ver clientes</a></div>


@endsection



@section('contenedor')

<p>
Bienvenido al panel de administrador</p>


@endsection


