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
        $categorias=null;
        if($usuario->distribuidora->categorias){
            $categorias=$usuario->distribuidora->categorias;
        }


        return view('productos.listado',['perfil'=>$perfil,'categorias'=>$categorias,'listado'=>$listado]);
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
            if($request->file('imagen')){
                $imagen=$request->file('imagen');
                $data['imagen']=$imagen->getClientOriginalName(); 
                
                }else{
                    
                $data['imagen']='https://facildist.com.ar/public/img/default.jpg';
                }
                $usuario = Auth::user();

               $data['distribuidora_id']=$usuario->distribuidora->id;
            $objproducto=new producto();
            $producto=$objproducto->create($data);
            if(isset($producto->id)){
                // Creamos una carpeta para el salon si no existe
                    if($request->file('imagen')){
        
                $carpetaimagen = public_path('img/productos/' . $producto->id.'/');
                if (!file_exists($carpetaimagen)) {
                    mkdir($carpetaimagen, 0777, true);
                }
        
                        // Obtenemos el nombre original de la imagen
                        $nombreImagen = $imagen->getClientOriginalName();
                        // Guardamos el imagen en la carpeta del salon
                        $imagen->move($carpetaimagen, $nombreImagen);
                        $producto->imagen=$carpetaimagen.$imagen->getClientOriginalName();
                        $producto->update();
            }
                        $listado=null;
                        $perfil=null;
                        $categorias=null;

                        $usuario=Auth::user();
                        if($usuario->distribuidora){
                            $perfil=$usuario->distribuidora;
                        }
                        if($usuario->distribuidora->productos){
                            $listado=$usuario->distribuidora->productos;
                        }
                        
                        if($usuario->distribuidora->categorias){
                            $categorias=$usuario->distribuidora->categorias;
                        }
                        return view('productos.listado',['perfil'=>$perfil,'categorias'=>$categorias,'listado'=>$listado,'producto_creado' => $producto]);

                
            
        }

        }catch(Exception $e){
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

    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $data=$request->all();
            $productoId = $data['producto_id']; // Supongo que tienes un campo oculto en el formulario con el ID del producto a actualizar
            if($request->file('imagen')){
                $imagen=$request->file('imagen');
                $data['imagen']=$imagen->getClientOriginalName(); 
                
            }else{
                    
                $data['imagen']='https://facildist.com.ar/public/img/default.jpg';
            }
                $usuario = Auth::user();

               $data['distribuidora_id']=$usuario->distribuidora->id;
               $objproducto = producto::findOrFail($productoId);
               if(isset($objproducto)){
                // Creamos una carpeta para el salon si no existe
                    if($request->file('imagen')){
        
                $carpetaimagen = public_path('img/productos/' . $objproducto->id.'/');
                if (!file_exists($carpetaimagen)) {
                    mkdir($carpetaimagen, 0777, true);
                }
        
                        // Obtenemos el nombre original de la imagen
                        $nombreImagen = $imagen->getClientOriginalName();
                        // Guardamos el imagen en la carpeta del salon
                        $imagen->move($carpetaimagen, $nombreImagen);
                        $objproducto->imagen=$carpetaimagen.$imagen->getClientOriginalName();

                    }
                 
                    $objproducto->update($data);

                        $listado=null;
                        $perfil=null;
                        $categorias=null;

                        $usuario=Auth::user();
                        if($usuario->distribuidora){
                            $perfil=$usuario->distribuidora;
                        }
                        if($usuario->distribuidora->productos){
                            $listado=$usuario->distribuidora->productos;
                        }
                        
                        if($usuario->distribuidora->categorias){
                            $categorias=$usuario->distribuidora->categorias;
                        }
                        return view('productos.listado',['perfil'=>$perfil,'categorias'=>$categorias,'listado'=>$listado,'producto_creado' => $objproducto]);

                
            
        }

        }catch(Exception $e){
            $listado=null;
            $perfil=null;
            
            $usuario=Auth::user();
            if($usuario->distribuidora){
                $perfil=$usuario->distribuidora;
            }
            if($usuario->distribuidora->productos){
                $listado=$usuario->distribuidora->productos;
            }

                        
            if($usuario->distribuidora->categorias){
                $categorias=$usuario->distribuidora->categorias;
            }
            dd($e->getMessage());
            return view('productos.listado',['perfil'=>$perfil,'listado'=>$listado,'categorias'=>$categorias]);

        }    }

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
