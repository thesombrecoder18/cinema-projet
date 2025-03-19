@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar de navigation -->
    <nav class="col-md-2 d-none d-md-block bg-dark sidebar" style="min-height: 100vh;">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active text-white" href="#">
              <i class='bx bx-home'></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">
              <i class='bx bx-film'></i>
              Films
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">
              <i class='bx bx-calendar'></i>
              Horaires
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">
              <i class='bx bx-user'></i>
              Utilisateurs
            </a>
          </li>
          <!-- Ajoute d'autres éléments de navigation si besoin -->
        </ul>
      </div>
    </nav>

    <!-- Contenu principal -->
    <main role="main" class="col-md-10 ml-sm-auto px-4">
      <!-- Barre supérieure -->
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button class="btn btn-sm btn-outline-secondary">Exporter</button>
            <button class="btn btn-sm btn-outline-secondary">Partager</button>
          </div>
          <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <i class="bx bx-calendar"></i> Cette semaine
          </button>
        </div>
      </div>

      <!-- Cartes statistiques -->
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card text-white bg-primary">
            <div class="card-header">Films</div>
            <div class="card-body">
              <h5 class="card-title">120</h5>
              <p class="card-text">Films actuellement affichés.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card text-white bg-success">
            <div class="card-header">Réservations</div>
            <div class="card-body">
              <h5 class="card-title">350</h5>
              <p class="card-text">Réservations ce mois.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card text-white bg-danger">
            <div class="card-header">Utilisateurs</div>
            <div class="card-body">
              <h5 class="card-title">500</h5>
              <p class="card-text">Utilisateurs inscrits.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Section Activité récente / Graphiques -->
      <div class="card mb-4">
        <div class="card-header">
          Activité récente
        </div>
        <div class="card-body">
          <p>Insérez ici des graphiques ou une liste d'activités récentes, par exemple des réservations ou des inscriptions.</p>
        </div>
      </div>
    </main>
  </div>
</div>
@endsection

@section('styles')
<!-- Tu peux ajouter ici des styles personnalisés pour le dashboard -->
<style>
  /* Exemple de style pour la sidebar */
  .sidebar {
    background: #343a40;
  }
  .sidebar .nav-link {
    font-size: 16px;
    padding: 10px 15px;
  }
  .sidebar .nav-link.active {
    background: #ecb674;
  }
</style>
@endsection

@section('scripts')
<!-- Optionnel : ajouter des scripts spécifiques au dashboard -->
<script>
  // Exemple : script pour la gestion des interactions dans la sidebar
  document.addEventListener('DOMContentLoaded', function(){
      // ton code ici si besoin
  });
</script>
@endsection
