<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Gestion des Films</title>
  <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/admin/styleFilm.css') }}" rel="stylesheet">
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
        <a href="{{ route('admin.movies') }}" class="nav-link active"><i class="fas fa-film"></i> Films</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.annonces') }}" class="nav-link"><i class="fas fa-bullhorn"></i> Annonces</a>
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

<div class="content-section" id="films-content">
  <div class="header-actions">
    <h2 class="section-title">Gestion des Films</h2>
    <button class="action-btn add-btn" onclick="toggleFilmForm()">➕ Ajouter un film</button>
  </div>

  <div class="view-toggle">
    <button class="view-btn active" id="gridViewBtn" onclick="toggleView('grid')">
      <i class="fas fa-th"></i> Vue grille
    </button>
    <button class="view-btn" id="tableViewBtn" onclick="toggleView('table')">
      <i class="fas fa-list"></i> Vue liste
    </button>
  </div>

  <!-- Vue en grille -->
  <div class="film-grid" id="filmGrid"></div>

  <!-- Vue en tableau -->
  <table class="data-table" id="filmsTable">
    <thead>
      <tr>
        <th>Poster</th>
        <th>Titre</th>
        <th>Durée</th>
        <th>Réalisateur</th>
        <th>Genre</th>
        <th>Date de sortie</th>
        <th>Statut</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
</div>

<!-- Formulaire Film Modal -->
<div class="form-overlay" id="filmFormOverlay">
  <div class="form-container">
    <div class="form-header">
      <h3 class="form-title" id="formTitle">Ajouter un film</h3>
      <button class="close-btn" onclick="toggleFilmForm(false)">&times;</button>
    </div>
    <form class="form-film" id="formFilm" onsubmit="enregistrerFilm(event)">
      <input type="hidden" id="editFilmIndex">
      
      <div class="form-grid">
        <div class="form-group full-width">
          <label for="poster">URL du Poster</label>
          <input type="url" id="poster" required placeholder="https://...jpg" oninput="updatePosterPreview()">
          <div class="poster-preview" id="posterPreview">Aperçu du poster</div>
        </div>
        
        <div class="form-group">
          <label for="titre">Titre</label>
          <input type="text" id="titre" required placeholder="Titre du film">
        </div>
        
        <div class="form-group">
          <label for="duree">Durée (en minutes)</label>
          <input type="number" id="duree" required min="1" placeholder="120">
        </div>
        
        <div class="form-group">
          <label for="realisateur">Réalisateur</label>
          <input type="text" id="realisateur" required placeholder="Nom du réalisateur">
        </div>
        
        <div class="form-group">
          <label for="genre">Genre</label>
          <input type="text" id="genre" required placeholder="Action, Comédie, Drame...">
        </div>
        
        <div class="form-group">
          <label for="date_sortie">Date de sortie</label>
          <input type="date" id="date_sortie" required>
        </div>
        
        <div class="form-group">
          <label for="statut">Statut</label>
          <select id="statut">
            <option value="À l'affiche">À l'affiche</option>
            <option value="À venir">À venir</option>
            <option value="Terminé">Terminé</option>
          </select>
        </div>
      </div>
      
      <div class="form-footer">
        <button type="button" class="action-btn" onclick="toggleFilmForm(false)">Annuler</button>
        <button type="submit" class="action-btn save-btn">Enregistrer</button>
      </div>
    </form>
  </div>
</div>

<script>
  let films = JSON.parse(localStorage.getItem("films")) || [];
  let currentView = 'grid'; // 'grid' ou 'table'

  // Exemples préremplis si vide
  if (films.length === 0) {
    films = [
      {
        poster: "https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/a58a7719-0dcf-4e0b-b7bb-d2b725dbbb8e/dgrxbla-08323b91-4ca1-43dc-8fec-ed42a3d55e1b.png/v1/fill/w_1280,h_1867,q_80,strp/dune_part_2_poster_fixed_by_andrewvm_dgrxbla-fullview.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTg2NyIsInBhdGgiOiJcL2ZcL2E1OGE3NzE5LTBkY2YtNGUwYi1iN2JiLWQyYjcyNWRiYmI4ZVwvZGdyeGJsYS0wODMyM2I5MS00Y2ExLTQzZGMtOGZlYy1lZDQyYTNkNTVlMWIucG5nIiwid2lkdGgiOiI8PTEyODAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.57g7WxgV9SK-LtLr22hplRtUTNcBJiCKlLBiAtIW_80",
        titre: "Dune: Partie 2",
        duree: 155,
        realisateur: "Denis Villeneuve",
        genre: "Science-Fiction",
        date_sortie: "2024-02-28",
        statut: "À l'affiche"
      },
      {
        poster: "https://mlpnk72yciwc.i.optimole.com/cqhiHLc.IIZS~2ef73/w:auto/h:auto/q:75/https://bleedingcool.com/wp-content/uploads/2024/06/deadpool_and_wolverine_ver11_xlg.jpg",
        titre: "Deadpool & Wolverine",
        duree: 123,
        realisateur: "Shawn Levy",
        genre: "Action, Comédie",
        date_sortie: "2024-07-24",
        statut: "À l'affiche"
      },
      {
        poster: "https://th.bing.com/th/id/OIP.jl2fCsgrYFISuLE97-PJNwHaLG?rs=1&pid=ImgDetMain",
        titre: "Joker: Folie à Deux",
        duree: 138,
        realisateur: "Todd Phillips",
        genre: "Drame, Thriller",
        date_sortie: "2024-10-02",
        statut: "À venir"
      }
    ];
    localStorage.setItem("films", JSON.stringify(films));
  }

  function toggleFilmForm(show = true) {
    const overlay = document.getElementById("filmFormOverlay");
    if (show) {
      document.getElementById("formFilm").reset();
      document.getElementById("editFilmIndex").value = "";
      document.getElementById("formTitle").textContent = "Ajouter un film";
      document.getElementById("posterPreview").style.backgroundImage = "";
      document.getElementById("posterPreview").textContent = "Aperçu du poster";
      overlay.style.display = "flex";
    } else {
      overlay.style.display = "none";
    }
  }

  function updatePosterPreview() {
    const posterUrl = document.getElementById("poster").value;
    const preview = document.getElementById("posterPreview");
    
    if (posterUrl) {
      preview.style.backgroundImage = `url('${posterUrl}')`;
      preview.textContent = "";
    } else {
      preview.style.backgroundImage = "";
      preview.textContent = "Aperçu du poster";
    }
  }

  function enregistrerFilm(e) {
    e.preventDefault();
    const film = {
      poster: document.getElementById("poster").value,
      titre: document.getElementById("titre").value,
      duree: parseInt(document.getElementById("duree").value),
      realisateur: document.getElementById("realisateur").value,
      genre: document.getElementById("genre").value,
      date_sortie: document.getElementById("date_sortie").value,
      statut: document.getElementById("statut").value
    };

    const index = document.getElementById("editFilmIndex").value;
    if (index === "") {
      films.push(film);
    } else {
      films[index] = film;
    }

    localStorage.setItem("films", JSON.stringify(films));
    afficherFilms();
    toggleFilmForm(false);
  }

  function toggleView(view) {
    currentView = view;
    const gridView = document.getElementById("filmGrid");
    const tableView = document.getElementById("filmsTable");
    const gridBtn = document.getElementById("gridViewBtn");
    const tableBtn = document.getElementById("tableViewBtn");
    
    if (view === 'grid') {
      gridView.style.display = "grid";
      tableView.style.display = "none";
      gridBtn.classList.add("active");
      tableBtn.classList.remove("active");
    } else {
      gridView.style.display = "none";
      tableView.style.display = "table";
      gridBtn.classList.remove("active");
      tableBtn.classList.add("active");
    }
  }

  function afficherFilms() {
    // Mise à jour de la vue en grille
    const grid = document.getElementById("filmGrid");
    grid.innerHTML = "";

    // Mise à jour de la vue en tableau
    const tbody = document.querySelector("#filmsTable tbody");
    tbody.innerHTML = "";

    films.forEach((film, index) => {
      // Création de la carte pour la vue en grille
      const card = document.createElement("div");
      card.className = "film-card";
      card.innerHTML = `
        <div class="film-poster" style="background-image: url('${film.poster}');"></div>
        <div class="film-details">
          <h3 class="film-title">${film.titre}</h3>
          <p class="film-info"><strong>Durée:</strong> ${film.duree} min</p>
          <p class="film-info"><strong>Réalisateur:</strong> ${film.realisateur}</p>
          <p class="film-info"><strong>Genre:</strong> ${film.genre}</p>
          <p class="film-info"><strong>Sortie:</strong> ${formatDateFr(film.date_sortie)}</p>
          <div class="film-status status-${film.statut.toLowerCase().replace(/\s+/g, "-").replace(/[:']/g, "")}">${film.statut}</div>
          <div class="film-actions">
            <button class="action-btn edit-btn" onclick="modifierFilm(${index})">Modifier</button>
            <button class="action-btn delete-btn" onclick="supprimerFilm(${index})">Supprimer</button>
          </div>
        </div>
      `;
      grid.appendChild(card);

      // Création de la ligne pour la vue en tableau
      const tr = document.createElement("tr");
      tr.innerHTML = `
        <td><div class="film-poster" style="background-image: url('${film.poster}');"></div></td>
        <td>${film.titre}</td>
        <td>${film.duree} min</td>
        <td>${film.realisateur}</td>
        <td>${film.genre}</td>
        <td>${formatDateFr(film.date_sortie)}</td>
        <td><div class="film-status status-${film.statut.toLowerCase().replace(/\s+/g, "-").replace(/[:']/g, "")}">${film.statut}</div></td>
        <td>
          <button class="action-btn edit-btn" onclick="modifierFilm(${index})">Modifier</button>
          <button class="action-btn delete-btn" onclick="supprimerFilm(${index})">Supprimer</button>
        </td>
      `;
      tbody.appendChild(tr);
    });
  }

  function modifierFilm(index) {
    const f = films[index];
    document.getElementById("poster").value = f.poster;
    document.getElementById("titre").value = f.titre;
    document.getElementById("duree").value = f.duree;
    document.getElementById("realisateur").value = f.realisateur;
    document.getElementById("genre").value = f.genre;
    document.getElementById("date_sortie").value = f.date_sortie;
    document.getElementById("statut").value = f.statut;
    document.getElementById("editFilmIndex").value = index;
    document.getElementById("formTitle").textContent = "Modifier un film";
    updatePosterPreview();
    toggleFilmForm(true);
  }

  function supprimerFilm(index) {
    if (confirm("Supprimer ce film ?")) {
      films.splice(index, 1);
      localStorage.setItem("films", JSON.stringify(films));
      afficherFilms();
    }
  }

  function formatDateFr(date) {
    const [y, m, d] = date.split("-");
    return `${d}/${m}/${y}`;
  }

  // Initialisation
  afficherFilms();
  toggleView('grid');
</script>
</body>
</html>