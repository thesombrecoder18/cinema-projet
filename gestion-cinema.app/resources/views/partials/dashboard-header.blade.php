<!-- resources/views/partials/dashboard-header.blade.php -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background: #343a40;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Cinema Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDashboard" aria-controls="navbarDashboard" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarDashboard">
      <!-- Menu de navigation principal -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Films</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Réservations</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Statistiques</a>
        </li>
      </ul>

      <!-- Barre de recherche de films -->
      <form class="d-flex me-3" action="{{ route('movies.search') }}" method="GET">
        <input class="form-control me-2" type="search" name="query" placeholder="Rechercher un film..." aria-label="Search">
        <button class="btn btn-outline-light" type="submit">
          <i class='bx bx-search'></i>
        </button>
      </form>

      <!-- Menu utilisateur -->
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class='bx bx-user'></i> Profil
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="#">Mon profil</a></li>
            <li><a class="dropdown-item" href="#">Paramètres</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">Déconnexion</button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
