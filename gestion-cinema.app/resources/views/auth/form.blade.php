<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premiere page</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
  <body>
      <div class="container">
          <div class="formulaire-box login">
              <form action="#">
                  <h1>CONNEXION</h1>
                  <div class="input-box">
                      <input type="email" placeholder="email">
                      <i class='bx bxs-user'></i>
                  </div>
                  <div class="input-box">
                      <input type="password" placeholder="mot de passe">
                      <i class='bx bxs-lock-alt' ></i>
                  </div>
                  <div class="forgot-link">
                      <a href="#">mot de passe oublié?</a>
                  </div>
                  <button type="submit" class="btn">Se Connecter</button>
                  <div class="social-icons">
                      
                  </div>
              </form>
          </div>

          <div class="formulaire-box register">
              <form action="#">
                  <h1>INSCRIPTION</h1>
                  <div class="input-box">
                      <input type="text" placeholder="Nom">
                      <i class='bx bxs-user'></i>
                  </div>
                  <div class="input-box">
                    <input type="email" placeholder="Email">
                    <i class='bx bxs-envelope' ></i>
                </div>
                
                  <div class="input-box">
                      <input type="password" name="mot_de_passe" placeholder="mot de passe ">
                      <i class='bx bxs-lock-alt' ></i>
                  </div>
                  <div class="input-box">
                      <input type="password" name="mot_de_passe_confirmation" placeholder="valider mot de passe ">
                      <i class='bx bxs-lock-alt' ></i>
                  </div>
                  <button type="submit" class="btn">Enregistrer</button>
                  <div class="social-icons">
                     
                  </div>
              </form>
          </div>

          <div class="toggle-box">
              <div class="toggle-panel toggle-left">
                  <h1>Salam sur tous !</h1>
                  <p>vous n'avez pas de compte ?</p>
                  <button class="btn register-btn">S'inscrire</button>
                  
              </div>

              <div class="toggle-panel toggle-right">
                  <h1>DE retour XD</h1>
                  <p>vous avez deja un compte ?</p>
                  <button class="btn login-btn">Se connecter</button>
              </div>
          </div>
      </div>

      
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://unpkg.com/boxicons@2.1.4/js/boxicons.min.js"></script>
      
  </body>
</html>