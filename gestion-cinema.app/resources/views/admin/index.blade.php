<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Cinéma - Connexion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Variables des couleurs */
        :root {
            --primary-color: #ecb674;
            /* Couleur principale, un doré/or */
            --bg-color: #121212;
            /* Fond sombre général */
            --navbar-bg: #1c1c1c;
            /* Fond de la barre de navigation */
            --footer-bg: #1c1c1c;
            /* Fond du footer */
            --banner-bg: rgba(0, 0, 0, 0.6);
            /* Fond de la bannière avec dégradé noir semi-transparent */
            --text-color: #ffffff;
            /* Texte principal en blanc */
            --text-muted: rgba(255, 255, 255, 0.6);
            /* Texte secondaire, moins lumineux */
            --accent-color: #3498db;
            /* Couleur bleue pour les actions */
            --danger-color: #e74c3c;
            /* Couleur rouge pour les alertes */
            --success-color: #2ecc71;
            /* Couleur verte pour les succès */
        }

        /* Styles généraux */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            height: 100vh;
            display: flex;
        }

        /* Page de connexion */
        .login-container {
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100vh;
            background-color: var(--bg-color);
            animation: fadeIn 0.5s;
        }

        .login-container.active {
            display: flex;
        }

        .login-box {
            background-color: var(--navbar-bg);
            padding: 40px;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }

        .login-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-logo h1 {
            color: var(--primary-color);
            font-size: 28px;
            margin-top: 10px;
        }

        .login-form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-muted);
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #333;
            border-radius: 4px;
            background-color: rgba(255, 255, 255, 0.05);
            color: var(--text-color);
            font-size: 16px;
            transition: all 0.3s;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(236, 182, 116, 0.2);
        }

        .login-btn {
            background-color: var(--primary-color);
            color: var(--bg-color);
            border: none;
            padding: 14px;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }

        .login-btn:hover {
            background-color: #d9a562;
        }

        /* Dashboard styles */
        .admin-container {
            display: none;
            width: 100%;
            height: 100vh;
            animation: fadeIn 0.5s;
        }

        .admin-container.active {
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: var(--navbar-bg);
            padding: 20px 0;
            height: 100%;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .admin-logo {
            padding: 0 20px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }

        .admin-logo h2 {
            color: var(--primary-color);
            font-size: 22px;
            display: flex;
            align-items: center;
        }

        .admin-logo h2 i {
            margin-right: 10px;
        }

        .nav-item {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            color: var(--text-muted);
            text-decoration: none;
            transition: all 0.3s;
            margin-bottom: 5px;
            cursor: pointer;
        }

        .nav-item i {
            margin-right: 10px;
            font-size: 18px;
            width: 24px;
            text-align: center;
        }

        .nav-item:hover {
            background-color: rgba(236, 182, 116, 0.1);
            color: var(--primary-color);
        }

        .nav-item.active {
            background-color: rgba(236, 182, 116, 0.15);
            color: var(--primary-color);
            border-left: 3px solid var(--primary-color);
        }

        .main-content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .page-title {
            font-size: 24px;
            color: var(--text-color);
        }

        .user-profile {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            color: var(--bg-color);
            font-weight: bold;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            color: var(--text-color);
        }

        .user-role {
            font-size: 12px;
            color: var(--text-muted);
        }

        /* Dashboard content */
        .dashboard-content {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: var(--navbar-bg);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            background-color: rgba(236, 182, 116, 0.15);
            color: var(--primary-color);
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-label {
            color: var(--text-muted);
            font-size: 14px;
        }

        .section-title {
            margin: 30px 0 15px;
            font-size: 18px;
            color: var(--text-color);
        }

        .film-list {
            background-color: var(--navbar-bg);
            border-radius: 8px;
            overflow: hidden;
        }

        .film-list-header {
            padding: 15px 20px;
            background-color: rgba(236, 182, 116, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .film-list-header h3 {
            color: var(--primary-color);
            font-size: 16px;
        }

        .film-list-body {
            padding: 0;
        }

        .film-item {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .film-poster {
            width: 50px;
            height: 70px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
            margin-right: 15px;
            background-size: cover;
            background-position: center;
        }

        .film-info {
            flex: 1;
        }

        .film-title {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .film-details {
            display: flex;
            color: var(--text-muted);
            font-size: 12px;
        }

        .film-details span {
            margin-right: 15px;
            display: flex;
            align-items: center;
        }

        .film-details i {
            margin-right: 5px;
        }

        .film-status {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-active {
            background-color: rgba(39, 174, 96, 0.2);
            color: var(--success-color);
        }

        .status-scheduled {
            background-color: rgba(41, 128, 185, 0.2);
            color: var(--accent-color);
        }

        /* Table Styles */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: var(--navbar-bg);
            border-radius: 8px;
            overflow: hidden;
        }

        .data-table th {
            text-align: left;
            padding: 15px;
            background-color: rgba(236, 182, 116, 0.1);
            color: var(--primary-color);
            font-weight: 600;
        }

        .data-table td {
            padding: 12px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .data-table tr:last-child td {
            border-bottom: none;
        }

        .data-table tr:hover td {
            background-color: rgba(255, 255, 255, 0.03);
        }

        .action-btn {
            padding: 6px 12px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-size: 12px;
            margin-right: 5px;
            transition: all 0.2s;
        }

        .edit-btn {
            background-color: rgba(41, 128, 185, 0.2);
            color: var(--accent-color);
        }

        .edit-btn:hover {
            background-color: rgba(41, 128, 185, 0.3);
        }

        .delete-btn {
            background-color: rgba(192, 57, 43, 0.2);
            color: var(--danger-color);
        }

        .delete-btn:hover {
            background-color: rgba(192, 57, 43, 0.3);
        }

        /* Bannière (Header) */
        .header-banner {
            background: url('path_to_your_image.jpg') no-repeat center center;
            background-size: cover;
            position: relative;
            height: 300px;
            color: var(--text-color);
        }

        .header-banner:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--banner-bg);
        }

        .content-section {
            flex: 1;
            padding: 40px;
            overflow-y: auto;
        }

        #formParametres {
            background-color: var(--navbar-bg);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            color: var(--text-color);
        }

        #formParametres .form-group label {
            color: var(--text-muted);
        }

        #formParametres input,
        #formParametres select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid #333;
            border-radius: 4px;
            color: var(--text-color);
            transition: border-color 0.3s;
        }

        #formParametres input:focus,
        #formParametres select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(236, 182, 116, 0.2);
        }

        .save-btn {
            background-color: var(--primary-color);
            color: var(--bg-color);
            font-weight: bold;
            padding: 10px 20px;
            margin-top: 15px;
        }

        .save-btn:hover {
            background-color: #d9a562;
        }

        .sidebar {
            width: 250px;
            background-color: var(--navbar-bg);
            /* au lieu de #121212 */
            color: var(--text-color);
            /* ou une couleur secondaire bien définie */
            height: 100vh;
            position: fixed;
            padding: 20px 10px;
            font-family: Arial, sans-serif;
        }

        .sidebar-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #ffcc80;
            padding-left: 10px;
        }

        .sidebar nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .nav-item {
            margin-bottom: 15px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            padding: 10px;
            color: #ddd;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .nav-link:hover {
            background-color: #1f1f1f;
        }

        .nav-link.active {
            background-color: #3d2d1f;
            color: #f9a825;
        }

        .admin-container {
            display: flex;
            height: 100vh;
            width: 100%;
            overflow: hidden;
        }


        .content-section {
            flex: 1;
            /* Prend tout l’espace restant */
            overflow-y: auto;
            background-color: var(--bg-color);
            padding: 40px;
        }


        .nav-link:focus,
        .login-btn:focus,
        .action-btn:focus {
            outline: 2px solid var(--accent-color);
            outline-offset: 2px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 60px;
                padding: 10px 0;
            }

            .sidebar-title {
                display: none;
            }

            .nav-item span {
                display: none;
            }
        }

        @media (min-width: 768px) {

            .main-content,
            .seances,
            .films,
            .annonces,
            .utilisateurs {
                margin-left: 250px;
            }
        }

        * {
            box-sizing: border-box;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #0e0e0e;
            color: white;
            min-height: 100vh;
        }

        /* CONTAINER GLOBAL */
        .wrapper {
            display: flex;
        }

        /* SIDEBAR */
        .sidebar {
            width: 220px;
            background-color: #181818;
            height: 100vh;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            transition: transform 0.3s ease;
            z-index: 1000;
        }

        .sidebar h2 {
            font-size: 24px;
            color: #facc15;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar a {
            display: block;
            color: #ccc;
            text-decoration: none;
            padding: 10px 0;
            font-size: 16px;
            transition: color 0.2s ease;
        }

        .sidebar a:hover {
            color: #facc15;
        }

        /* CONTENU PRINCIPAL */
        .main-content {
            margin-left: 220px;
            padding: 30px;
            flex: 1;
            transition: margin-left 0.3s ease;
        }

        /* BOUTON BURGER */
        .toggle-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 26px;
            padding: 15px;
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 1100;
            cursor: pointer;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .toggle-btn {
                display: block;
            }
        }
    </style>

</head>

<body>
    <!-- Page de Connexion -->
    <div class="login-container active" id="loginPage">
        <div class="login-box">
            <div class="login-logo">
                <i class="fas fa-film" style="font-size: 48px; color: var(--primary-color);"></i>
                <h1>CinéAdmin</h1>
            </div>
            <form class="login-form">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" placeholder="Entrez votre nom d'utilisateur">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" placeholder="Entrez votre mot de passe">
                    <div style="text-align: right; margin-top: 4px;">
                        <a href="#" style="color: var(--primary-color); font-size: 0.9em;">Mot de passe oublié
                            ?</a>
                    </div>
                </div>
                <button type="button" class="login-btn" id="loginBtn">Se connecter</button>
            </form>
        </div>
    </div>

    <!-- Dashboard Admin -->
    <div class="admin-container" id="adminPage">
        <div class="sidebar">
            <div class="admin-logo">
                <h2><i class="fas fa-film"></i> CinéAdmin</h2>
            </div>
            <a class="nav-item active">
                <i class="fas fa-chart-pie"></i> Dashboard
            </a>
            <a class="nav-item" href="seances.html">
                <i class="far fa-clock"></i> Séances
            </a>
            <a class="nav-item" href="films.html">
                <i class="fas fa-film"></i> Films
            </a>
            <a class="nav-item" href="annonces.html">
                <i class="fas fa-bullhorn"></i> Annonces
            </a>
            <a class="nav-item" href="utilisateurs.html">
                <i class="fas fa-users"></i> Utilisateurs
            </a>
            <a class="nav-item" href="parametres.html">
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
                            <div class="film-poster"
                                style="background-image: url('images/dune2.png'); background-size: cover;"></div>
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
                            <div class="film-poster"
                                style="background-image: url('images/wolverine.png'); background-size: cover;"></div>
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
                            <div class="film-poster"
                                style="background-image: url('images/joker2.png'); background-size: cover;"></div>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Cacher le dashboard au démarrage
            const adminPage = document.getElementById('adminPage');
            adminPage.style.display = 'none';

            // Gestion du bouton de connexion
            document.getElementById('loginBtn').addEventListener('click', function() {
                const username = document.getElementById('username').value.trim();
                const password = document.getElementById('password').value.trim();
                const loginPage = document.getElementById('loginPage');

                if (username === 'admin' && password === 'admin') {
                    loginPage.style.display = 'none'; // Cache la page de connexion
                    adminPage.style.display = 'flex'; // Affiche le dashboard
                } else {
                    alert("Nom d'utilisateur ou mot de passe incorrect.");
                }
            });
        });
    </script>



</body>

</html>
