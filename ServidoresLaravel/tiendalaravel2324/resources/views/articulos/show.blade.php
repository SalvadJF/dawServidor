<x-app-layout>
    <div class="block items-center justify-center w-2/4 p-6 m-auto bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700  content-center">
        @if ($articulo->existeImagen())
            <img class="flex-1 w-1/10 m-auto mt-2 rounded-xl" src="{{ asset($articulo->imagen_url) }}" />
        @endif

        <p class="font-black text-5xl text-center m-auto pt-3"><i class="text-red-500	color: rgb(239 68 68);">Nombre :</i> {{ truncar($articulo->denominacion) }}</p>

        <p class="font-black text-5xl text-center m-auto pt-3"><i class="text-red-500	color: rgb(239 68 68);">Descripcion :</i> {{ truncar($articulo->descripcion) }}</p>

        <p class="font-black text-5xl text-center m-auto pt-3"><i class="text-red-500	color: rgb(239 68 68);">Categoria :</i> {{ truncar($articulo->categoria->nombre) }}</p>

        <p class="font-black text-5xl text-center m-auto pt-3"><i class="text-red-500	color: rgb(239 68 68);">Precio :</i> {{ dinero($articulo->precio) }}</p>

        <p class="font-black text-5xl text-center m-auto pt-3"><i class="text-red-500	color: rgb(239 68 68);">IVA :</i> {{ $articulo->iva->por . ' %' }}</p>

        <p class="font-black text-5xl text-center m-auto pt-3"><i class="text-red-500	color: rgb(239 68 68);">Total :</i> {{ dinero($articulo->precio_ii) }}</p>

        <p class="font-black text-5xl text-center m-auto pt-3"><i class="text-red-500	color: rgb(239 68 68);">Stock :</i> {{ $articulo->stock }}</p>


        <a href="{{ route('articulos.cambiar_imagen', ['articulo' => $articulo]) }}"
            class="m-auto font-medium text-blue-600 dark:text-blue-500 hover:underline flex justify-center items-center mt-2 mb-2">
            <x-primary-button>
                Cambiar imagen
            </x-primary-button>
        </a>
        <a href="{{ route('principal') }}"
            class="m-auto font-medium text-blue-600 dark:text-blue-500 hover:underline flex justify-center items-center mt-2 mb-2">
            <x-primary-button>
                Volver
            </x-primary-button>
        </a>
    </div>
</x-app-layout>
