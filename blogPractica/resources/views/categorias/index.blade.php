<x-app-layout>
    <h1>Lista de Categorías</h1>
    <ul>
        @foreach ($categorias as $categoria)
            <li><a href="{{ route('categorias.show', $categoria) }}">{{ $categoria->name }}</a></li>
        @endforeach
    </ul>
</x-app-layout>
