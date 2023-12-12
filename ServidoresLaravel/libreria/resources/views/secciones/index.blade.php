
<x-app-layout>
    <h1>Lista de Secciones</h1>
    <ul>
        @foreach ($secciones as $seccion)
            <li><a href="{{ route('secciones.show', $seccion) }}">{{ $seccion->nombre }}</a></li>
        @endforeach
    </ul>
</x-app-layout>
