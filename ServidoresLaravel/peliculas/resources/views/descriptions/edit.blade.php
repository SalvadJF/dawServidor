<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST"
            action="{{ route('descriptions.update', ['description' => $description]) }}">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div>
                <x-input-label for="description" :value="'Descripción'" />
                <x-text-input id="description" class="block mt-1 w-full"
                    type="text" name="description" :value="old('description', $pelicula->description)" required
                    autofocus autocomplete="description" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
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
