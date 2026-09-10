<x-app-layout>
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 fw-bold">Mes Produits</h1>
            <a href="{{ route('seller.products.create') }}" class="btn btn-primary">➕ Ajouter un produit</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="bg-white rounded shadow-sm p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Catégorie</th>
                            <th>Prix</th>
                            <th>Stock</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td style="width: 80px;">
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted" style="width: 50px; height: 50px; font-size: 10px;">
                                            No img
                                        </div>
                                    @endif
                                </td>
                                <td class="fw-bold">{{ $product->nom }}</td>
                                <td><span class="badge bg-secondary">{{ $product->category->nom ?? 'Général' }}</span></td>
                                <td>{{ number_format($product->prix, 2, ',', ' ') }} €</td>
                                <td>
                                    @if($product->stock > 0)
                                        <span class="badge bg-success">{{ $product->stock }}</span>
                                    @else
                                        <span class="badge bg-danger">0 (Rupture)</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('seller.products.edit', $product) }}" class="btn btn-sm btn-outline-warning">✏️ Modifier</a>
                                    <form action="{{ route('seller.products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ce produit ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">🗑️</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    Vous n'avez encore aucun produit en vente.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>