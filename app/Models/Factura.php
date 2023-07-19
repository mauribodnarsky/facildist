<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $fillable=['distribuidora_id','cliente_id','estado','total','abonado'];
    protected $rules = [
        'nombre' => 'string|max:60',
        'descripcion' => 'string',
        'presentacion' => 'nullable|string',
        'estado' => 'boolean',
        'fecha_vencimiento' => 'date|nullable',
        'total' => 'integer|required',
        'cliente_id' => 'required|exists:clientes,id',
        'distribuidora_id' => 'required|exists:distribuidoras,id',  
        'abonado' => 'nullable|integer',

    ];
}
