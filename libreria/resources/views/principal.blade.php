<x-app-layout>
    <div class="flex">
        <div
            class="p-2 grid grid-cols-3 gap-4 justify-center justify-items-center">
            @foreach ($libros as $libro)
                <div
                    class="p-6 max-w-xs min-w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <h5
                            class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $libro->autor->nombre }}
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">

                        {{ $libro->fecha_publicacion }}
                    </p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ $libro->seccion->nombre }}
                    </p>
                </div>
            @endforeach
</x-app-layout>
