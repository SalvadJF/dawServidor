<x-guest-layout>
    <form method="POST" action="{{ route('articulos.store') }}">
        @csrf

        <!-- Nombre -->
        <div>
            <x-input-label for="nombre" :value="'Nombre del Articulo'" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>
        <!-- Denominacion -->
        <div>
            <x-input-label for="denominacion" :value="'Nombre de la Denominacion'" />
            <x-text-input id="denominacion" class="block mt-1 w-full" type="text" name="denominacion" :value="old('denominacion')" required autofocus autocomplete="denominacion" />
            <x-input-error :messages="$errors->get('denominacion')" class="mt-2" />
        </div>
        <!-- Precio -->
        <div>
            <x-input-label for="precio" :value="'Precio del Articulo'" />
            <x-text-input id="precio" class="block mt-1 w-full" type="text" name="precio" :value="old('precio')" required autofocus autocomplete="precio" />
            <x-input-error :messages="$errors->get('precio')" class="mt-2" />
        </div>
        <!-- Categoria -->
        <div>
            <x-input-label for="categoria" :value="'Nombre de la Categoria'" />
            <x-text-input id="categoria" class="block mt-1 w-full" type="text" name="categoria" :value="old('categoria')" required autofocus autocomplete="categoria" />
            <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('articulos.index') }}">
                <x-secondary-button class="ms-4">
                    Volver
                </x-primary-button>
            </a>
            <x-primary-button class="ms-4">
                Insertar
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
