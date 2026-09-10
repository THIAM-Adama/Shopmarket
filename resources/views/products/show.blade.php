<x-app-layout>
    <div class="container py-5">
        <a href="{{ route('home') }}" class="btn btn-outline-secondary mb-4">⬅️ Retour à la boutique</a>

        <div class="row g-4 bg-white p-4 rounded shadow-sm">
            <!-- Image du produit -->
            <div class="col-md-6 text-center">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->nom }}" class="img-fluid rounded border style-img">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 350px;">
                        <span class="text-muted fs-5">Aucune image disponible</span>
                    </div>
                @endif
            </div>

            <!-- Infos du produit -->
            <div class="col-md-6 d-flex flex-column justify-content-between">
                <div>
                    <div class="mb-2">
                        <span class="badge bg-secondary">{{ $product->category->nom ?? 'Général' }}</span>
                        <small class="text-muted ms-2">Vendu par <strong>{{ $product->user->name ?? 'Boutique' }}</strong></small>
                    </div>

                    <h1 class="fw-bold mb-3">{{ $product->nom }}</h1>
                    <h2 class="text-primary fw-bold mb-4">{{ number_format($product->prix, 2, ',', ' ') }} €</h2>

                    <p class="text-muted mb-4">{{ $product->description ?? 'Aucune description disponible pour ce produit.' }}</p>

                    <div class="mb-4">
                        <strong>Disponibilité :</strong>
                        @if($product->stock > 0)
                            <span class="badge bg-success">{{ $product->stock }} en stock</span>
                        @else
                            <span class="badge bg-danger">Rupture de stock</span>
                        @endif
                    </div>
                </div>

                <!-- Bouton Panier -->
                <div>
                    @if($product->stock > 0)
                        <button class="btn btn-primary btn-lg w-100 shadow-sm" disabled>
                            🛒 Ajouter au panier (Étape suivante)
                        </button>
                    @else
                        <button class="btn btn-secondary btn-lg w-100" disabled>
                            Indisponible
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>