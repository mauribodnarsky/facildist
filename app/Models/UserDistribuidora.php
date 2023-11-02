<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDistribuidora extends Model
{
    use HasFactory;
    protected $table='user_distribuidora';

    protected $fillable = [
        'user_id',
        'distribuidora_id',
     
    ];
    protected $rules = [
        'distribuidora_id' => 'numeric|required',
        'user_id' => 'numeric|required',
       
        'distribuidora_id' => 'required|exists:user_distribuidora,id',
        'user_id' => 'required|exists:users,id',
    ];}
