<x-app-layout>
    <h1>Lista de Categorías</h1>
    <ul>
        @foreach ($categories as $category)
            <li><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</x-app-layout>
