<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Servicio;
use App\Pedido;
use Flash;
use Carbon\Carbon;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PedidoController extends Controller
{



        public function __construct()
{
    $this->middleware('auth');
    $this->middleware('admin')->only([ 'destroy']);
  
}
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


        public function cancelar($id){
           



            $pedido = Pedido::where([['id','=',$id],['estado' ,'!=','entregado']])
         ->first();

           if ($pedido) {
               
                $pedido->estado = 'cancelado';
               

             $pedido->update();
          

                 Flash::message('El pedido se a  cancelado');
           }


                    return redirect('pedidos');

     }



     public function entregar ($id){
           



            $pedido = Pedido::where([['id','=',$id],['estado' ,'!=','cancelado']])
         ->first();

           if($pedido){

               
                $pedido->estado = 'entregado';
               

                 $pedido->fecha_entrega = Carbon::now();

             $pedido->update();
          

                 Flash::message('El pedido se a  Entregado');


           }return redirect('pedidos/'.$pedido->id);


                   

     }



    public function index()
    {
        //

          //
     if (\Auth::user()->is_admin() ){
        $pedidos = Pedido::paginate(5);
       
     }else{

          $pedidos = Pedido::where('estado' ,'!=','cancelado')
         ->paginate(10);

     

     }

       

              if ($pedidos) {
          return view('pedido.index')
         ->with('pedidos',$pedidos)
       ;

              }else
            {
                abort(404);
            }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
   
         $cliente = Cliente::find($id);
         if ($cliente) {
             $servicios = Servicio::all();

         return view('pedido.create')
         ->with('cliente',$cliente)
         ->with('servicios',$servicios);
         }else
         {
            abort(404);
         }
          
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request,$id)
    {
        //
       // dd($request->all());



      
      





         $cliente = Cliente::find($id);
        $pedido = new Pedido();
          $pedido->estado='proceso';
        $pedido->cliente()->associate($cliente);
        $pedido->user()->associate(\Auth::user());
        
        $pedido->anticipo=$request->anticipo;
        $pedido->observaciones= $request->observaciones;
      
            

       
        $servicios = Servicio::all();


             $v=0;

               $precio=0;


                   foreach ($servicios as $servicio) { 

                    $i=($servicio->id);

                if(  (int)$request->$i > 0){

                  $v=$v+1;
                    
              $pdu= ($servicio->precio *  (int)$request->$i);
               
                 $precio=$precio+$pdu;

               }


               }

   

               if ($v > 0) { 

                 if(  $pedido->anticipo <= $precio &&  $pedido->anticipo >= 0 ) {


                $pedido->precio=$precio;
                 $pedido->save();

               foreach ($servicios as $servicio) { 
                  $i =($servicio->id);
                if(  (int)$request->$i > 0){

                DB::table('pedidos_servicios')->insert( ['pedido_id' => $pedido->id  , 'servicio_id' => $i, 
                    'cantidad' => (int)$request->$i]);
                 }

              
               


               }
               }else{

     Flash::warning('El pedido no se pudo agregar  !solo verifique que el  anticipo es menor al precio total');

                    return redirect('pedidos/create/'.$cliente->id)->withInput();


               }

                    
                       


                         Flash::message('El pedido se agrego correctamente');
                          return redirect('clientes/'.$cliente->id);
                } else
                {  

                    Flash::warning('El pedido no se agrego se debe indicar  la cantidad');

                    return redirect('pedidos/create/'.$cliente->id)->withInput();


                }

           



    

           

                   
             

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
     if (\Auth::user()->is_admin() ){
        $pedido = Pedido::find($id);
         $servicios = DB::table('servicios')
            ->Join('pedidos_servicios', 'servicios.id', '=', 'pedidos_servicios.servicio_id')
            ->where( 'pedidos_servicios.pedido_id', '=', $id)
            ->select('servicios.*', 'pedidos_servicios.*')
            ->get();
     }else{

          $pedido = Pedido::where([['id','=',$id],['estado' ,'!=','cancelado']])
         ->first();

         $servicios = DB::table('servicios')
            ->Join('pedidos_servicios', 'servicios.id', '=', 'pedidos_servicios.servicio_id')
            ->where( 'pedidos_servicios.pedido_id', '=', $id)
            ->select('servicios.*', 'pedidos_servicios.*')
            ->get();

     }

       

              if ($pedido) {
                  return view('pedido.show')
         ->with('pedido',$pedido)
         ->with('servicios',$servicios);

              }else
            {
                abort(404);
            }
       
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
         
        $pedido =   Pedido::where([['estado','!=','proceso'], ['id',$id]]);

       
        if (count($pedido)>0) {
          DB::table('pedidos_servicios')
            ->Join('pedidos', 'pedidos.id', '=', 'pedidos_servicios.pedido_id')
                       
            ->where( 'pedidos.id', '=', $id)
            ->select( 'pedidos_servicios.*')
            ->delete();

            

         $pedido->delete();
           Flash::message('Pedido eliminado correctamente');
              return redirect('/pedidos');


        }else
        {
                 Flash::error('Pedido no se puede eliminar');
              return redirect('/pedidos');
        }
          




    }
        
}
