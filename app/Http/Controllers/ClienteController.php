<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cliente;
use App\Pedido;
use Validator;
use Flash;
class ClienteController extends Controller
{



        public function __construct()
{
    $this->middleware('auth');
     $this->middleware('admin')->only([ 'destroy']);
   
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //


 $clientes = Cliente::buscar($request->nombre)->orderBy('created_at','DESC')->paginate(15);
 
     return view('cliente.index')
     ->with('clientes',$clientes)
    ;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view('cliente.create');
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
             'nombre' => 'required|unique:clientes,nombre',
              'telefono' => 'numeric|min:0',
          
]);


 
       if($validator->fails()){


        
             return redirect('clientes/create')
             ->withErrors($validator)
             ->withInput();

       }else{

         $cliente = new Cliente();
            $cliente->nombre = $request->nombre;
            $cliente->direccion = $request->direccion;
             $cliente->telefono = $request->telefono;
                $cliente->save();  

                     Flash::message('Cliente creado correctamente');

                   
              return redirect('clientes/'.$cliente->id);
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


         $cliente = Cliente::find($id);
           if ($cliente) {
         if (\Auth::user()->is_admin()) {
                $pedidos= $cliente->pedidos()->paginate(5);
         }else{

            
        $pedidos= $cliente->pedidos()->where('estado','!=','cancelado')->paginate(5);
         }



         
              return view('cliente.show')
         ->with('cliente',$cliente)
         ->with('pedidos',$pedidos);
           }else
           {abort(404);}

         


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
        $cliente = Cliente::find($id);
     return view('cliente.edit')->with('cliente',$cliente);

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



  //
        $validator = Validator::make($request->all(), [
              'nombre' => 'required',
              'direccion' => 'required',

              'telefono' => 'numeric|min:0',
          
]);
         

 
       if($validator->fails()){


        
             return redirect('clientes/'.$id.'/edit')
             ->withErrors($validator)
             ->withInput();

       }else{
           $cliente =  Cliente::find($id);
         $cliente =  Cliente::find($id);
            $cliente->nombre = $request->nombre;
            $cliente->direccion = $request->direccion;
             $cliente->telefono =$request->telefono;
                $cliente->update();  

                     Flash::message('Cliente editado correctamente');

                   
              return redirect('clientes/'.$cliente->id);
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

              $cliente = Cliente::find($id);
              if ($cliente) {

                $pedidos= Pedido::where([['cliente_id', '=', $cliente->id],['estado','=','proceso']])->get();



              if (count($pedidos) >0) {
               Flash::warning('El cliente no se pudo eliminar, tiene pedidos en proceso');
               return redirect('clientes/'.$id.'/edit');
              }else
              {

            
         DB::table('pedidos_servicios')
            ->Join('pedidos', 'pedidos.id', '=', 'pedidos_servicios.pedido_id')
                       
            ->where( 'pedidos.cliente_id', '=', $id)
            ->select( 'pedidos_servicios.*')
            ->delete();



   Pedido::where('cliente_id',$cliente->id)->delete();

   $cliente->delete();

           




         Flash::message('Cliente eliminado!');
           return redirect('clientes');

              }
              


              // 



              }else{ 
               abort(404);

            }

            return redirect('clientes');

             
     
        
    }
}
