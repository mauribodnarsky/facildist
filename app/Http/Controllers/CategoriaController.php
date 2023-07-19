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
            $data['distribuidora_id']=$usuario->distribuidora->id;
           $objcategoria=new Categoria();
           $categoria=$objcategoria->create($data);
            $listado=null;
            $perfil=null;
            $usuario=Auth::user();
            if($usuario->distribuidora){
                $perfil=$usuario->distribuidora;
            }
            if($usuario->distribuidora->categorias){
                $listado=$usuario->distribuidora->categorias;
            }
            return view('categorias.listado',['perfil'=>$perfil,'listado'=>$listado,'categoria_creada' => $categoria]); 
       }catch(Exception $e){
           $listado=null;
           $perfil=null;
           $usuario=Auth::user();
           if($usuario->distribuidora){
               $perfil=$usuario->distribuidora;
           }
           if($usuario->distribuidora->categorias){
               $listado=$usuario->distribuidora->categorias;
           }

           return view('categorias.listado',['perfil'=>$perfil,'listado'=>$listado]);

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
