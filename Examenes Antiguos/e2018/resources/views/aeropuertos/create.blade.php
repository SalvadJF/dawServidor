<x-app-layout>
    <form method="POST" action="{{ route('aeropuertos.store') }}">
        @csrf
        <!-- Name -->
        <div class="flex-block items-center justify-center m-auto">
            <div class="flex-1 ml-5">
                <x-input-label for="nombre" :value="'Nombre del aeropuerto'" />
                <x-text-input id="nombre" class="block mt-1 w-1/2 m-auto" type="text" name="nombre" :value="old('nombre')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                <x-input-label for="codigo" :value="'Codigo del aeropuerto'" />
                <x-text-input id="codigo" class="block mt-1 w-1/2 m-auto" type="text" name="codigo"
                    :value="old('codigo')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="flex-1 mt-2">
                <a href="{{ route('aeropuertos.index') }}">
                    <x-secondary-button class="m-auto">
                        Volver
                    </x-secondary-button>
                </a>
                <x-primary-button class="m-auto">
                    Insertar
                </x-primary-button>
            </div>
            </div>
            <div>
    </form>
</x-app-layout>
