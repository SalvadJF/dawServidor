<x-app-layout>
    <div class="relative overflow-x-auto w-auto mx-8 mshadow-md sm:rounded-lg">
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Marca : {{ $ordenadore->marca }}
            </h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Modelo : {{ $ordenadore->modelo }}
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Dispositivos :
                {{ $ordenadore->dispositivos->count() }}
                @foreach($ordenadore->dispositivos as $dispositivo)
                    {{ $dispositivo->nombre }}
                @endforeach
            </p>

            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Aula Actual : {{ $ordenadore->aula->nombre }}
            </p>
            <h1>Movimientos :</h1>
                @foreach ($ordenadore->cambios as $cambio)
                <p>Fecha : {{ $cambio->create_at }}</p>
                <p>Origen :{{ $cambio->origen->nombre }}</p>
                <p>Destino : {{ $cambio->destino->nombre }}</p>
                <br>

                @endforeach

            <a href="{{ route('ordenadores.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Volver
            </a>
        </div>
    </div>
</x-app-layout>
