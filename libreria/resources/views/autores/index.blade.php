
<x-app-layout>
    <h1>Lista de Autors</h1>
    <ul>
        @foreach ($autores as $autor)
            <li><a href="{{ route('autores.show', $autor) }}">{{ $autor->nombre }}</a></li>
        @endforeach
    </ul>
</x-app-layout>
