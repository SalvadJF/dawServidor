<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST"
            action="{{ route('descriptions.store') }}">
            @csrf

            <!-- Nombre -->
            <div>
                <x-input-label for="description" :value="'Descripción'" />
                <x-text-input id="description" class="block mt-1 w-full"
                    type="text" name="description" :value="old('description')" required
                    autofocus autocomplete="description" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />


            </div>
            <div>
                <x-input-label for="pelicula_id" />
                <x-text-input id="pelicula_id" class="block mt-1 w-full"
                    type="hidden" name="pelicula_id" :value="old('pelicula_id', $pelicula->id )" required
                    autofocus autocomplete="pelicula_id" />
                    <x-input-error :messages="$errors->get('pelicula_id')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('peliculas.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                        </x-primary-button>
                </a>
                <x-primary-button class="ms-4">
                    Editar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
