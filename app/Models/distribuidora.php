<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class distribuidora extends Model
{
    use HasFactory;
    protected $with=['productos'];
    protected $fillable = [
        'nombre' ,
        'correo',
        'direccion',
        'estado',   
        'user_id' ,
        'razon_social',
        'plan',
        'logo',
    ];
    protected $rules = [
        'nombre' => 'string|max:12',
        'correo' => 'string',
        'direccion' => 'string',
        'estado' => 'nullable|boolean',
        'user_id' => 'required|exists:users,id',
        'razon_social' => 'required',
        'plan' => 'nullable|string',
        'logo' => 'nullable|string',

    ];
    
    public function create($data)
    {
 

        $validator = Validator::make($data, $this->rules);

        if ($validator->fails()) {
            return $validator->errors();
        }

        return static::query()->create($data);
    }
    public function actualizar(array $data = [],$id)
    {
        $data['user_id'] = Auth::id();
    
        $validator = Validator::make($data, $this->rules);
    
        if ($validator->fails()) {
            return $validator->errors();
        }
    
        $this->fill($data);
        return distribuidora::where('id', $id)->update($data);


    }

    public function productos(){
        return $this->hasMany(producto::class);
    }
}
