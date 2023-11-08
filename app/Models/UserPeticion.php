<?php

namespace App\Models;
use Illuminate\Support\Facades\Validator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPeticion extends Model
{
    use HasFactory;
    protected $table='users_peticiones';

    protected $fillable = [
        'user_id',
        'distribuidora_id',
        'email',
     
    ];
    protected $rules = [
        'email' => 'string|required',       
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