<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
class producto extends Model
{
    use HasFactory;
    protected $with=['Categoria'];
    protected $fillable=['id','nombre','descripcion','presentacion','estado','stock','categoria_id','distribuidora_id','imagen'];
    protected $rules = [
        'nombre' => 'string|max:60',
        'descripcion' => 'string',
        'presentacion' => 'nullable|string',
        'estado' => 'boolean',
        'stock' => 'integer|required',
        'categoria_id' => 'required|exists:categorias,id',
        'distribuidora_id' => 'required|exists:distribuidoras,id',
        'imagen' => 'nullable|string',

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
        return producto::where('id', $id)->update($data);


    }
    public function Categoria(){
        return $this->hasOne(Categoria::class);
    }
}
