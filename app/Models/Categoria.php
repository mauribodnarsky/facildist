<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class Categoria extends Model
{
    use HasFactory;
    protected $table='categorias';
    protected $fillable=['nombre','distribuidora_id'];
    protected $rules = [
        'nombre' => 'string|max:60',
        'distribuidora_id' => 'required|exists:distribuidoras,id',

    ];
    
    public function create($data)
    {
 

        $validator = Validator::make($data, $this->rules);
        if ($validator->fails()) {
            return $validator->errors();
        }

        return static::query()->create($data);
    }
}
