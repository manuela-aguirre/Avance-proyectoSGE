<x-app-layout>
    <x-slot name="header">
        <h2 class="cotec-header-title" style="font-family:'Figtree',Arial,sans-serif;font-weight:600;font-size:1.25rem;color:#14532d;">
            Editar Libro
        </h2>
    </x-slot>

    <div class="cotec-panel" style="padding:1.75rem 1.5rem;">
        <form method="POST" action="{{ route('libros.update', $libro) }}">
            @csrf
            @method('PUT')
            @include('libros._form')
        </form>
    </div>
</x-app-layout>
