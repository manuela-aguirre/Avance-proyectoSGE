<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Libro;
use App\Models\Editorial;
use App\Models\Genero;

class LibroSeeder extends Seeder
{
    public function run(): void
    {
        $editoriales = Editorial::pluck('id', 'nombre');
        $generos = Genero::pluck('id', 'nombre');

        $libros = [
            [
                'titulo' => 'Fundamentos de la ingeniería de software',
                'descripcion' => 'Perspectiva para los ingenieros en sistemas del TecNM',
                'stock' => 5,
                'isbn' => '9780134757599',
                'editorial' => 'Pearson',
                'genero' => 'Ingeniería de Sistemas',
            ],
            [
                'titulo' => 'Estructuras de datos y algoritmos',
                'descripcion' => 'Introducción a estructuras de datos en Java',
                'stock' => 3,
                'isbn' => '9780133845611',
                'editorial' => 'McGraw-Hill',
                'genero' => 'Ciencias de la Computación',
            ],
            [
                'titulo' => 'Bases de datos: diseño y gestión',
                'descripcion' => 'Fundamentos de modelado relacional',
                'stock' => 4,
                'isbn' => '9786077076590',
                'editorial' => 'Alfaomega',
                'genero' => 'Ingeniería de Sistemas',
            ],
            [
                'titulo' => 'Cien años de soledad',
                'descripcion' => 'Novela de Gabriel García Márquez',
                'stock' => 2,
                'isbn' => '9780307474728',
                'editorial' => 'Planeta',
                'genero' => 'Literatura',
            ],
            [
                'titulo' => 'Redes de computadoras',
                'descripcion' => 'Principios y práctica de redes',
                'stock' => 6,
                'isbn' => '9786071706439',
                'editorial' => 'Editorial Trillas',
                'genero' => 'Ciencias de la Computación',
            ],
            [
                'titulo' => 'Cálculo diferencial e integral',
                'descripcion' => 'Introducción al cálculo para ingenierías',
                'stock' => 7,
                'isbn' => '9789587780012',
                'editorial' => 'Editorial Santillana',
                'genero' => 'Matemáticas',
            ],
            [
                'titulo' => 'Contabilidad general',
                'descripcion' => 'Principios contables y estados financieros',
                'stock' => 8,
                'isbn' => '9789584600321',
                'editorial' => 'Editorial Norma',
                'genero' => 'Contabilidad',
            ],
            [
                'titulo' => 'Fundamentos de administración',
                'descripcion' => 'Principios de gestión y administración de empresas',
                'stock' => 5,
                'isbn' => '9789702615009',
                'editorial' => 'Pearson',
                'genero' => 'Administración de Empresas',
            ],
            [
                'titulo' => 'Diseño gráfico y multimedia',
                'descripcion' => 'Fundamentos de diseño digital e interacción',
                'stock' => 3,
                'isbn' => '9788441536021',
                'editorial' => 'Ediciones Anaya',
                'genero' => 'Diseño e Integración Multimedia',
            ],
            [
                'titulo' => 'Introducción a la agronomía',
                'descripcion' => 'Bases técnicas de producción agropecuaria',
                'stock' => 4,
                'isbn' => '9789583046512',
                'editorial' => 'Editorial Trillas',
                'genero' => 'Agropecuaria',
            ],
            [
                'titulo' => 'Historia de Colombia',
                'descripcion' => 'Un recorrido por la historia nacional',
                'stock' => 6,
                'isbn' => '9789580442210',
                'editorial' => 'Editorial Norma',
                'genero' => 'Historia',
            ],
            [
                'titulo' => 'Inglés técnico para ingeniería',
                'descripcion' => 'Vocabulario y comprensión lectora técnica',
                'stock' => 9,
                'isbn' => '9780194539555',
                'editorial' => "O'Reilly Media",
                'genero' => 'Idiomas',
            ],
        ];

        foreach ($libros as $libro) {
            Libro::create([
                'titulo' => $libro['titulo'],
                'descripcion' => $libro['descripcion'],
                'stock' => $libro['stock'],
                'isbn' => $libro['isbn'],
                'editorial_id' => $editoriales[$libro['editorial']],
                'genero_id' => $generos[$libro['genero']],
            ]);
        }
    }
}
