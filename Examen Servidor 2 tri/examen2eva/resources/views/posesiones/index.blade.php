<x-app-layout>
    <select>
        @foreach($videojuegos as $videojuego)
            <option>$videojuego</option>
        @endforeach
    </select>
    <x-primary-button class="bg-blue-500">
        Lo tengo
    </x-primary-button>
    <x-primary-button class="bg-red-500">
        No lo tengo
    </x-primary-button>
</x-app-layout>
