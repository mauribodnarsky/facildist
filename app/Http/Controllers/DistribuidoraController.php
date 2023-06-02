<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\distribuidora;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DistribuidoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user();
        return view('admin', ['usuario' => $usuario]);
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
            $distribuidora=distribuidora::created($data);

        }catch(Exception $e){

        }


        $usuarios=User::with('salon')->where('rol','client')->get();
          
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
     * @param  \App\Models\distribuidora  $distribuidora
     * @return \Illuminate\Http\Response
     */
    public function show(distribuidora $distribuidora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\distribuidora  $distribuidora
     * @return \Illuminate\Http\Response
     */
    public function edit(distribuidora $distribuidora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\distribuidora  $distribuidora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, distribuidora $distribuidora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\distribuidora  $distribuidora
     * @return \Illuminate\Http\Response
     */
    public function destroy(distribuidora $distribuidora)
    {
        //
    }
}
