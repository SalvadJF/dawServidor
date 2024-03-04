<div>
    <label for="distribuidora">Distribuidora</label>
    <select wire:model="distribuidoraId" id="distribuidora">
        <option value="">Selecciona una distribuidora</option>
        @foreach ($distribuidoras as $distribuidora)
            <option value="{{ $distribuidora->id }}">{{ $distribuidora->nombre }}</option>
        @endforeach
    </select>

    <label for="desarrolladora">Desarrolladora</label>
    <select id="desarrolladora">
        <option value="">Selecciona una desarrolladora</option>
        @foreach ($desarrolladoras as $desarrolladora)
            <option value="{{ $desarrolladora->id }}">{{ $desarrolladora->nombre }}</option>
        @endforeach
    </select>
</div>
