<x-guest-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Articulo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Denominacion
                    </th><th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Categoria
                    </th>
                    <th scope="col" class="px-6 py-3" colspan="2">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articulos as $articulo)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $articulo->nombre }}
                        </th>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $articulo->denominacion }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $articulo->precio }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $articulo_categoria }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('articulos.edit', ['articulo' => $articulo]) }}"  class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <x-primary-button class="bg-blue-500">
                                    Editar
                            </x-primary-button>
                        </a>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('articulos.destroy', ['articulo' => $articulo]) }}" method="POST">
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
        <form action="{{ route('articulos.create') }}" class="flex justify-center mt-4 mb-4">
            <x-primary-button class="bg-green-500">Insertar un nuevo articulo</x-primary-button>
        </form>
    </div>
</x-guest-layout>
