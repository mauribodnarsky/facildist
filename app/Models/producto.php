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
    protected $with=['categoria'];
    protected $fillable=['id','nombre','descripcion','presentacion','estado','stock','categoria_id','distribuidora_id','imagen','precio_venta_default'];
    protected $rules = [
        'nombre' => 'string|max:60',
        'descripcion' => 'string',
        'presentacion' => 'nullable|string',
        'estado' => 'boolean',
        'stock' => 'integer|required',
        'categoria_id' => 'required|exists:categorias,id',
        'distribuidora_id' => 'required|exists:distribuidoras,id',
        'imagen' => 'nullable|string',
        'precio_venta_default' => 'nullable|numeric',
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
    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id','id');
    }
}
