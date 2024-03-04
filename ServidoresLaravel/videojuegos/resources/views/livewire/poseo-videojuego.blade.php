<div>
    <select wire:model="videojuegoId">
        <option value="">Seleccionar videojuego</option>
        @foreach($videojuegos as $videojuego)
            <option value="{{ $videojuego->id }}">{{ $videojuego->titulo }}</option>
        @endforeach
    </select>

    <button wire:click="togglePoseo">Lo tengo</button>
    <button wire:click="togglePoseo">No lo tengo</button>
</div>
