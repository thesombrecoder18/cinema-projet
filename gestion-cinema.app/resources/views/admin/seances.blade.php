<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Séances - CinéAdmin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{ asset('css/admin/styleSeance.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <h1 class="sidebar-title">🎬 CinéAdmin</h1>
        <nav>
            <ul>
                <li class="nav-item">
                    <a href="dashboard.html" class="nav-link"><i class="fas fa-chart-pie"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="seances.html" class="nav-link active"><i class="fas fa-clock"></i> Séances</a>
                </li>
                <li class="nav-item">
                    <a href="films.html" class="nav-link"><i class="fas fa-film"></i> Films</a>
                </li>
                <li class="nav-item">
                    <a href="annonces.html" class="nav-link"><i class="fas fa-bullhorn"></i> Annonces</a>
                </li>
                <li class="nav-item">
                    <a href="utilisateurs.html" class="nav-link"><i class="fas fa-users"></i> Utilisateurs</a>
                </li>
                <li class="nav-item">
                    <a href="parametres.html" class="nav-link"><i class="fas fa-cog"></i> Paramètres</a>
                </li>
            </ul>
        </nav>
    </aside>

    <div class="content-section" id="seances-content">
        <div class="section-header">
            <h2 class="section-title"><i class="fas fa-clock"></i> Gestion des Séances</h2>
            <button id="open-modal-btn" class="action-btn"><i class="fas fa-plus"></i> Programmer une séance</button>
        </div>

        <!-- Cartes statistiques -->
        <div class="stats-cards">
            <div class="stat-card">
                <div class="stat-card-title">Séances aujourd'hui</div>
                <div class="stat-card-value">8</div>
                <div class="stat-card-trend trend-up">
                    <i class="fas fa-arrow-up"></i> +2 vs hier
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-card-title">Taux d'occupation moyen</div>
                <div class="stat-card-value">68%</div>
                <div class="stat-card-trend trend-up">
                    <i class="fas fa-arrow-up"></i> +5% cette semaine
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-card-title">Billets vendus aujourd'hui</div>
                <div class="stat-card-value">172</div>
                <div class="stat-card-trend trend-down">
                    <i class="fas fa-arrow-down"></i> -28 vs hier
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-card-title">Film le plus programmé</div>
                <div class="stat-card-value">Dune: Partie 2</div>
                <div class="stat-card-trend">
                    12 séances cette semaine
                </div>
            </div>
        </div>

        <!-- Table des Séances -->
        <div class="data-table-container">
            <div class="data-table-header">
                <h3 class="table-title">Liste des séances</h3>
                <div class="filters">
                    <div class="search-filter">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Rechercher une séance..." id="search-input">
                    </div>
                    <select id="filter-date">
                        <option value="all">Toutes les dates</option>
                        <option value="today" selected>Aujourd'hui</option>
                        <option value="tomorrow">Demain</option>
                        <option value="week">Cette semaine</option>
                    </select>
                </div>
            </div>
            
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Film</th>
                        <th>Date</th>
                        <th>Horaire</th>
                        <th>Salle</th>
                        <th>Places</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="seances-list">
                    <tr id="S001">
                        <td>S001</td>
                        <td>Dune: Partie 2</td>
                        <td>13/04/2025</td>
                        <td>14:30</td>
                        <td>Salle 1</td>
                        <td>
                            <div class="seats-info">
                                <span>78 / 120</span>
                                <div style="flex-grow: 1;">
                                    <div class="seats-progress">
                                        <div class="seats-progress-bar" style="width: 65%;"></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-success">
                                <span class="status-dot dot-success"></span>
                                Confirmée
                            </span>
                        </td>
                        <td class="actions-cell">
                            <button class="action-btn action-btn-sm secondary" onclick="viewSeance('S001')">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="action-btn action-btn-sm secondary" onclick="editSeance('S001')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="action-btn action-btn-sm danger" onclick="confirmDelete('S001')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr id="S002">
                        <td>S002</td>
                        <td>Deadpool & Wolverine</td>
                        <td>13/04/2025</td>
                        <td>15:00</td>
                        <td>Salle 2</td>
                        <td>
                            <div class="seats-info">
                                <span>52 / 80</span>
                                <div style="flex-grow: 1;">
                                    <div class="seats-progress">
                                        <div class="seats-progress-bar" style="width: 65%;"></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-warning">
                                <span class="status-dot dot-warning"></span>
                                En cours
                            </span>
                        </td>
                        <td class="actions-cell">
                            <button class="action-btn action-btn-sm secondary" onclick="viewSeance('S002')">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="action-btn action-btn-sm secondary" onclick="editSeance('S002')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="action-btn action-btn-sm danger" onclick="confirmDelete('S002')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr id="S003">
                        <td>S003</td>
                        <td>Dune: Partie 2</td>
                        <td>13/04/2025</td>
                        <td>18:00</td>
                        <td>Salle 1</td>
                        <td>
                            <div class="seats-info">
                                <span>42 / 120</span>
                                <div style="flex-grow: 1;">
                                    <div class="seats-progress">
                                        <div class="seats-progress-bar" style="width: 35%;"></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-success">
                                <span class="status-dot dot-success"></span>
                                Confirmée
                            </span>
                        </td>
                        <td class="actions-cell">
                            <button class="action-btn action-btn-sm secondary" onclick="viewSeance('S003')">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="action-btn action-btn-sm secondary" onclick="editSeance('S003')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="action-btn action-btn-sm danger" onclick="confirmDelete('S003')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr id="S004">
                        <td>S004</td>
                        <td>Joker: Folie à Deux</td>
                        <td>14/04/2025</td>
                        <td>20:00</td>
                        <td>Salle 3</td>
                        <td>
                            <div class="seats-info">
                                <span>0 / 60</span>
                                <div style="flex-grow: 1;">
                                    <div class="seats-progress">
                                        <div class="seats-progress-bar" style="width: 0%;"></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-danger">
                                <span class="status-dot dot-danger"></span>
                                À confirmer
                            </span>
                        </td>
                        <td class="actions-cell">
                            <button class="action-btn action-btn-sm secondary" onclick="viewSeance('S004')">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="action-btn action-btn-sm secondary" onclick="editSeance('S004')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="action-btn action-btn-sm danger" onclick="confirmDelete('S004')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Modale Programmer/Modifier une séance -->
        <div id="seance-modal" class="modal-overlay" style="display: none;">
            <div class="modal">
                <div class="modal-header">
                    <h3 id="modal-title"><i class="fas fa-plus-circle"></i> Programmer une séance</h3>
                    <button class="close-btn" id="close-modal-btn">×</button>
                </div>
                <form id="modal-seance-form" class="modal-body">
                    <input type="hidden" id="edit-seance-id" name="edit-seance-id" value="">
                    <input type="hidden" id="form-mode" name="form-mode" value="add">
                    
                    <div class="modal-form-grid">
                        <div>
                            <div class="form-group">
                                <label for="film">Film</label>
                                <select id="film" name="film" required onchange="updateFilmInfo()">
                                    <option value="">Sélectionner un film</option>
                                    <option value="Joker: Folie à Deux">Joker: Folie à Deux</option>
                                    <option value="Deadpool & Wolverine">Deadpool & Wolverine</option>
                                    <option value="Dune: Partie 2">Dune: Partie 2</option>
                                </select>
                            </div>

                            <div class="film-info" id="film-info" style="display: none;">
                                <img src="/api/placeholder/400/200" alt="Film poster" class="film-image" id="film-poster">
                                <div class="film-duration">
                                    <i class="fas fa-clock"></i> <span id="film-duration">0</span> minutes
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" id="date" name="date" required>
                            </div>

                            <div class="form-group">
                                <label for="horaire">Heure</label>
                                <input type="time" id="horaire" name="horaire" required>
                            </div>

                            <div class="form-group">
                                <label for="salle">Salle</label>
                                <select id="salle" name="salle" required onchange="updateCapacity()">
                                    <option value="">Sélectionner une salle</option>
                                    <option value="Salle 1">Salle 1 (120 places)</option>
                                    <option value="Salle 2">Salle 2 (80 places)</option>
                                    <option value="Salle 3">Salle 3 (60 places)</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-full-width">
                            <div class="form-group">
                                <label for="status">Statut de la séance</label>
                                <div class="status-options">
                                    <div class="status-option" data-value="confirmed" onclick="selectStatus(this)">
                                        <span class="status-dot dot-success"></span> Confirmée
                                    </div>
                                    <div class="status-option" data-value="pending" onclick="selectStatus(this)">
                                        <span class="status-dot dot-danger"></span> À confirmer
                                    </div>
                                    <div class="status-option" data-value="inProgress" onclick="selectStatus(this)">
                                        <span class="status-dot dot-warning"></span> En cours
                                    </div>
                                </div>
                                <input type="hidden" id="status" name="status" value="confirmed">
                            </div>
                        </div>

                        <div class="form-full-width" id="capacity-section" style="display: none;">
                            <h4>Allocation des places</h4>
                            <div class="capacity-slider">
                                <label for="places-slider">Places réservées:</label>
                                <input type="range" id="places-slider" min="0" max="100" value="0" oninput="updateSeatsDisplay()">
                                <span id="seats-display" class="seats-display">0 / 100</span>
                            </div>
                            
                            <input type="hidden" id="places-vendues" name="places-vendues" value="0">
                            <input type="hidden" id="places-totales" name="places-totales" value="100">
                        </div>

                        <div class="form-full-width" id="price-section">
                            <h4>Tarifs</h4>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                                <div class="form-group">
                                    <label for="tarif-normal">Tarif normal (€)</label>
                                    <input type="number" id="tarif-normal" value="9.50" min="0" step="0.50">
                                </div>
                                <div class="form-group">
                                    <label for="tarif-reduit">Tarif réduit (€)</label>
                                    <input type="number" id="tarif-reduit" value="7.50" min="0" step="0.50">
                                </div>
                            </div>
                        </div>

                        <div class="form-full-width" id="notes-section">
                            <div class="form-group">
                                <label for="notes">Notes supplémentaires</label>
                                <textarea id="notes" rows="3" placeholder="Informations additionnelles sur la séance..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="action-btn secondary" id="cancel-modal-btn">Annuler</button>
                        <button type="submit" class="action-btn" id="submit-btn">
                            <i class="fas fa-check"></i> <span id="submit-btn-text">Programmer</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modale de confirmation de suppression -->
        <div id="delete-modal" class="modal-overlay" style="display: none;">
            <div class="modal" style="max-width: 450px;">
                <div class="modal-header">
                    <h3><i class="fas fa-exclamation-triangle"></i> Confirmation</h3>
                    <button class="close-btn" id="close-delete-modal">×</button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer cette séance ?</p>
                    <p>Cette action est irréversible.</p>
                </div>
                <div class="modal-footer">
                    <button class="action-btn secondary" id="cancel-delete">Annuler</button>
                    <button class="action-btn danger" id="confirm-delete">Supprimer</button>
                </div>
            </div>
        </div>

        <!-- Modale de visualisation de séance -->
        <div id="view-modal" class="modal-overlay" style="display: none;">
            <div class="modal">
                <div class="modal-header">
                    <h3><i class="fas fa-eye"></i> Détails de la séance</h3>
                    <button class="close-btn" id="close-view-modal">×</button>
                </div>
                <div class="modal-body">
                    <div id="seance-details" class="view-details">
                        <div class="film-poster-container view-details-full">
                            <img id="view-film-poster" src="/api/placeholder/400/200" alt="Film poster">
                        </div>

                        <div class="view-detail-item">
                            <div class="view-detail-label">Film</div>
                            <div id="view-film" class="view-detail-value">-</div>
                        </div>

                        <div class="view-detail-item">
                            <div class="view-detail-label">Durée</div>
                            <div id="view-duration" class="view-detail-value">-</div>
                        </div>

                        <div class="view-detail-item">
                            <div class="view-detail-label">Date</div>
                            <div id="view-date" class="view-detail-value">-</div>
                        </div>

                        <div class="view-detail-item">
                            <div class="view-detail-label">Horaire</div>
                            <div id="view-horaire" class="view-detail-value">-</div>
                        </div>

                        <div class="view-detail-item">
                            <div class="view-detail-label">Salle</div>
                            <div id="view-salle" class="view-detail-value">-</div>
                        </div>

                        <div class="view-detail-item">
                            <div class="view-detail-label">Statut</div>
                            <div id="view-status" class="view-detail-value">-</div>
                        </div>

                        <div class="view-details-full">
                            <div class="view-detail-label">Occupation</div>
                            <div class="view-detail-value">
                                <div id="view-seats-text">-</div>
                                <div class="seats-visual">
                                    <span id="view-seats-percentage" class="seats-count">0%</span>
                                    <div style="flex-grow: 1;">
                                        <div class="seats-progress">
                                            <div id="view-seats-bar" class="seats-progress-bar" style="width: 0%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="view-detail-item">
                            <div class="view-detail-label">Tarif normal</div>
                            <div id="view-tarif-normal" class="view-detail-value">-</div>
                        </div>

                        <div class="view-detail-item">
                            <div class="view-detail-label">Tarif réduit</div>
                            <div id="view-tarif-reduit" class="view-detail-value">-</div>
                        </div>

                        <div class="view-details-full">
                            <div class="view-detail-label">Notes</div>
                            <div id="view-notes" class="view-detail-value">-</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="action-btn secondary" id="close-view-btn">Fermer</button>
                    <button class="action-btn" id="edit-from-view-btn">
                        <i class="fas fa-edit"></i> Modifier
                    </button>
                </div>
            </div>
        </div>

        <!-- Notification -->
        <div id="notification" class="notification"></div>
    </div>

    <script>
        // Variables globales
        let seanceToDelete = null;
        let currentViewSeanceId = null;
        const filmDurations = {
            "Joker: Folie à Deux": 138,
            "Deadpool & Wolverine": 127,
            "Dune: Partie 2": 166
        };
        
        const salleCapacities = {
            "Salle 1": 120,
            "Salle 2": 80,
            "Salle 3": 60
        };

        const filmPosters = {
            "Joker: Folie à Deux": "img/joker.jpg",
            "Deadpool & Wolverine": "img/deadpool.jpg",
            "Dune: Partie 2": "img/dune.jpg"
        };

        // Fonction pour afficher une notification
        function showNotification(message, type) {
            const notification = document.getElementById('notification');
            notification.textContent = message;
            notification.className = `notification ${type}`;
            notification.classList.add('show');
            
            setTimeout(() => {
                notification.classList.remove('show');
            }, 3000);
        }

        // Initialiser la date du jour dans le formulaire
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date();
            const formattedDate = today.toISOString().split('T')[0];
            document.getElementById('date').value = formattedDate;
        });

        // Mettre à jour les informations du film sélectionné
        function updateFilmInfo() {
            const film = document.getElementById('film').value;
            const filmInfo = document.getElementById('film-info');
            const poster = document.getElementById('film-poster');
            const duration = document.getElementById('film-duration');

            if (film && filmDurations[film]) {
                duration.textContent = filmDurations[film];
                poster.src = filmPosters[film] || "/api/placeholder/400/200";
                filmInfo.style.display = 'block';
                document.getElementById('price-section').style.display = 'block';
            } else {
                filmInfo.style.display = 'none';
            }
        }

        // Mettre à jour la capacité en fonction de la salle
        function updateCapacity() {
            const salle = document.getElementById('salle').value;
            const capacitySection = document.getElementById('capacity-section');
            const capacity = salleCapacities[salle];
            if (capacity) {
                document.getElementById('places-slider').max = capacity;
                document.getElementById('places-totales').value = capacity;
                updateSeatsDisplay();
                capacitySection.style.display = 'block';
            } else {
                capacitySection.style.display = 'none';
            }
        }

        // Mettre à jour l'affichage des places
        function updateSeatsDisplay() {
            const slider = document.getElementById('places-slider');
            const display = document.getElementById('seats-display');
            const hiddenInput = document.getElementById('places-vendues');
            const total = document.getElementById('places-totales').value;
            display.textContent = `${slider.value} / ${total}`;
            hiddenInput.value = slider.value;
        }

        // Sélectionner un statut
        function selectStatus(element) {
            // Retirer la classe active de tous les éléments
            document.querySelectorAll('.status-option').forEach(el => {
                el.classList.remove('active');
            });
            
            // Ajouter la classe active à l'élément cliqué
            element.classList.add('active');
            
            // Mettre à jour la valeur du champ caché
            document.getElementById('status').value = element.getAttribute('data-value');
        }

        // Fonction pour réinitialiser le formulaire
        function resetForm() {
            document.getElementById('modal-seance-form').reset();
            document.getElementById('film-info').style.display = 'none';
            document.getElementById('capacity-section').style.display = 'none';
            document.getElementById('edit-seance-id').value = '';
            document.getElementById('form-mode').value = 'add';
            document.getElementById('modal-title').innerHTML = '<i class="fas fa-plus-circle"></i> Programmer une séance';
            document.getElementById('submit-btn-text').textContent = 'Programmer';
            
            // Réinitialiser les statuts
            document.querySelectorAll('.status-option').forEach(el => {
                el.classList.remove('active');
            });
            document.querySelector('.status-option[data-value="confirmed"]').classList.add('active');
            document.getElementById('status').value = 'confirmed';
            
            // Définir la date à aujourd'hui
const today = new Date();
const formattedDate = today.toISOString().split('T')[0];
document.getElementById('date').value = formattedDate;
}

// Ouvrir le modal de programmation
document.getElementById('open-modal-btn').addEventListener('click', function() {
    resetForm();
    document.getElementById('seance-modal').style.display = 'flex';
});

// Fermer les modals
document.getElementById('close-modal-btn').addEventListener('click', function() {
    document.getElementById('seance-modal').style.display = 'none';
});

document.getElementById('cancel-modal-btn').addEventListener('click', function() {
    document.getElementById('seance-modal').style.display = 'none';
});

document.getElementById('close-delete-modal').addEventListener('click', function() {
    document.getElementById('delete-modal').style.display = 'none';
});

document.getElementById('cancel-delete').addEventListener('click', function() {
    document.getElementById('delete-modal').style.display = 'none';
});

document.getElementById('close-view-modal').addEventListener('click', function() {
    document.getElementById('view-modal').style.display = 'none';
});

document.getElementById('close-view-btn').addEventListener('click', function() {
    document.getElementById('view-modal').style.display = 'none';
});

// Traitement du formulaire de séance
document.getElementById('modal-seance-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const formMode = document.getElementById('form-mode').value;
    const film = document.getElementById('film').value;
    const date = document.getElementById('date').value;
    const horaire = document.getElementById('horaire').value;
    const salle = document.getElementById('salle').value;
    const status = document.getElementById('status').value;
    const seanceId = document.getElementById('edit-seance-id').value || 'S00' + (document.querySelectorAll('#seances-list tr').length + 1);
    
    if (!film || !date || !horaire || !salle) {
        showNotification('Veuillez remplir tous les champs obligatoires', 'error');
        return;
    }
    
    // Traitement du formulaire (simulation)
    if (formMode === 'edit') {
        // Code pour mettre à jour une séance existante
        showNotification('Séance mise à jour avec succès', 'success');
    } else {
        // Code pour ajouter une nouvelle séance
        const newRow = document.createElement('tr');
        newRow.id = seanceId;
        
        // Convertir le format de date pour l'affichage (YYYY-MM-DD -> DD/MM/YYYY)
        const dateParts = date.split('-');
        const formattedDate = `${dateParts[2]}/${dateParts[1]}/${dateParts[0]}`;
        
        // Déterminer le style de badge en fonction du statut
        let badgeClass = 'badge-success';
        let dotClass = 'dot-success';
        let statusText = 'Confirmée';
        
        if (status === 'pending') {
            badgeClass = 'badge-danger';
            dotClass = 'dot-danger';
            statusText = 'À confirmer';
        } else if (status === 'inProgress') {
            badgeClass = 'badge-warning';
            dotClass = 'dot-warning';
            statusText = 'En cours';
        }
        
        // Calculer le pourcentage d'occupation
        const placesVendues = document.getElementById('places-vendues').value || 0;
        const placesTotales = document.getElementById('places-totales').value || 100;
        const occupationPercent = Math.round((placesVendues / placesTotales) * 100);
        
        newRow.innerHTML = `
            <td>${seanceId}</td>
            <td>${film}</td>
            <td>${formattedDate}</td>
            <td>${horaire}</td>
            <td>${salle}</td>
            <td>
                <div class="seats-info">
                    <span>${placesVendues} / ${placesTotales}</span>
                    <div style="flex-grow: 1;">
                        <div class="seats-progress">
                            <div class="seats-progress-bar" style="width: ${occupationPercent}%;"></div>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <span class="badge ${badgeClass}">
                    <span class="status-dot ${dotClass}"></span>
                    ${statusText}
                </span>
            </td>
            <td class="actions-cell">
                <button class="action-btn action-btn-sm secondary" onclick="viewSeance('${seanceId}')">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="action-btn action-btn-sm secondary" onclick="editSeance('${seanceId}')">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="action-btn action-btn-sm danger" onclick="confirmDelete('${seanceId}')">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        `;
        
        document.getElementById('seances-list').appendChild(newRow);
        showNotification('Nouvelle séance programmée avec succès', 'success');
    }
    
    // Fermer le modal après soumission
    document.getElementById('seance-modal').style.display = 'none';
});

// Fonction pour confirmer la suppression
function confirmDelete(seanceId) {
    seanceToDelete = seanceId;
    document.getElementById('delete-modal').style.display = 'flex';
}

// Fonction pour supprimer une séance
document.getElementById('confirm-delete').addEventListener('click', function() {
    if (seanceToDelete) {
        const element = document.getElementById(seanceToDelete);
        if (element) {
            element.remove();
            showNotification('Séance supprimée avec succès', 'success');
        }
        document.getElementById('delete-modal').style.display = 'none';
        seanceToDelete = null;
    }
});

// Fonction pour modifier une séance
function editSeance(seanceId) {
    const row = document.getElementById(seanceId);
    if (!row) return;
    
    const cells = row.cells;
    
    // Récupérer les valeurs
    const film = cells[1].textContent;
    let dateStr = cells[2].textContent; // Format DD/MM/YYYY
    const horaire = cells[3].textContent;
    const salle = cells[4].textContent;
    
    // Convertir la date au format YYYY-MM-DD pour l'input date
    const dateParts = dateStr.split('/');
    const formattedDate = `${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`;
    
    // Récupérer les informations de places
    const placesText = cells[5].querySelector('.seats-info span').textContent;
    const placesParts = placesText.split(' / ');
    const placesVendues = placesParts[0];
    const placesTotales = placesParts[1];
    
    // Récupérer le statut
    const statusBadge = cells[6].querySelector('.badge');
    let status = 'confirmed';
    if (statusBadge.classList.contains('badge-danger')) {
        status = 'pending';
    } else if (statusBadge.classList.contains('badge-warning')) {
        status = 'inProgress';
    }
    
    // Mettre à jour le formulaire
    document.getElementById('film').value = film;
    document.getElementById('date').value = formattedDate;
    document.getElementById('horaire').value = horaire;
    document.getElementById('salle').value = salle;
    document.getElementById('places-vendues').value = placesVendues;
    document.getElementById('places-totales').value = placesTotales;
    document.getElementById('places-slider').value = placesVendues;
    document.getElementById('places-slider').max = placesTotales;
    
    // Mise à jour du statut
    document.querySelectorAll('.status-option').forEach(el => {
        el.classList.remove('active');
    });
    document.querySelector(`.status-option[data-value="${status}"]`).classList.add('active');
    document.getElementById('status').value = status;
    
    // Mettre à jour les champs cachés
    document.getElementById('edit-seance-id').value = seanceId;
    document.getElementById('form-mode').value = 'edit';
    
    // Mettre à jour les affichages dynamiques
    updateFilmInfo();
    updateCapacity();
    updateSeatsDisplay();
    
    // Mettre à jour le titre et le bouton du modal
    document.getElementById('modal-title').innerHTML = '<i class="fas fa-edit"></i> Modifier la séance';
    document.getElementById('submit-btn-text').textContent = 'Enregistrer';
    
    // Afficher le modal
    document.getElementById('seance-modal').style.display = 'flex';
}

// Fonction pour afficher les détails d'une séance
function viewSeance(seanceId) {
    currentViewSeanceId = seanceId;
    const row = document.getElementById(seanceId);
    if (!row) return;
    
    const cells = row.cells;
    
    // Récupérer les valeurs
    const film = cells[1].textContent;
    const date = cells[2].textContent;
    const horaire = cells[3].textContent;
    const salle = cells[4].textContent;
    
    // Récupérer les informations de places
    const placesText = cells[5].querySelector('.seats-info span').textContent;
    const placesParts = placesText.split(' / ');
    const placesVendues = parseInt(placesParts[0]);
    const placesTotales = parseInt(placesParts[1]);
    const occupationPercent = Math.round((placesVendues / placesTotales) * 100);
    
    // Récupérer le statut
    const statusElement = cells[6].querySelector('.badge');
    let statusText = statusElement.textContent.trim();
    
    // Simuler des tarifs
    const tarifNormal = '9.50€';
    const tarifReduit = '7.50€';
    
    // Mettre à jour la visualisation
    document.getElementById('view-film').textContent = film;
    document.getElementById('view-duration').textContent = `${filmDurations[film] || '-'} minutes`;
    document.getElementById('view-date').textContent = date;
    document.getElementById('view-horaire').textContent = horaire;
    document.getElementById('view-salle').textContent = salle;
    document.getElementById('view-status').textContent = statusText;
    document.getElementById('view-film-poster').src = filmPosters[film] || "/api/placeholder/400/200";
    document.getElementById('view-seats-text').textContent = `${placesVendues} / ${placesTotales} places`;
    document.getElementById('view-seats-percentage').textContent = `${occupationPercent}%`;
    document.getElementById('view-seats-bar').style.width = `${occupationPercent}%`;
    document.getElementById('view-tarif-normal').textContent = tarifNormal;
    document.getElementById('view-tarif-reduit').textContent = tarifReduit;
    document.getElementById('view-notes').textContent = 'Aucune note supplémentaire pour cette séance.';
    
    // Afficher le modal
    document.getElementById('view-modal').style.display = 'flex';
}

// Fonction pour modifier depuis la vue détails
document.getElementById('edit-from-view-btn').addEventListener('click', function() {
    if (currentViewSeanceId) {
        document.getElementById('view-modal').style.display = 'none';
        editSeance(currentViewSeanceId);
    }
});

// Recherche de séances
document.getElementById('search-input').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('#seances-list tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        if (text.includes(searchTerm)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

// Filtrage par date
document.getElementById('filter-date').addEventListener('change', function(e) {
    const filterValue = e.target.value;
    const rows = document.querySelectorAll('#seances-list tr');
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    
    const tomorrow = new Date(today);
    tomorrow.setDate(tomorrow.getDate() + 1);
    
    const nextWeek = new Date(today);
    nextWeek.setDate(nextWeek.getDate() + 7);
    
    rows.forEach(row => {
        const dateCell = row.cells[2].textContent;
        const dateParts = dateCell.split('/');
        const rowDate = new Date(`${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`);
        rowDate.setHours(0, 0, 0, 0);
        
        if (filterValue === 'all') {
            row.style.display = '';
        } else if (filterValue === 'today' && rowDate.getTime() === today.getTime()) {
            row.style.display = '';
        } else if (filterValue === 'tomorrow' && rowDate.getTime() === tomorrow.getTime()) {
            row.style.display = '';
        } else if (filterValue === 'week' && rowDate >= today && rowDate <= nextWeek) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

// Initialiser l'interface
document.addEventListener('DOMContentLoaded', function() {
    resetForm();
    document.querySelector('.status-option[data-value="confirmed"]').classList.add('active');
});

</script>
</body>
</html>