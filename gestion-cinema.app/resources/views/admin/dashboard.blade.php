<!-- filepath: c:\Users\elizo\Desktop\PROJECT\cinema-projet\gestion-cinema.app\resources\views\admin\dashboard.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar Navigation -->
        <div class="sidebar">
            <div class="admin-logo">
                <h2><i class="fas fa-film"></i> CinéAdmin</h2>
            </div>
            <a class="nav-item active" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-chart-pie"></i> Dashboard
            </a>
            <a class="nav-item" href="{{ route('admin.seances') }}">
                <i class="far fa-clock"></i> Séances
            </a>
            <a class="nav-item" href="{{ route('admin.movies') }}">
                <i class="fas fa-film"></i> Films
            </a>
            <a class="nav-item" href="{{ route('admin.annonces') }}">
                <i class="fas fa-bullhorn"></i> Annonces
            </a>
            <a class="nav-item" href="{{ route('admin.users') }}">
                <i class="fas fa-users"></i> Utilisateurs
            </a>
            <a class="nav-item" href="{{ route('admin.settings') }}">
                <i class="fas fa-cog"></i> Paramètres
            </a>
        </div>

        <div class="main-content">
            <div class="header">
                <h1 class="page-title">Dashboard</h1>
                <div class="user-profile">
                    <div class="user-avatar">A</div>
                    <div class="user-info">
                        <div class="user-name">Admin</div>
                        <div class="user-role">Administrateur</div>
                    </div>
                </div>
            </div>

            <!-- Contenu du Dashboard -->
            <div class="content-section active" id="dashboard-content">
                <div class="dashboard-content">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        <div class="stat-value">1,254</div>
                        <div class="stat-label">Tickets vendus</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-film"></i>
                        </div>
                        <div class="stat-value">18</div>
                        <div class="stat-label">Films actifs</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-value">532</div>
                        <div class="stat-label">Membres</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-euro-sign"></i>
                        </div>
                        <div class="stat-value">9 845 €</div>
                        <div class="stat-label">Revenus mensuels</div>
                    </div>
                </div>

                <h2 class="section-title">Films à l'affiche</h2>
                <div class="film-list">
                    <div class="film-list-header">
                        <h3>Films populaires</h3>
                        <button class="action-btn edit-btn">Voir tout</button>
                    </div>
                    <div class="film-list-body">
                        <div class="film-item">
                            <div class="film-poster" style="background-image: url('images/dune2.png'); background-size: cover;"></div>
                            <div class="film-info">
                                <div class="film-title">Dune: Partie 2</div>
                                <div class="film-details">
                                    <span><i class="fas fa-clock"></i> 155 min</span>
                                    <span><i class="fas fa-ticket-alt"></i> 412 ventes</span>
                                </div>
                            </div>
                            <div class="film-status status-active">À l'affiche</div>
                        </div>
                        <div class="film-item">
                            <div class="film-poster" style="background-image: url('images/wolverine.png'); background-size: cover;"></div>
                            <div class="film-info">
                                <div class="film-title">Deadpool & Wolverine</div>
                                <div class="film-details">
                                    <span><i class="fas fa-clock"></i> 123 min</span>
                                    <span><i class="fas fa-ticket-alt"></i> 384 ventes</span>
                                </div>
                            </div>
                            <div class="film-status status-active">À l'affiche</div>
                        </div>
                        <div class="film-item">
                            <div class="film-poster" style="background-image: url('images/joker2.png'); background-size: cover;"></div>
                            <div class="film-info">
                                <div class="film-title">Joker: Folie à Deux</div>
                                <div class="film-details">
                                    <span><i class="fas fa-clock"></i> 138 min</span>
                                    <span><i class="fas fa-ticket-alt"></i> 201 ventes</span>
                                </div>
                            </div>
                            <div class="film-status status-scheduled">À venir</div>
                        </div>
                    </div>
                </div>

                <h2 class="section-title">Séances du jour</h2>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Film</th>
                            <th>Salle</th>
                            <th>Horaire</th>
                            <th>Places disponibles</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Dune: Partie 2</td>
                            <td>Salle 1</td>
                            <td>14:30</td>
                            <td>42 / 120</td>
                            <td>
                                <button class="action-btn edit-btn">Modifier</button>
                                <button class="action-btn delete-btn">Supprimer</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Deadpool & Wolverine</td>
                            <td>Salle 2</td>
                            <td>15:00</td>
                            <td>28 / 80</td>
                            <td>
                                <button class="action-btn edit-btn">Modifier</button>
                                <button class="action-btn delete-btn">Supprimer</button>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Deadpool & Wolverine</td>
                            <td>Salle 3</td>
                            <td>19:30</td>
                            <td>45 / 60</td>
                            <td>
                                <button class="action-btn edit-btn">Modifier</button>
                                <button class="action-btn delete-btn">Supprimer</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>
</html>