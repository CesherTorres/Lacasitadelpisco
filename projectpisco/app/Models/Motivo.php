<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{
    use HasFactory;
    protected $table = 'motivos';
    protected $fillable = [
        'name',
        'slug',
        'tipo_id',
        'descripcion'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }
}
