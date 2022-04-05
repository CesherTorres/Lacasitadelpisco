<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $table = 'marcas';
    protected $fillable = [
        'name',
        'slug',
        'descripcion'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function productos()
    {
        return $this->hasOne(Producto::class);
    }
}
