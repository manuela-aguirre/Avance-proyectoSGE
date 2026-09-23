<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'titulo', 'descripcion', 'portada_url', 'stock', 'isbn', 'editorial_id', 'genero_id',
    ];

    // Relación: Libro pertenece a una Editorial
    public function editorial()
    {
        return $this->belongsTo(Editorial::class)->withDefault([
            'nombre' => 'Sin editorial',
        ]);
    }

    // Relación: Libro pertenece a un Género
    public function genero()
    {
        return $this->belongsTo(Genero::class)->withDefault([
            'nombre' => 'Sin género',
        ]);
    }

    /**
     * Scope reutilizable: filtra libros por texto (título o ISBN).
     * Uso: Libro::buscar($texto)->get();
     */
    public function scopeBuscar($query, ?string $texto)
    {
        if (! $texto) {
            return $query;
        }

        return $query->where(function ($q) use ($texto) {
            $q->where('titulo', 'like', "%{$texto}%")
                ->orWhere('isbn', 'like', "%{$texto}%");
        });
    }

    /**
     * Scope reutilizable: solo libros con stock disponible.
     * Uso: Libro::conStock()->get();
     */
    public function scopeConStock($query)
    {
        return $query->where('stock', '>', 0);
    }
}
