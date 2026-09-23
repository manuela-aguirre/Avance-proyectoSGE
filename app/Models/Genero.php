<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $fillable = [
        'nombre',
    ];

    // Relación: Genero tiene muchos Libros
    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}
