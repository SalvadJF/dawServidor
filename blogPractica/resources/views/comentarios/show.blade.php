<x-app-layout>
    <h1>Detalles del Comentario</h1>
    <p><strong>Autor:</strong> {{ $comment->user->name }}</p>
    <p>{{ $comment->content }}</p>
</x-app-layout>
