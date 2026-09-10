<x-app-layout>
    <div class="container mt-4">
        <h2>Modifier la catégorie</h2>
        <form method="POST" action="{{ route('categories.update', $category) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" value="{{ $category->nom }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
            </div>
            <button class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</x-app-layout>