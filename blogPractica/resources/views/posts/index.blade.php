<x-app-layout>
    <h1>Lista de Publicaciones</h1>
    <ul>
        @foreach ($posts as $post)
            <li><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></li>
        @endforeach
    </ul>
</x-app-layout>
