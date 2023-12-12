<x-app-layout>
    <h1>Lista de Comentarios</h1>
    <ul>
        @foreach ($comments as $comment)
            <li><a href="{{ route('comments.show', $comment) }}">{{ $comment->content }}</a></li>
        @endforeach
    </ul>
</x-app-layout>
