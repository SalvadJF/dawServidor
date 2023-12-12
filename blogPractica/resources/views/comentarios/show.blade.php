<x-app-layout>
    <h1>Detalles del Comentario</h1>
    <p><strong>Autor:</strong> {{ $comentario->user->name }}</p>
    <p>{{ $comentario->content }}</p>
</x-app-layout>
