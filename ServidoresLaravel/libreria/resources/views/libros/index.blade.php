<x-app-layout>
    <h1>Lista de Libros</h1>
    <ul>
        @foreach ($libros as $libto)
            <li><a href="{{ route('libros.show', $libro) }}">{{ $libro->libro }}</a></li>
        @endforeach
    </ul>
</x-app-layout>
