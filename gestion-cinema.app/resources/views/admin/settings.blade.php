<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paramètres - CinéAdmin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="{{ asset('css/admin/styleParametre.css') }}" rel="stylesheet">
  <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">
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
          <a href="{{ route('admin.users') }}" class="nav-link"><i class="fas fa-users"></i> Utilisateurs</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.settings') }}" class="nav-link active"><i class="fas fa-cog"></i> Paramètres</a>
        </li>
      </ul>
    </nav>
  </aside>

  <div class="content-section" id="parametres-content">
    <h2 class="section-title">Paramètres</h2>
    <p>Bienvenue dans la section paramètres de l'administration du cinéma.</p>

    <form id="formParametres" onsubmit="enregistrerParametres(event)">
      <!-- Profil -->
      <div class="settings-card">
        <h3><i class="fas fa-user"></i> Profil</h3>
        <div style="display: flex; gap: 30px; align-items: flex-start;">
          <div>
            <div class="avatar" id="avatar">JD</div>
            <div class="user-info">Administrateur</div>
            <input type="file" id="avatarUpload" style="display: none;">
            <label for="avatarUpload" class="action-btn secondary">Changer l'avatar</label>
          </div>
          <div style="flex-grow: 1;">
            <div class="form-group">
              <label for="nom">Nom complet</label>
              <input type="text" id="nom" value="John Doe" required>
            </div>
            <div class="form-group">
              <label for="email">Adresse e-mail</label>
              <input type="email" id="email" value="john@example.com" required>
            </div>
          </div>
        </div>
      </div>

      <!-- Sécurité -->
      <div class="settings-card">
        <h3><i class="fas fa-shield-alt"></i> Sécurité</h3>
        <button type="button" class="action-btn" id="btnChangerMotDePasse">Changer le mot de passe</button>
        
        <div style="margin-top: 20px;">
          <h4>Authentification à deux facteurs</h4>
          <p style="color: #aaa; margin-bottom: 15px;">Ajoutez une couche de sécurité supplémentaire à votre compte</p>
          <button type="button" class="action-btn secondary" id="btnConfigurer2FA">Configurer</button>
        </div>
      </div>

      <!-- Notifications -->
      <div class="settings-card">
        <h3><i class="fas fa-bell"></i> Notifications</h3>
        <div class="toggle-container">
          <div class="text">
            <h4>Notifications par email</h4>
            <p>Recevez des notifications par email pour les activités importantes</p>
          </div>
          <label class="toggle">
            <input type="checkbox" id="notifEmail" checked>
            <span class="slider"></span>
          </label>
        </div>
        <div class="toggle-container">
          <div class="text">
            <h4>Notifications push</h4>
            <p>Recevez des alertes dans votre navigateur</p>
          </div>
          <label class="toggle">
            <input type="checkbox" id="notifPush">
            <span class="slider"></span>
          </label>
        </div>
      </div>

      <!-- Apparence -->
      <div class="settings-card">
        <h3><i class="fas fa-palette"></i> Apparence</h3>
        <div class="toggle-container">
          <div class="text">
            <h4>Mode sombre</h4>
            <p>Basculer entre le mode clair et sombre</p>
          </div>
          <label class="toggle">
            <input type="checkbox" id="themeSombre" checked>
            <span class="slider"></span>
          </label>
        </div>
        <div class="form-group" style="margin-top: 20px;">
          <label for="langueInterface">Langue de l'interface</label>
          <select id="langueInterface">
            <option value="fr" selected>Français</option>
            <option value="en">English</option>
            <option value="es">Español</option>
            <option value="de">Deutsch</option>
          </select>
        </div>
      </div>

      <!-- Préférences système -->
      <div class="settings-card">
        <h3><i class="fas fa-sliders-h"></i> Préférences système</h3>
        <div class="form-group">
          <label for="fuseau">Fuseau horaire</label>
          <select id="fuseau">
            <option value="Europe/Paris" selected>Europe/Paris (GMT+1)</option>
            <option value="Europe/London">Europe/London (GMT+0)</option>
            <option value="America/New_York">America/New_York (GMT-5)</option>
          </select>
        </div>
        <div class="form-group">
          <label for="formatDate">Format de date</label>
          <select id="formatDate">
            <option value="DD/MM/YYYY" selected>DD/MM/YYYY</option>
            <option value="MM/DD/YYYY">MM/DD/YYYY</option>
            <option value="YYYY-MM-DD">YYYY-MM-DD</option>
          </select>
        </div>
      </div>

      <div class="save-btn-container">
        <button type="button" class="action-btn secondary">Annuler</button>
        <button type="submit" class="action-btn">💾 Enregistrer</button>
      </div>
    </form>
  </div>

  <script>
    // Charger les paramètres si existants
    window.onload = function () {
      const params = JSON.parse(localStorage.getItem("parametres")) || {};
      if (params.nom) document.getElementById("nom").value = params.nom;
      if (params.email) document.getElementById("email").value = params.email;
      if (params.themeSombre !== undefined) document.getElementById("themeSombre").checked = params.themeSombre;
      if (params.notifEmail !== undefined) document.getElementById("notifEmail").checked = params.notifEmail;
      if (params.notifPush !== undefined) document.getElementById("notifPush").checked = params.notifPush;
      if (params.langueInterface) document.getElementById("langueInterface").value = params.langueInterface;
      if (params.fuseau) document.getElementById("fuseau").value = params.fuseau;
      if (params.formatDate) document.getElementById("formatDate").value = params.formatDate;

      // Mettre à jour l'avatar avec les initiales
      updateAvatar();
    };

    function updateAvatar() {
      const nom = document.getElementById("nom").value;
      if (nom) {
        const initials = nom.split(' ').map(n => n[0]).join('').toUpperCase();
        document.getElementById("avatar").textContent = initials;
      }
    }

    // Mettre à jour les initiales quand le nom change
    document.getElementById("nom").addEventListener("input", updateAvatar);

    function enregistrerParametres(e) {
      e.preventDefault();
      const params = {
        nom: document.getElementById("nom").value,
        email: document.getElementById("email").value,
        themeSombre: document.getElementById("themeSombre").checked,
        notifEmail: document.getElementById("notifEmail").checked,
        notifPush: document.getElementById("notifPush").checked,
        langueInterface: document.getElementById("langueInterface").value,
        fuseau: document.getElementById("fuseau").value,
        formatDate: document.getElementById("formatDate").value
      };
      localStorage.setItem("parametres", JSON.stringify(params));
      alert("Paramètres enregistrés !");
    }

    // Simuler les actions pour le changement de mot de passe et la configuration 2FA
    document.getElementById("btnChangerMotDePasse").addEventListener("click", function() {
      alert("Fonction de changement de mot de passe à implémenter.");
    });

    document.getElementById("btnConfigurer2FA").addEventListener("click", function() {
      alert("Configuration de l'authentification à deux facteurs à implémenter.");
    });
  </script>
</body>
</html>