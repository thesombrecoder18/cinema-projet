<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs</title>
    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/styleUser.css') }}" rel="stylesheet">
</head>
<body>
<!-- Sidebar -->
<aside class="sidebar">
    <h1 class="sidebar-title">🎬 CinéAdmin</h1>
    <nav>
      <ul>
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-chart-pie"></i> Dashboard</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.seances') }}" class="nav-link"><i class="fas fa-clock"></i> Séances</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.movies') }}" class="nav-link"><i class="fas fa-film"></i> Films</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.annonces') }}" class="nav-link"><i class="fas fa-bullhorn"></i> Annonces</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.users') }}" class="nav-link active"><i class="fas fa-users"></i> Utilisateurs</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.settings') }}" class="nav-link"><i class="fas fa-cog"></i> Paramètres</a>
        </li>
      </ul>
    </nav>
</aside>
  
<div class="content-section" id="utilisateurs-content">
    <h2 class="section-title">Gestion des Utilisateurs</h2>

    <!-- Bouton Ajouter un Utilisateur -->
    <button id="add-user-btn" class="action-btn">➕ Ajouter un Utilisateur</button>

    <!-- Formulaire Ajouter un Utilisateur (caché au départ) -->
    <div id="add-user-form" class="form-container" style="display: none;">
        <h3>Ajouter un Utilisateur</h3>
        <form id="user-form">
            <input type="hidden" id="user-id" name="user-id">
            <input type="hidden" id="form-mode" name="form-mode" value="add">
            
            <div class="form-group">
                <label for="name">Nom Complet</label>
                <input type="text" id="name" name="name" required placeholder="Entrez le nom complet">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="Entrez l'adresse email">
            </div>

            <div class="form-group">
                <label for="role">Rôle</label>
                <select id="role" name="role" required>
                    <option value="">-- Sélectionnez un rôle --</option>
                    <option value="Administrateur">Administrateur</option>
                    <option value="Utilisateur">Utilisateur</option>
                    <option value="Responsable Projections">Responsable Projections</option>
                    <option value="Responsable Marketing">Responsable Marketing</option>
                </select>
            </div>

            <div class="form-group">
                <label for="signup-date">Date d'inscription</label>
                <input type="date" id="signup-date" name="signup-date" required>
            </div>

            <div class="form-group">
                <label for="status">Statut</label>
                <select id="status" name="status" required>
                    <option value="">-- Sélectionnez un statut --</option>
                    <option value="Actif">Actif</option>
                    <option value="Inactif">Inactif</option>
                    <option value="En attente">En attente</option>
                </select>
            </div>

            <div class="form-group">
                <label for="permissions">Permissions spéciales</label>
                <div>
                    <input type="checkbox" id="perm-films" name="permissions[]" value="films">
                    <label for="perm-films" style="display: inline;">Gestion des films</label>
                </div>
                <div>
                    <input type="checkbox" id="perm-seances" name="permissions[]" value="seances">
                    <label for="perm-seances" style="display: inline;">Gestion des séances</label>
                </div>
                <div>
                    <input type="checkbox" id="perm-annonces" name="permissions[]" value="annonces">
                    <label for="perm-annonces" style="display: inline;">Gestion des annonces</label>
                </div>
                <div>
                    <input type="checkbox" id="perm-rapport" name="permissions[]" value="rapport">
                    <label for="perm-rapport" style="display: inline;">Accès aux rapports</label>
                </div>
            </div>

            <div class="btn-container">
                <button type="submit" id="submit-btn" class="action-btn">Ajouter</button>
                <button type="button" id="cancel-btn" class="action-btn cancel-btn">Annuler</button>
            </div>
        </form>
    </div>

    <!-- Table des Utilisateurs -->
    <table class="data-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Date d'inscription</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="users-list">
            <tr id="U001">
                <td>Admin Principal</td>
                <td>admin@cinema.fr</td>
                <td>Administrateur</td>
                <td>10/01/2023</td>
                <td><div class="status active">Actif</div></td>
                <td>
                    <button class="action-btn edit-btn" onclick="editUser('U001')">Modifier</button>
                    <button class="action-btn delete-btn" onclick="confirmDelete('U001')">Supprimer</button>
                </td>
            </tr>
            <tr id="U002">
                <td>Jean Dupont</td>
                <td>jean.dupont@cinema.fr</td>
                <td>Utilisateur</td>
                <td>25/03/2024</td>
                <td><div class="status inactive">Inactif</div></td>
                <td>
                    <button class="action-btn edit-btn" onclick="editUser('U002')">Modifier</button>
                    <button class="action-btn delete-btn" onclick="confirmDelete('U002')">Supprimer</button>
                </td>
            </tr>
            <tr id="U003">
                <td>Marie Laurent</td>
                <td>marie.laurent@cinema.fr</td>
                <td>Responsable Projections</td>
                <td>15/02/2024</td>
                <td><div class="status active">Actif</div></td>
                <td>
                    <button class="action-btn edit-btn" onclick="editUser('U003')">Modifier</button>
                    <button class="action-btn delete-btn" onclick="confirmDelete('U003')">Supprimer</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal de confirmation de suppression -->
<div id="delete-modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3 class="modal-title">Confirmer la suppression</h3>
        <p>Êtes-vous sûr de vouloir supprimer cet utilisateur? Cette action est irréversible.</p>
        <div class="btn-container">
            <button id="confirm-delete-btn" class="action-btn delete-btn">Supprimer</button>
            <button class="action-btn cancel-btn" onclick="closeModal()">Annuler</button>
        </div>
    </div>
</div>

<!-- Notification -->
<div id="notification" class="notification"></div>

<script>
    // Variables globales
    let currentUserID = null;
    
    // Éléments du DOM
    const addUserBtn = document.getElementById('add-user-btn');
    const addUserForm = document.getElementById('add-user-form');
    const cancelBtn = document.getElementById('cancel-btn');
    const userForm = document.getElementById('user-form');
    const submitBtn = document.getElementById('submit-btn');
    const formMode = document.getElementById('form-mode');
    const deleteModal = document.getElementById('delete-modal');
    const confirmDeleteBtn = document.getElementById('confirm-delete-btn');
    const notification = document.getElementById('notification');
    
    // Initialisation de la date d'aujourd'hui pour le formulaire
    document.getElementById('signup-date').valueAsDate = new Date();
    
    // Fonction pour afficher/masquer le formulaire
    addUserBtn.addEventListener('click', () => {
        // Réinitialiser le formulaire pour un nouvel utilisateur
        userForm.reset();
        formMode.value = 'add';
        submitBtn.textContent = 'Ajouter';
        document.getElementById('user-id').value = '';
        document.getElementById('signup-date').valueAsDate = new Date();
        
        // Afficher le formulaire
        addUserForm.style.display = 'block';
    });

    cancelBtn.addEventListener('click', () => {
        addUserForm.style.display = 'none';
    });

    // Fonction pour afficher une notification
    function showNotification(message, type) {
        notification.textContent = message;
        notification.className = `notification ${type}`;
        notification.classList.add('show');
        
        setTimeout(() => {
            notification.classList.remove('show');
        }, 3000);
    }

    // Fonction pour formater la date
    function formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('fr-FR');
    }
    
    // Fonction pour gérer le formulaire (ajout ou modification)
    userForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const userId = document.getElementById('user-id').value;
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const role = document.getElementById('role').value;
        const signupDate = document.getElementById('signup-date').value;
        const status = document.getElementById('status').value;
        
        // Récupérer les permissions cochées
        const permissions = [];
        document.querySelectorAll('input[name="permissions[]"]:checked').forEach(checkbox => {
            permissions.push(checkbox.value);
        });

        // Mode ajout ou modification
        if (formMode.value === 'add') {
            // Générer un nouvel ID
            const newId = 'U' + (document.querySelectorAll('#users-list tr').length + 1).toString().padStart(3, '0');
            
            // Créer une nouvelle ligne
            const newRow = document.createElement('tr');
            newRow.id = newId;
            newRow.innerHTML = `
                <td>${name}</td>
                <td>${email}</td>
                <td>${role}</td>
                <td>${formatDate(signupDate)}</td>
                <td><div class="status ${status.toLowerCase()}">${status}</div></td>
                <td>
                    <button class="action-btn edit-btn" onclick="editUser('${newId}')">Modifier</button>
                    <button class="action-btn delete-btn" onclick="confirmDelete('${newId}')">Supprimer</button>
                </td>
            `;
            document.getElementById('users-list').appendChild(newRow);
            
            // Notification de succès
            showNotification(`Utilisateur ${name} ajouté avec succès`, 'success');
        } else {
            // Mode modification
            const row = document.getElementById(userId);
            if (row) {
                // Mettre à jour la ligne existante
                row.innerHTML = `
                    <td>${name}</td>
                    <td>${email}</td>
                    <td>${role}</td>
                    <td>${formatDate(signupDate)}</td>
                    <td><div class="status ${status.toLowerCase()}">${status}</div></td>
                    <td>
                        <button class="action-btn edit-btn" onclick="editUser('${userId}')">Modifier</button>
                        <button class="action-btn delete-btn" onclick="confirmDelete('${userId}')">Supprimer</button>
                    </td>
                `;
                
                // Notification de succès
                showNotification(`Utilisateur ${name} modifié avec succès`, 'success');
            }
        }
        
        // Masquer le formulaire après ajout ou modification
        addUserForm.style.display = 'none';
    });

    // Fonction pour modifier un utilisateur
    function editUser(id) {
        const row = document.getElementById(id);
        if (row) {
            // Récupérer les données de l'utilisateur
            const cells = row.getElementsByTagName('td');
            const name = cells[0].textContent;
            const email = cells[1].textContent;
            const role = cells[2].textContent;
            const signupDate = cells[3].textContent;
            const status = cells[4].querySelector('.status').textContent;
            
            // Remplir le formulaire avec les données existantes
            document.getElementById('user-id').value = id;
            document.getElementById('name').value = name;
            document.getElementById('email').value = email;
            
            // Sélectionner le bon rôle dans le select
            const roleSelect = document.getElementById('role');
            for (let i = 0; i < roleSelect.options.length; i++) {
                if (roleSelect.options[i].value === role) {
                    roleSelect.selectedIndex = i;
                    break;
                }
            }
            
            // Convertir la date au format yyyy-mm-dd
            const dateParts = signupDate.split('/');
            if (dateParts.length === 3) {
                const formattedDate = `${dateParts[2]}-${dateParts[1].padStart(2, '0')}-${dateParts[0].padStart(2, '0')}`;
                document.getElementById('signup-date').value = formattedDate;
            }
            
            // Sélectionner le bon statut dans le select
            const statusSelect = document.getElementById('status');
            for (let i = 0; i < statusSelect.options.length; i++) {
                if (statusSelect.options[i].value === status) {
                    statusSelect.selectedIndex = i;
                    break;
                }
            }
            
            // Mettre le formulaire en mode modification
            formMode.value = 'edit';
            submitBtn.textContent = 'Modifier';
            
            // Afficher le formulaire
            addUserForm.style.display = 'block';
        }
    }

    // Fonction pour confirmer la suppression
    function confirmDelete(id) {
        // Stocker l'ID de l'utilisateur à supprimer
        currentUserID = id;
        
        // Afficher la boîte de dialogue de confirmation
        deleteModal.style.display = 'block';
    }
    
    // Fonction pour fermer la modale
    function closeModal() {
        deleteModal.style.display = 'none';
    }
    
    // Gestionnaire d'événement pour le bouton de confirmation de suppression
    confirmDeleteBtn.addEventListener('click', function() {
        // Supprimer l'utilisateur
        deleteUser(currentUserID);
        
        // Fermer la modale
        closeModal();
    });

    // Fonction pour supprimer un utilisateur
    function deleteUser(id) {
        const row = document.getElementById(id);
        if (row) {
            // Récupérer le nom de l'utilisateur pour la notification
            const name = row.getElementsByTagName('td')[0].textContent;
            
            // Supprimer la ligne
            row.remove();
            
            // Afficher une notification
            showNotification(`Utilisateur ${name} supprimé avec succès`, 'success');
        }
    }
    
    // Fermer la modale si l'utilisateur clique en dehors
    window.onclick = function(event) {
        if (event.target === deleteModal) {
            closeModal();
        }
    }
</script>
</body>
</html>