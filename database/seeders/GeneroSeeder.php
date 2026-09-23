<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genero;

class GeneroSeeder extends Seeder
{
    public function run(): void
    {
        $generos = [
            'Ingeniería de Sistemas',
            'Agropecuaria',
            'Administración de Empresas',
            'Contabilidad',
            'Diseño e Integración Multimedia',
            'Literatura',
            'Ciencias de la Computación',
            'Matemáticas',
            'Historia',
            'Idiomas',
        ];

        foreach ($generos as $nombre) {
            Genero::create(['nombre' => $nombre]);
        }
    }
}
