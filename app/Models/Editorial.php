<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    protected $fillable = [
        'nombre',
    ];

    // Relación: Editorial tiene muchos Libros
    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}
