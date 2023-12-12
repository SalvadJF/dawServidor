<x-app-layout>
    <h1>Lista de Comentarios</h1>
    <ul>
        @foreach ($comentarios as $comentario)
            <li><a href="{{ route('comentarios.show', $comentario) }}">{{ $comentario->content }}</a></li>
        @endforeach
    </ul>
</x-app-layout>
