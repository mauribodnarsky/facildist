<?php

namespace App\Models;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class distribuidora extends Model
{
    use HasFactory;
    protected $with=['productos','categorias','users'];
    protected $fillable = [
        'nombre' ,
        'correo',
        'direccion',
        'estado',   
        'razon_social',
        'plan',
        'logo',
    ];
    protected $rules = [
        'nombre' => 'string|max:12',
        'correo' => 'string',
        'direccion' => 'string',
        'estado' => 'nullable|boolean',
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
    
    public function categorias(){
        return $this->hasMany(Categoria::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
}
