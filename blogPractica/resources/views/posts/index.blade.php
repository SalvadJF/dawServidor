<x-app-layout>
    <div class="relative overflow-x-auto w-full h-full">
        <table class="w-full h-full text-sm text-center text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-7 py-3">
                        <a href="{{ route('articulos.index', ['order' => 'denominacion', 'direccion' => order_direccion($order == 'denominacion', $direccion)]) }}" class="text-blue-500 hover:text-blue-700 font-semibold cursor-pointer">
                            Posts {{ flechas($order == 'titulo', $direccion) }}

                        </a>
                    </th>
                    <th scope="col" class="px-7 py-3">
                        <a href="{{ route('articulos.index', ['order' => 'precio', 'direccion' => order_direccion($order == 'precio', $direccion)]) }}" class="text-blue-500 hover:text-blue-700 font-semibold cursor-pointer">
                            Categorias {{ flechas($order == 'categoria', $direccion) }}
                        </a>
                    </th>
                    <th scope="col" class="px-7 py-3" colspan="2">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $denominacion = session('titulo');
                @endphp
                @foreach ($posts as $post)
                    <tr class="{{ session()->has('exito') && isset($denominacion) && $denominacion == $post->denominacion ? 'bg-green-100' : '' }}">
                        <td class="px-6 py-4 whitespace-normal text-sm text-gray-500">
                            {{ $post->titulo }}
                        </td>
                        <td class="px-6 py-4 whitespace-normal text-sm text-gray-500">
                                {{ $post->categoria->nombre }}
                        </td>
                        <td class="px-6 py-4 whitespace-normal text-sm text-gray-500">
                            <a href="{{ route('posts.edit', ['post' => $post]) }}">
                                <x-primary-button class="bg-blue-500">
                                    Editar
                                </x-primary-button>
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-normal text-sm text-gray-500">
                            <form method="post" action="{{ route('posts.destroy', ['post' => $post]) }}">
                                @csrf
                                @method('DELETE')
                                <x-primary-button class="bg-red-700">
                                    Borrar
                                </x-primary-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <form action="{{ route('posts.create') }}" method="get">
            <x-primary-button class="bg-green-700 m-4">Crear nuevo post</x-primary-button>
        </form>
    </div>
    {{ $posts->links() }}
</x-app-layout>
