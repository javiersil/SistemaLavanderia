<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Pedido;
use Validator;
use Flash;


class UsuarioController extends Controller
{



    public function __construct()
{
    $this->middleware('auth');
    $this->middleware('admin');


}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $usuarios = User::orderBy('created_at','DESC')->paginate(2);
     return view('usuario.index')->with('usuarios',$usuarios);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

$validator = Validator::make($request->all(), [
             'nombre' => 'required|unique:users,name',
            'contraseña' => 'required',
            'telefono' => 'numeric|min:0',
            'tipo' => 'required|in:administrador,empleado',
            'correo'    => 'required|email|unique:users,email',
]);


 
       if($validator->fails()){


        
             return redirect('usuarios/create')
             ->withErrors($validator)
             ->withInput();

       }else{

            $usuario = new User();
            $usuario->name = $request->nombre;
            $usuario->email = $request->correo;
            $usuario->password = bcrypt($request->contraseña);
            $usuario->domicilio = $request->domicilio;
            $usuario->telefono= $request->telefono;
            $usuario->tipo = $request->tipo;

            if ( $usuario->save()) {
             
                     Flash::message('Usuario creado correctamente');
            }
            else {

                     Flash::error('Error al crear el usuario');
            }
           


                   
              return redirect('/usuarios');

       }

          


        

              
    }





 











    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */








    public function show($id)
    {
        //
        $usuario = User::Find($id);
        if ($usuario) {
             return view('usuario.show')->with('usuario',$usuario);
        }else { abort(404);
        }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $usuario = User::Find($id);
           if ($usuario) {
         
        return view('usuario.edit')->with('usuario',$usuario);
    }else{ 
       abort(404);

    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //


          
$validator = Validator::make($request->all(), [
            //'nombre' => 'required|unique:users,name',
            
            'telefono' => 'numeric|min:0',
            'tipo' => 'required|in:administrador,empleado',
           //'correo'    => 'required|email|unique:users,email',
]);


 
       if($validator->fails()){


        
             return redirect('usuarios/$id/edit')
             ->withErrors($validator)
             ->withInput();

       }else{
             
            $usuario =  User::Find($id);
                if ($usuario->name === 'Super Administrador') {
           Flash::warning('El usuario no se pudo eeditar por que es el Super Administrador ');
         }else {

            $usuario->name = $request->nombre;
            $usuario->email = $request->correo;
           
            $usuario->domicilio = $request->domicilio;
            $usuario->telefono=  $request->telefono;
            $usuario->tipo = $request->tipo;
                $usuario->update();  

                     Flash::message('Usuario editado correctamente');

                   
             
                }
                 return view('usuario.show')->with('usuario',$usuario);
       }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //


         $usuario =  User::Find($id);

         if ($usuario->name === 'Super Administrador') {
           Flash::warning('El usuario no se pudo eliminar por que es el Super Administrador ');
         }else {


         $super = User::where('name','=','Super Administrador')->first();
          $pedidos=Pedido::where('user_id', '=', $id);


        
            if ($pedidos->count() > 0 ) {
               $pedidos->update(['user_id' => $super->id]);

            }
             
         if ($usuario->delete()) {
            Flash::message('Usuario eliminado!');
         }else {Flash::warning('El usuario  no se pudo eliminar');}


         }

       


return redirect('usuarios');

    }
}
