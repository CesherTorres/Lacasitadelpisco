<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    protected $table = 'tipos';
    protected $fillable = [
        'name',
        'slug'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function Motivo()
    {
        return $this->hasMany(Motivo::class);
    }
}
