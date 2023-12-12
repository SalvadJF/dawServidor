<x-app-layout>
    <h1>Lista de Estanteria</h1>
    <ul>
        @foreach ($estanterias as $estanteria)
            <li><a href="{{ route('estanteria.show', $estanteria) }}">{{ $estanteria->nombre }}</a></li>
        @endforeach
    </ul>
</x-app-layout>
