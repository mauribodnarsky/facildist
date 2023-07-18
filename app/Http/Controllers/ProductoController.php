<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listado=null;
        $perfil=null;
        $usuario=Auth::user();
        if($usuario->distribuidora){
            $perfil=$usuario->distribuidora;
        }
        if($usuario->distribuidora->productos){
            $listado=$usuario->distribuidora->productos;
        }
        return view('productos.listado',['perfil'=>$perfil,'listado'=>$listado]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
     public function create(Request $request)
     {
      
        try{
            $data=$request->all();
            if($request->file('imagn')){
                $imagn=$request->file('imagn');
                $data['imagn']=$imagn->getClientOriginalName(); 
                
                }else{
                    
                $data['imagn']='';
                }
                $data['user_id']=Auth::user()->id;
            $objproducto=new producto();
            $producto=$objproducto->create($data);
            if(isset($producto->id)){
                // Creamos una carpeta para el salon si no existe
                    if($request->file('imagn')){
        
                $carpetaimagn = public_path('img/productos/productos/' . $producto->id.'/');
                if (!file_exists($carpetaimagn)) {
                    mkdir($carpetaimagn, 0777, true);
                }
        
                        // Obtenemos el nombre original de la imagen
                        $nombreImagen = $imagn->getClientOriginalName();
                        // Guardamos el imagn en la carpeta del salon
                        $imagn->move($carpetaimagn, $nombreImagen);
                        $producto->imagn="img/productos/productos/". $producto->id."/".$imagn->getClientOriginalName();
                        $producto->update();
                        $listado=null;
                        $perfil=null;
                        $usuario=Auth::user();
                        if($usuario->distribuidora){
                            $perfil=$usuario->distribuidora;
                        }
                        if($usuario->distribuidora->productos){
                            $listado=$usuario->distribuidora->productos;
                        }
                        return view('productos.listado',['perfil'=>$perfil,'listado'=>$listado,'producto_creado' => $producto]);

                
            }
        }

        }catch(Exception $e){
            $listado=null;
            $perfil=null;
            $usuario=Auth::user();
            if($usuario->producto){
                $perfil=$usuario->producto;
            }
            if($usuario->producto->productos){
                $listado=$usuario->productos;
            }
            return view('productos.listado',['perfil'=>$perfil,'listado'=>$listado]);

        }

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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(producto $producto)
    {
        //
    }
}
