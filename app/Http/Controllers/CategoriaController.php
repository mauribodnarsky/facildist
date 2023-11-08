<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            $usuario = Auth::user();
        if ($usuario->distribuidora) {
            $data['distribuidora_id'] = $usuario->distribuidora->get(0)->id;
        }
           $objcategoria=new Categoria();
           $categoria=$objcategoria->create($data);
            $listado=null;
            $categorias=null;
            $perfil=null;

            $usuario=Auth::user();
            if(isset($usuario->distribuidora)){
                $perfil=$usuario->distribuidora->get(0);
            }
            if(isset($usuario->distribuidora->get(0)->productos)){
                $listado=$usuario->distribuidora->get(0)->productos;
            }
            if(isset($usuario->distribuidora->get(0)->categorias)){
                $categorias=$usuario->distribuidora->get(0)->categorias;
               }

               return view('productos.listado',['perfil'=>$perfil,'listado'=>$listado,'categorias'=>$categorias]);
    
       }catch(Exception $e){
           $categorias=null;
           $listado=null;
           $perfil=null;
           $usuario=Auth::user();
           if(isset($usuario->distribuidora)){
               $perfil=$usuario->distribuidora->get(0);
           }
           if(isset($usuario->distribuidora->get(0)->productos)){
               $listado=$usuario->distribuidora->get(0)->productos;
           }
           if(isset($usuario->distribuidora->get(0)->categorias)){
            $categorias=$usuario->distribuidora->categorias;
           }
           return view('productos.listado',['perfil'=>$perfil,'listado'=>$listado,'categorias'=>$categorias]);
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
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
