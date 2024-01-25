<x-app-layout>
    <div class="w-1/2 mx-auto">
        <!-- Título -->
        <div>
            <x-input-label for="titulo" :value="'Título del libro'" />
            <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo', $libro->titulo)" required
                autofocus autocomplete="titulo" disabled />
        </div>
        <div>
            <x-input-label for="titulo" :value="'Autor del libro'" />
            <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo', $libro->autor)"
                required autofocus autocomplete="titulo" disabled />
        </div>


        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Codigo del Ejemplar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Prestamo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha del Prestamo
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libro->ejemplares as $ejemplar)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $ejemplar->codigo }}
                        </th>
                        @if ($ejemplar->prestamos->isEmpty())
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                No esta Prestado

                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"></th>
                        @else
                        <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Esta prestado</th>
                        <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $ejemplar->prestamos()->first()->created_at }}</th>
                        @endif
                    </tr>
                    @endforeach
            </tbody>

        </table>


        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('libros.index') }}">
                <x-secondary-button class="ms-4">
                    Volver
                    </x-primary-button>
            </a>
        </div>
    </div>
</x-app-layout>
