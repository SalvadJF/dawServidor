<x-app-layout>
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <!-- Titulo -->
            <div>
                <x-input-label for="titulo" :value="'Nombre del titulo'" />
                <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo"
                    :value="old('titulo')" required autofocus autocomplete="titulo" />
                <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
            </div>

            <!-- Contenido -->
            <div>
                <x-input-label for="contenido" :value="'Contenido del post'" />
                <x-text-input id="contenido" class="block mt-1 w-full" type="text" name="contenido"
                    :value="old('contenido')" required autofocus autocomplete="contenido" />
                <x-input-error :messages="$errors->get('contenido')" class="mt-2" />
            </div>
            <!-- Categoria -->
            <div>
                <select id="categoria_id" name="categoria_id" required
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <! Usuario -->
            <input type="hidden" name="usuario" value="{{ auth()->user()->id }}">
            <div class="flex items-center justify-end mt-">
                <a href="{{ route('posts.index') }}">
                    <x-secondary-button class="m-4">
                        Volver
                    </x-secondary-button>
                </a>
                <x-primary-button class="ms-4 bg-green-700">
                    Crear artículo
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
