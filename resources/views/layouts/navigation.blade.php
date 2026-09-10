<nav class="navbar navbar-expand navbar-dark bg-dark shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold text-white me-4" href="{{ route('home') }}">
      🛒 ShopMarket
    </a>

    <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('home') }}">Accueil</a>
      </li>

      @auth
        @if(Auth::user()->role === 'admin')
          <li class="nav-item">
            <a class="nav-link text-white fw-semibold" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white fw-semibold" href="{{ route('categories.index') }}">Gestion Catégories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white-50" href="#">Gestion Utilisateurs</a>
          </li>
        @endif

        @if(Auth::user()->role === 'vendeur')
          <li class="nav-item">
            <a class="nav-link text-white fw-semibold" href="{{ route('seller.dashboard') }}">Dashboard Vendeur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white fw-semibold" href="{{ route('seller.products.index') }}">Mes Produits</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white-50" href="#">Mes Ventes</a>
          </li>
        @endif

        @if(Auth::user()->role === 'acheteur')
          <li class="nav-item">
            <a class="nav-link text-white fw-semibold" href="{{ route('dashboard') }}">Espace Acheteur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white-50" href="#">Boutique / Catalogue</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white-50" href="#">Mes Commandes</a>
          </li>
        @endif
      @endauth
    </ul>

    <ul class="navbar-nav ms-auto">
      @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            👤 {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
            <li>
              <a class="dropdown-item" href="{{ route('profile.edit') }}">
                ⚙️ Mon Profil
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item text-danger">
                  🚪 Log Out
                </button>
              </form>
            </li>
          </ul>
        </li>
      @else
        <li class="nav-item me-2">
          <a class="btn btn-outline-light btn-sm" href="{{ route('login') }}">Connexion</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary btn-sm" href="{{ route('register') }}">Inscription</a>
        </li>
      @endauth
    </ul>
  </div>
</nav>