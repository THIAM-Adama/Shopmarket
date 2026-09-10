<x-app-layout>
    <!-- Hero Banner -->
    <div class="bg-dark text-white py-5 mb-4 shadow-sm">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Bienvenue sur ShopMarket 🛒</h1>
            <p class="lead">Découvrez les meilleurs produits proposés par nos vendeurs indépendants.</p>
        </div>
    </div>

    <div class="container mb-5">
        <!-- Barre de recherche et filtres -->
        <form method="GET" action="{{ route('home') }}" class="row g-3 mb-4">
            <div class="col-md-6">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="🔍 Rechercher un produit...">
            </div>
            <div class="col-md-4">
                <select name="category" class="form-select">
                    <option value="">Toutes les catégories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Filtrer</button>
            </div>
        </form>

        <!-- Grille de produits -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse($products as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->nom }}" style="height: 220px; object-fit: cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 220px;">
                                <span class="text-muted">Aucune image</span>
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title fw-bold mb-0">{{ $product->nom }}</h5>
                                <span class="badge bg-secondary">{{ $product->category->nom ?? 'Général' }}</span>
                            </div>
                            <p class="card-text text-muted flex-grow-1">
                                {{ Str::limit($product->description, 90, '...') }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fs-4 fw-bold text-primary">{{ number_format($product->prix, 2, ',', ' ') }} €</span>
                                <a href="{{ route('products.show', $product) }}" class="btn btn-outline-primary btn-sm">
                                    👁️ Voir l'article
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="fs-5 text-muted">Aucun produit ne correspond à votre recherche.</p>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">Réinitialiser les filtres</a>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>