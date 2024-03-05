<x-app-layout>
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre">Contenido del Comentario:</label>
            <textarea name="nombre" id="nombre" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="commentable_type">Tipo de Modelo:</label>
            <select name="commentable_type" id="commentable_type" class="form-control" required>
                <option value="Post">Post</option>
                <option value="Image">Imagen</option>
            </select>
        </div>

        <div class="form-group">
            <label for="commentable_id">ID del Modelo:</label>
            <input type="number" name="commentable_id" id="commentable_id" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar Comentario</button>
    </form>
</x-app-layout>
