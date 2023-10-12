<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model{
    use HasFactory;

    /**
    * ? Definimos los campos que se pueden asignar masivamente
    */
    protected $fillable = [
        'user_id',
        'total',
    ];

}
