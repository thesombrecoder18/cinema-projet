<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Gestion des Annonces</title>
  <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #121212;
      color: #fff;
    }

    .sidebar {
      width: 240px;
      background-color: #0d0d0d;
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      padding: 20px;
    }

    .sidebar-title {
      font-size: 24px;
      font-weight: bold;
      color: #f4a261;
      margin-bottom: 30px;
    }

    .nav-item {
      margin-bottom: 15px;
    }

    .nav-link {
      text-decoration: none;
      color: #ccc;
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px;
      border-radius: 8px;
    }

    .nav-link:hover, .nav-link.active {
      background-color: #2a2a2a;
      color: #f4a261;
    }

    .content-section {
      margin-left: 260px;
      padding: 40px;
      background-color: #1e1e1e;
      min-height: 100vh;
    }

    .section-title {
      font-size: 28px;
      margin-bottom: 20px;
      color: #f4a261;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    input[type="text"], input[type="email"], select {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #333;
      background-color: #2a2a2a;
      color: #fff;
    }

    input[type="checkbox"] {
      transform: scale(1.2);
      margin-right: 8px;
    }

    .action-btn {
      background-color: #f4a261;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      color: #000;
      font-weight: bold;
      cursor: pointer;
    }

    .action-btn:hover {
      background-color: #e07b39;
    }
  </style>
</head>
<body>
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
                <a href="{{ route('admin.annonces') }}" class="nav-link active"><i class="fas fa-bullhorn"></i> Annonces</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.users') }}" class="nav-link"><i class="fas fa-users"></i> Utilisateurs</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.settings') }}" class="nav-link"><i class="fas fa-cog"></i> Paramètres</a>
            </li>
        </ul>
    </nav>
</aside>

<div class="content-section" id="annonces-content">
  <h2 class="section-title">Gestion des Annonces</h2>
  <button class="action-btn add-btn" onclick="toggleForm()">➕ Ajouter une annonce</button>

  <!-- Filtre -->
  <div style="margin-top: 20px;">
    <label for="filtreType">Filtrer par type :</label>
    <select id="filtreType" onchange="afficherAnnonces()">
      <option value="">Tous</option>
      <option value="Promotion">Promotion</option>
      <option value="Événement">Événement</option>
    </select>
  </div>

  <!-- Formulaire -->
  <form class="form-annonce" id="formAnnonce" style="display: none; margin-top: 20px;" onsubmit="enregistrerAnnonce(event)">
    <input type="hidden" id="editIndex">
    <div class="form-group">
      <label for="titre">Titre</label>
      <input type="text" id="titre" required>
    </div>
    <div class="form-group">
      <label for="date_pub">Date de publication</label>
      <input type="date" id="date_pub" required>
    </div>
    <div class="form-group">
      <label for="date_exp">Date d'expiration</label>
      <input type="date" id="date_exp" required>
    </div>
    <div class="form-group">
      <label for="type">Type</label>
      <select id="type">
        <option value="Promotion">Promotion</option>
        <option value="Événement">Événement</option>
      </select>
    </div>
    <div class="form-group">
      <label for="statut">Statut</label>
      <select id="statut">
        <option value="Active">Active</option>
        <option value="Expirée">Expirée</option>
      </select>
    </div>
    <button type="submit" class="action-btn save-btn">Enregistrer</button>
  </form>

  <!-- Tableau -->
  <table class="data-table" id="annoncesTable">
    <thead>
      <tr>
        <th>Titre</th>
        <th>Publication</th>
        <th>Expiration</th>
        <th>Type</th>
        <th>Statut</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>


<script>
  let annonces = JSON.parse(localStorage.getItem("annonces")) || [];
  if (annonces.length === 0) {
    annonces = [
      { titre: "Promotion tickets étudiants", date_pub: "2025-04-01", date_exp: "2025-04-30", type: "Promotion", statut: "Active" },
      { titre: "Festival du cinéma européen", date_pub: "2025-03-15", date_exp: "2025-04-20", type: "Événement", statut: "Active" },
      { titre: "Soirée avant-première : Film surprise", date_pub: "2025-04-10", date_exp: "2025-04-13", type: "Événement", statut: "Expirée" }
    ];
    localStorage.setItem("annonces", JSON.stringify(annonces));
  }

  let currentPage = 1;
  const annoncesParPage = 5;

  function toggleForm() {
    document.getElementById("formAnnonce").reset();
    document.getElementById("editIndex").value = "";
    document.getElementById("formAnnonce").style.display = "block";
  }

  function enregistrerAnnonce(e) {
    e.preventDefault();
    const annonce = {
      titre: document.getElementById("titre").value,
      date_pub: document.getElementById("date_pub").value,
      date_exp: document.getElementById("date_exp").value,
      type: document.getElementById("type").value,
      statut: document.getElementById("statut").value,
    };
    const index = document.getElementById("editIndex").value;
    if (index === "") {
      annonces.push(annonce);
    } else {
      annonces[index] = annonce;
    }
    localStorage.setItem("annonces", JSON.stringify(annonces));
    afficherAnnonces();
    document.getElementById("formAnnonce").style.display = "none";
  }

  function afficherAnnonces() {
    const tbody = document.querySelector("#annoncesTable tbody");
    tbody.innerHTML = "";

    const filtre = document.getElementById("filtreType").value;
    const annoncesFiltrees = filtre ? annonces.filter(a => a.type === filtre) : [...annonces];

    const totalPages = Math.ceil(annoncesFiltrees.length / annoncesParPage);
    currentPage = Math.min(currentPage, totalPages) || 1;
    const debut = (currentPage - 1) * annoncesParPage;
    const pageData = annoncesFiltrees.slice(debut, debut + annoncesParPage);

    pageData.forEach((annonce, index) => {
      const tr = document.createElement("tr");
      tr.innerHTML = `
        <td>${annonce.titre}</td>
        <td>${formatDateFr(annonce.date_pub)}</td>
        <td>${formatDateFr(annonce.date_exp)}</td>
        <td>${annonce.type}</td>
        <td><div class="film-status status-${annonce.statut.toLowerCase()}">${annonce.statut}</div></td>
        <td>
          <button class="action-btn edit-btn" onclick="modifierAnnonce(${annonces.indexOf(annonce)})">Modifier</button>
          <button class="action-btn delete-btn" onclick="supprimerAnnonce(${annonces.indexOf(annonce)})">Supprimer</button>
        </td>`;
      tbody.appendChild(tr);
    });

    document.getElementById("pageInfo").textContent = `Page ${currentPage} / ${totalPages || 1}`;
  }

  function modifierAnnonce(index) {
    const a = annonces[index];
    document.getElementById("titre").value = a.titre;
    document.getElementById("date_pub").value = a.date_pub;
    document.getElementById("date_exp").value = a.date_exp;
    document.getElementById("type").value = a.type;
    document.getElementById("statut").value = a.statut;
    document.getElementById("editIndex").value = index;
    document.getElementById("formAnnonce").style.display = "block";
  }

  function supprimerAnnonce(index) {
    if (confirm("Supprimer cette annonce ?")) {
      annonces.splice(index, 1);
      localStorage.setItem("annonces", JSON.stringify(annonces));
      afficherAnnonces();
    }
  }

  function formatDateFr(date) {
    const [y, m, d] = date.split("-");
    return `${d}/${m}/${y}`;
  }

  function precedentPage() {
    if (currentPage > 1) {
      currentPage--;
      afficherAnnonces();
    }
  }

  function suivantPage() {
    const filtre = document.getElementById("filtreType").value;
    const total = filtre ? annonces.filter(a => a.type === filtre).length : annonces.length;
    const totalPages = Math.ceil(total / annoncesParPage);
    if (currentPage < totalPages) {
      currentPage++;
      afficherAnnonces();
    }
  }

  afficherAnnonces();


</script>
</body>
</html>
