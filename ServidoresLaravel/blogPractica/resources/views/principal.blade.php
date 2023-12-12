<x-app-layout>
    <div class="flex">
        <div class="p-2 flex-1 grid grid-cols-3 gap-4 justify-center justify-items-center mt-1">
            @foreach ($posts as $post)
                <div
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h1
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        {{ $post->titulo }}</h1>
                    <p>Usuario : {{ $post->user->name }}</p>
                    <p>{{ $post->contenido }}</p>
                    <p>Categoria: {{ $post->categoria->nombre }}</p>
                    <p>Fecha: {{ $post->created_at }} </p>
                    Stock: {{ $articulo->stock }}
                </div>
            @endforeach
</x-app-layout>
