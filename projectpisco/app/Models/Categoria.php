<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';
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
