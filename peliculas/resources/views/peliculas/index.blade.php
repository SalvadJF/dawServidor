<x-app-layout>
    <div class="relative overflow-x-auto w-auto mx-8 mshadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('peliculas.index') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Título
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('peliculas.index') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Año
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('peliculas.index') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Género
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('peliculas.index') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Descripción
                        </a>
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($peliculas as $pelicula)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $pelicula->titulo }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $pelicula->anyo }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $pelicula->genero->nombre }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium
                        text-gray-900 whitespace-nowrap dark:text-white">

                        <p>
                            {{$pelicula->description->descripcion}}
                        </p>
                            @if (isset($pelicula->description))
                            <a href="{{ route('descriptions.edit', ['description' => $pelicula->description]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Editar descripción
                            </a>
                            @else
                            <a href="{{ route('descriptions.create', ['pelicula' => $pelicula]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Añadir descripción
                            </a>
                            @endif
                        </th>
                        <td class="px-6 py-4">
                            <a href="{{ route('peliculas.edit', ['pelicula' => $pelicula]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <x-primary-button>
                                    Editar
                                </x-primary-button>
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('peliculas.destroy', ['pelicula' => $pelicula]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-primary-button class="bg-red-500">
                                    Borrar
                                </x-primary-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('peliculas.create') }}" class="flex justify-center mt-4 mb-4">
            <x-primary-button class="bg-green-500">Insertar una nueva película</x-primary-button>
        </form>
    </div>
</x-app-layout>
