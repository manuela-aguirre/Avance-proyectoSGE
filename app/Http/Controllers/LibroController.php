<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use App\Models\Genero;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Listado de libros (con() evita el problema N+1 al cargar
     * la editorial y el género de cada libro en una sola consulta extra).
     */
    public function index(Request $request)
    {
        $libros = Libro::with(['editorial', 'genero'])
            ->buscar($request->get('q'))
            ->latest()
            ->paginate(50)
            ->withQueryString();

        return view('libros.index', [
            'libros' => $libros,
            'q' => $request->get('q'),
        ]);
    }

    /**
     * Formulario de creación.
     */
    public function create()
    {
        return view('libros.create', [
            'editoriales' => Editorial::orderBy('nombre')->get(),
            'generos' => Genero::orderBy('nombre')->get(),
        ]);
    }

    /**
     * Guarda un libro nuevo (con validación básica).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => ['required', 'string', 'max:150'],
            'descripcion' => ['nullable', 'string'],
            'portada_url' => ['nullable', 'url', 'max:255'],
            'stock' => ['required', 'integer', 'min:0'],
            'isbn' => ['nullable', 'string', 'max:20'],
            'editorial_id' => ['required', 'exists:editorials,id'],
            'genero_id' => ['required', 'exists:generos,id'],
        ]);

        Libro::create($validated);

        return redirect()
            ->route('libros.index')
            ->with('status', 'Libro creado correctamente.');
    }

    /**
     * Formulario de edición.
     */
    public function edit(Libro $libro)
    {
        return view('libros.edit', [
            'libro' => $libro,
            'editoriales' => Editorial::orderBy('nombre')->get(),
            'generos' => Genero::orderBy('nombre')->get(),
        ]);
    }

    /**
     * Actualiza un libro existente.
     */
    public function update(Request $request, Libro $libro)
    {
        $validated = $request->validate([
            'titulo' => ['required', 'string', 'max:150'],
            'descripcion' => ['nullable', 'string'],
            'portada_url' => ['nullable', 'url', 'max:255'],
            'stock' => ['required', 'integer', 'min:0'],
            'isbn' => ['nullable', 'string', 'max:20'],
            'editorial_id' => ['required', 'exists:editorials,id'],
            'genero_id' => ['required', 'exists:generos,id'],
        ]);

        $libro->update($validated);

        return redirect()
            ->route('libros.index')
            ->with('status', 'Libro actualizado correctamente.');
    }

    /**
     * Elimina un libro.
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();

        return redirect()
            ->route('libros.index')
            ->with('status', 'Libro eliminado correctamente.');
    }
}
