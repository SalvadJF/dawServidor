<x-app-layout>
    <div
        class="block items-center justify-center w-2/4 p-6 m-auto bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700  content-center">
        <h1>{{ $videojuego->titulo }}</h1>
        <p>{{ $videojuego->anyo }}</p>
        <p>{{ $videojuego->desarrolladora->nombre }}</p>
        <p>{{ $videojuego->distribuidora }}</p>



        <a href="{{ route('videojuegos.index') }}"
            class="m-auto font-medium text-blue-600 dark:text-blue-500 hover:underline flex justify-center items-center mt-2 mb-2">
            <x-primary-button>
                Volver
            </x-primary-button>
        </a>
    </div>
</x-app-layout>
