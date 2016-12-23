<?php 

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



// ruta solo para instalar  .....
Route::get('/install', function () {

    $user = DB::table('users')->where('name','Super Administrador')->get();


    if (count($user)<=0) {
    	
	DB::table('users')->insert([
    [
    'name' => 'Super Administrador', 
     'tipo' => 'administrador', 
    'email' => 'administrador@dominio.com', 
    'password' => bcrypt('root1234')
    ],
    
]);

    	# code...
    }


return redirect('/');




});







Route::get('/password/email','Auth\PasswordController@getReset');


Route::post('/password/email', 'Auth\PasswordController@postReset');




Route::group(['middleware' => ['web']], function () {
    //


Route::get('/perfil',function(){


return view('usuario.perfil');





} );







      
Route::resource('/usuarios','UsuarioController' );

Route::resource('/clientes','ClienteController' );
Route::get('/pedidos','PedidoController@index' );

Route::get('/pedidos/{id}','PedidoController@show' );
Route::get('/pedidos/create/{id}','PedidoController@create' );
Route::post('/pedidos/{id}','PedidoController@store' );
Route::delete('/pedidos/{id}','PedidoController@destroy' );
Route::get('/pedidos/entregar/{id}','PedidoController@entregar' );
Route::get('/pedidos/cancelar/{id}','PedidoController@cancelar' );


Route::get('/', function () {
	if (Auth::check()) {
   return view('inicio');

}	

 return view('auth.login');


});

Route::get('login', 'Auth\AuthController@login');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');


});


//Route::get('registrar', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');


