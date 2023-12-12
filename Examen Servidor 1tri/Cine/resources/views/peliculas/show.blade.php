<div class="max-w-4xl mx-auto p-8 m-8 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold">Pelicula nº {{ $pelicula->id }}</h1>
    <h2 class="text-xl mb-4">Fecha: {{ $pelicula->created_at }}</h2>
    <table class="min-w-full table-auto">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">Titulo</th>
                <th class="px-4 py-2">Entradas Vendidas</th>
            </tr>
        </thead>
        <tbody>
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $pelicula->titulo }}</td>
                    <td class="px-4 py-2">{{ $entradas }}</td>
                </tr>

        </tbody>
    </table>
</div>
