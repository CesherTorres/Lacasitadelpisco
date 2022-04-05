<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $fillable = [
        'name',
        'slug',
        'codigo',
        'foto',
        'descripcion',
        'categoria_id',
        'marca_id',
        'medida_id',
        'presentacion_id'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
    public function medida()
    {
        return $this->belongsTo(Medida::class);
    }
    public function presentacion()
    {
        return $this->belongsTo(Presentacion::class);
    }
}
