<x-app-layout>

    <form method="POST" action="{{ route('videojuegos.update', ['videojuego' => $videojuego]) }}">
        @csrf
        @method('PUT')
        <!-- Titulo -->
                <div>
                    <x-input-label for="titulo" :value="'Titulo del Videojuego'" />
                    <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')"
                        required autofocus autocomplete="titulo" />
                    <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
                </div>

                <!-- Año -->
                <div>
                    <x-input-label for="anyo" :value="'Año del videojuego'" />
                    <x-text-input id="anyo" class="block mt-1 w-full" type="text" name="anyo"
                        :value="old('anyo')" required autofocus autocomplete="anyo" />
                    <x-input-error :messages="$errors->get('anyo')" class="mt-2" />
                </div>

                <!-- Desarrolladora -->
                <div>
                    <livewire:desarrolladoras-lista/>
                </div>


                <div class="flex items-center justify-end mt-">
                    <a href="{{ route('videojuegos.index') }}">
                        <x-secondary-button class="m-4">
                            Volver
                        </x-secondary-button>
                    </a>
                    <x-primary-button class="ms-4 bg-green-700">
                        Editar artículo
                    </x-primary-button>
                </div>
            </form>
        </div>
    </x-app-layout>
