<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
    use HasFactory;
    protected $table = 'presentacions';
    protected $fillable = [
        'name',
        'slug',
        'descripcion'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
