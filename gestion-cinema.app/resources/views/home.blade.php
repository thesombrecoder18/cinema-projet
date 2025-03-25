<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cinema App</title>
    <!-- <link rel="stylesheet" href="../css/home.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
        /* Reset and base styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  body {
    font-family: system-ui, -apple-system, sans-serif;
    background-color: #121212;
    color: white;
    line-height: 1.6;
  }
  
  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
  }
  
  /* Navbar */
  .navbar {
    background-color: #1c1c1c;
    padding: 1rem 0;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
  }
  
  .navbar .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  
  .logo {
    font-size: 1.5rem;
    font-weight: bold;
    color: #ecb674;
  }
  
  .nav-links {
    display: flex;
    list-style: none;
    gap: 2rem;
    align-items: center;
  }
  
  .nav-links a {
    color: white;
    text-decoration: none;
    transition: color 0.3s ease;
  }
  
  .nav-links a:hover,
  .nav-links a.active {
    color: #ecb674;
  }
  
  .account-link {
    font-size: 1.2rem;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background-color: rgba(236, 182, 116, 0.1);
    transition: background-color 0.3s ease;
  }
  
  .account-link:hover {
    background-color: rgba(236, 182, 116, 0.2);
  }
  
  /* Hero Section */
  .hero {
    height: 600px;
    background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
      url('https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?auto=format&fit=crop&q=80&w=1600');
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    margin-top: 60px;
  }
  
  .hero-content {
    max-width: 600px;
  }
  
  .hero h1 {
    font-size: 3.5rem;
    margin-bottom: 1rem;
    color: #ecb674;
  }
  
  .hero p {
    font-size: 1.25rem;
    margin-bottom: 2rem;
  }
  
  .cta-button {
    background-color: #ecb674;
    color: #121212;
    border: none;
    padding: 1rem 2rem;
    font-size: 1.1rem;
    font-weight: bold;
    border-radius: 8px;
    cursor: pointer;
    transition: transform 0.3s ease;
  }
  
  .cta-button:hover {
    transform: translateY(-2px);
  }
  
  /* Now Playing Section */
  .now-playing {
    padding: 4rem 0;
  }
  
  .section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
  }
  
  .section-header h2 {
    font-size: 2rem;
    color: #ecb674;
  }
  
  .view-all {
    color: #ecb674;
    text-decoration: none;
  }
  
  .movies-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
  }
  
  .movie-card {
    background-color: #1c1c1c;
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.3s ease;
  }
  
  .movie-card:hover {
    transform: translateY(-5px);
  }
  
  .movie-image {
    position: relative;
    height: 400px;
  }
  
  .movie-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  
  .play-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
  }
  
  .movie-card:hover .play-overlay {
    opacity: 1;
  }
  
  .play-icon {
    font-size: 3rem;
    color: #ecb674;
  }
  
  .movie-info {
    padding: 1.5rem;
  }
  
  .movie-info h3 {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
  }
  
  .movie-meta {
    display: flex;
    gap: 1rem;
    color: #888;
    margin-bottom: 1rem;
  }
  
  .book-button {
    width: 100%;
    background-color: #ecb674;
    color: #121212;
    border: none;
    padding: 0.75rem;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  
  .book-button:hover {
    background-color: #d9a05f;
  }
  
  /* Events Section */
  .events {
    padding: 4rem 0;
  }
  
  .events h2 {
    font-size: 2rem;
    color: #ecb674;
    margin-bottom: 2rem;
  }
  
  .events-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 2rem;
  }
  
  .event-card {
    position: relative;
    height: 300px;
    border-radius: 12px;
    overflow: hidden;
  }
  
  .event-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  
  .event-info {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 2rem;
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.9));
  }
  
  .event-info h3 {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
  }
  
  .event-info p {
    color: #ecb674;
    margin-bottom: 1rem;
  }
  .learn-more {
    background-color: white;
    color: #121212;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
    transition: transform 0.3s ease;
  }
  
  .learn-more:hover {
    transform: translateY(-2px);
  }
  
  /* Footer */
  .footer {
    background-color: #1c1c1c;
    padding: 4rem 0 2rem;
    margin-top: 4rem;
  }
  
  .footer-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
    margin-bottom: 2rem;
  }
  
  .footer-section h4 {
    color: #ecb674;
    margin-bottom: 1rem;
  }
  
  .footer-section ul {
    list-style: none;
  }
  
  .footer-section ul li {
    margin-bottom: 0.5rem;
  }
  
  .footer-section ul li a {
    color: #888;
    text-decoration: none;
    transition: color 0.3s ease;
  }
  
  .footer-section ul li a:hover {
    color: #ecb674;
  }
  
  .footer-bottom {
    text-align: center;
    padding-top: 2rem;
    border-top: 1px solid #333;
    color: #888;
  }
  
  /* Responsive Design */
  @media (max-width: 768px) {
    .hero h1 {
      font-size: 2.5rem;
    }
  
    .nav-links {
      display: none;
    }
  
    .movies-grid,
    .events-grid {
      grid-template-columns: 1fr;
    }
  
    .footer-content {
      grid-template-columns: 1fr;
      text-align: center;
    }
  }
 </style>
  </head>
  <body>
    <nav class="navbar">
      <div class="container">
        <div class="logo">CINEMA APP</div>
        <ul class="nav-links">
          <li><a href="#" class="active">Accueil</a></li>
          <li><a href="#">Films</a></li>
          <li><a href="#">Événements</a></li>
          <li><a href="#">Contact</a></li>
          <li><a  class="account-link"><i class="fas fa-user"></i></a></li>
          @auth
          <li><a href="">{{Auth::user()->email}}</a></li>
          <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="cta-button">Se déconnecter</button>
                </form>
            </li>
          @else
          <li><a href="/form"><button class="cta-button">se connecter / s'inscrire</button></a></li>
          @endauth
        </ul>
      </div>
    </nav>

    <header class="hero">
      <div class="container">
        <div class="hero-content">
          <h1>Découvrez le cinéma à son meilleur</h1>
          <p>Découvrez les derniers blockbusters et les classiques intemporels dans une qualité époustouflante.</p>
          <button class="cta-button">Réserver maintenant</button>
        </div>
      </div>
    </header>

    <section class="now-playing">
      <div class="container">
        <div class="section-header">
          <h2>À l'affiche</h2>
          <a href="#" class="view-all">Voir tout</a>
        </div>
        
        <div class="movies-grid">
          <div class="movie-card">
            <div class="movie-image">
              <img src="https://images.unsplash.com/photo-1534972195531-d756b9bfa9f2?auto=format&fit=crop&q=80&w=800" alt="Dune: Part Two">
              <div class="play-overlay">
                <span class="play-icon">▶</span>
              </div>
            </div>
            <div class="movie-info">
              <h3>Dune: Part Two</h3>
              <div class="movie-meta">
                <span>166 min</span>
                <span>12+</span>
              </div>
              <button class="book-button">Réserver</button>
            </div>
          </div>

          <div class="movie-card">
            <div class="movie-image">
              <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?auto=format&fit=crop&q=80&w=800" alt="Poor Things">
              <div class="play-overlay">
                <span class="play-icon">▶</span>
              </div>
            </div>
            <div class="movie-info">
              <h3>Poor Things</h3>
              <div class="movie-meta">
                <span>141 min</span>
                <span>16+</span>
              </div>
              <button class="book-button">Réserver</button>
            </div>
          </div>

          <div class="movie-card">
            <div class="movie-image">
              <img src="https://images.unsplash.com/photo-1440404653325-ab127d49abc1?auto=format&fit=crop&q=80&w=800" alt="Kung Fu Panda 4">
              <div class="play-overlay">
                <span class="play-icon">▶</span>
              </div>
            </div>
            <div class="movie-info">
              <h3>Kung Fu Panda 4</h3>
              <div class="movie-meta">
                <span>94 min</span>
                <span>All</span>
              </div>
              <button class="book-button">Réserver</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="events">
      <div class="container">
        <h2>Événements Spéciaux</h2>
        <div class="events-grid">
          <div class="event-card">
            <img src="https://images.unsplash.com/photo-1560169897-fc0cdbdfa4d5?auto=format&fit=crop&q=80&w=800" alt="Marvel Marathon">
            <div class="event-info">
              <h3>Marvel Marathon</h3>
              <p>15 Mars 2024</p>
              <button class="learn-more">En savoir plus</button>
            </div>
          </div>

          <div class="event-card">
            <img src="https://images.unsplash.com/photo-1594909122845-11baa439b7bf?auto=format&fit=crop&q=80&w=800" alt="Oscar Night Special">
            <div class="event-info">
              <h3>Oscar Night Special</h3>
              <p>20 Mars 2024</p>
              <button class="learn-more">En savoir plus</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer">
      <div class="container">
        <div class="footer-content">
          <div class="footer-section">
            <h4>À propos</h4>
            <ul>
              <li><a href="#">Notre histoire</a></li>
              <li><a href="#">Nos cinémas</a></li>
              <li><a href="#">Carrières</a></li>
            </ul>
          </div>
          <div class="footer-section">
            <h4>Informations</h4>
            <ul>
              <li><a href="#">Tarifs</a></li>
              <li><a href="#">FAQ</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          <div class="footer-section">
            <h4>Légal</h4>
            <ul>
              <li><a href="#">Conditions générales</a></li>
              <li><a href="#">Politique de confidentialité</a></li>
              <li><a href="#">Mentions légales</a></li>
            </ul>
          </div>
        </div>
        <div class="footer-bottom">
          <p>&copy; 2024 Cinema App. Tous droits réservés.</p>
        </div>
      </div>
    </footer>
  </body>
</html>