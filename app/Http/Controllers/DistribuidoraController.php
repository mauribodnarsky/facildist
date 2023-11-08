<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\distribuidora;
use App\Models\UserDistribuidora;
use App\Models\UserPeticion;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DistribuidoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function bienvenidoVendedor()
     {
         $usuario = Auth::user();
         $usuario = User::find($usuario->id);        
         $usuario->rol = 'vendedor';
         $usuario->update();
        $userPeticion=UserPeticion::where('email',$usuario->email)->first();
        if ($userPeticion) {
            // El registro existe
            DB::insert('INSERT INTO user_distribuidora VALUES (NULL, ?,?,?,? )', [ $usuario->id, $userPeticion->distribuidora_id,Carbon::now(),Carbon::now()]);
            $userPeticion->delete();

        } else {
            // El registro no existe
        }
         return view('perfilVendedor', ['perfil' => $usuario]);
     }
     public function bienvenidoEmpresario()
     {
         $usuario = Auth::user();
         $usuario = User::find($usuario->id);

         $usuario->rol = 'patron';
         $usuario->update();
        
         return view('perfilEmpresario', ['perfil' => $usuario]);
     }


    public function index()
    {
        $usuario = Auth::user();
        return view('perfil', ['perfil' => $usuario->distribuidora]);
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
            if($request->file('logo')){
                $logo=$request->file('logo');
                $data['logo']=$logo->getClientOriginalName(); 
                
                }else{
                    
                $data['logo']='';
                }
                $data['correo']=Auth::user()->email;
                $data['nombre']=Auth::user()->name;

            $objdistribuidora=new distribuidora();
            $distribuidora=$objdistribuidora->create($data);
            if(isset($distribuidora->id)){
                $objuserdistribuidora=new UserDistribuidora();
                $datauserdistribuidora['user_id']=Auth::user()->id;
                $datauserdistribuidora['distribuidora_id']=$distribuidora->id;
                $objuserdistribuidora->create($datauserdistribuidora);


                // Guarda los vendedores 
                $list_email = $request->input('email_list'); // Supongo que recibes el listado de correos por POST
                // Divide la cadena en direcciones de correo individuales
                $list_email = str_replace("\n", " ", $list_email);

                $emails = explode(' ', $list_email);

                foreach ($emails as $email) {
                   DB::insert('INSERT INTO users_peticiones VALUES (NULL, ?,?,? )', [ Auth::user()->id, $distribuidora->id, $email]);
                }


                // Creamos una carpeta para el salon si no existe
                    if($request->file('logo')){
        
                $carpetalogo = public_path('img/distribuidoras/logos/' . $distribuidora->id.'/');
                if (!file_exists($carpetalogo)) {
                    mkdir($carpetalogo, 0777, true);
                }
        
                        // Obtenemos el nombre original de la imagen
                        $nombreImagen = $logo->getClientOriginalName();
                        // Guardamos el logo en la carpeta del salon
                        $logo->move($carpetalogo, $nombreImagen);
                        $distribuidora->logo="img/distribuidoras/logos/". $distribuidora->id."/".$logo->getClientOriginalName();
                        $distribuidora->update();
                        
                        return view('perfil_completo', ['distribuidora' => $distribuidora]);

                
            }
        }

        }catch(Exception $e){
            return view('perfil_completo', ['distribuidora' => $distribuidora]);

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
