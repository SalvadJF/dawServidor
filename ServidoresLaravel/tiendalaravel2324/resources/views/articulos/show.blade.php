<x-app-layout>
    <div class="relative overflow-x-auto w-auto mx-8 mshadow-md sm:rounded-lg bg-slate-300">
        @if ($articulo->existeImagen())
            <img class="flex-1 w-1/10 m-auto mt-2 rounded-xl" src="{{ asset($articulo->imagen_url) }}" />
        @endif

        <p class="font-black text-5xl text-center m-auto pt-3"><i class="text-red-500	color: rgb(239 68 68);">Nombre :</i> {{ truncar($articulo->denominacion) }}</p>


        <p class="font-black text-5xl text-center m-auto pt-3"><i class="text-red-500	color: rgb(239 68 68);">Precio :</i> {{ dinero($articulo->precio) }}</p>

        <p class="font-black text-5xl text-center m-auto pt-3"><i class="text-red-500	color: rgb(239 68 68);">IVA :</i> {{ $articulo->iva->por . ' %' }}</p>

        <p class="font-black text-5xl text-center m-auto pt-3"><i class="text-red-500	color: rgb(239 68 68);">Total :</i> {{ dinero($articulo->precio_ii) }}</p>


        <a href="{{ route('articulos.cambiar_imagen', ['articulo' => $articulo]) }}"
            class="m-auto font-medium text-blue-600 dark:text-blue-500 hover:underline flex justify-center items-center mt-2 mb-2">
            <x-primary-button>
                Cambiar imagen
            </x-primary-button>
        </a>
    </div>
</x-app-layout>
