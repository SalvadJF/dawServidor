<x-app-layout>
    <h1>{{ $post->title }}</h1>
    <p><strong>Autor:</strong> {{ $post->user->name }}</p>
    <p>{{ $post->content }}</p>
</x-app-layout>
