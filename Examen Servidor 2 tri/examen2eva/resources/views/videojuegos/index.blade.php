<x-app-layout>
    <div class="relative overflow-x-auto w-auto mx-8 mshadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Videojuego
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('videojuegos.index')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Desarrolladora
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('videojuegos.index')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Distribuidora
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3" colspan="2">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($videojuegos as $videojuego)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('videojuegos.show', ['videojuego' => $videojuego]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                {{ truncar($videojuego->denominacion) }}
                            </a>
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('videojuegos.edit', ['categoria' => $videojuego->desarrolladora]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                {{ $videojuego->desarroladora }}
                            </a>
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('videojuegos.edit', ['categoria' => $videojuego->desarroladora->distribuidora ]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                {{ $videojuego->desarroladora->distribuidora }}
                            </a>
                        </th>

                        <td class="px-6 py-4">
                            <a href="{{ route('videojuegos.edit', ['videojuego' => $videojuego]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <x-primary-button>
                                    Editar
                                </x-primary-button>
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('videojuegos.cambiar_imagen', ['videojuego' => $videojuego]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <x-primary-button>
                                    Cambiar imagen
                                </x-primary-button>
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('videojuegos.destroy', ['videojuego' => $videojuego]) }}" method="POST">
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
        <form action="{{ route('videojuegos.create') }}" class="flex justify-center mt-4 mb-4">
            <x-primary-button class="bg-green-500">Insertar un nuevo videojuego</x-primary-button>
        </form>
    </div>
</x-app-layout>
