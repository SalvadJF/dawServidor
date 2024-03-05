<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST"
            action="{{ route('ordenadores.cambiar', ['ordenadore' => $ordenadore]) }}">
            @csrf
            @method('POST')

            <!-- Aula Actual -->
            <div>
                <h3>Aula Actual : {{ $ordenadore->aula->nombre }}</h3>
            </div>
            <!-- Nueva Aula -->
            <div>
                <x-input-label for="aula_id" :value="'Nueva Aula'" />
                <select id="aula_id"
                class="border-grai-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                name="aula_id" required>
                @foreach ($aulas as $aula)
                    <option value="{{ $aula->id }}" {{ old('aula_id') == $aula->id ? 'selected' : '' }}>
                        {{ $aula->nombre }}
                    </option>
                @endforeach
            </select>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('ordenadores.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                        </x-primary-button>
                </a>
                <x-primary-button class="ms-4">
                    Insertar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>

