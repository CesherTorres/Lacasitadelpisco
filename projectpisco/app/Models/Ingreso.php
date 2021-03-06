<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;
    protected $table = 'ingresos';
    protected $fillable = [
        'codigo',
        'responsable',
        'movimiento_tipo',
        'fecha',
        'categoria_id'
    ];
}
