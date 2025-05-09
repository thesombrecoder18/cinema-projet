<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema App</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="container">
        <div class="formulaire-box login">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h1>CONNEXION</h1>
                <div class="input-box">
                    <input type="email" name="email" placeholder="email" required>
                    <i class='bx bxs-user'></i>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="input-box">
                    <input type="password" name="password" placeholder="mot de passe" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="forgot-link">
                    <a href="#">mot de passe oublié?</a>
                </div>
                <button type="submit" class="btn">Se Connecter</button>
                <div class="social-icons"></div>
            </form>
        </div>

        <div class="formulaire-box register">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <h1>INSCRIPTION</h1>
                <div class="input-box">
                    <input type="text" name="nom" placeholder="Nom" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="mot de passe" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password_confirmation" placeholder="valider mot de passe" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="btn">Enregistrer</button>
                <div class="social-icons"></div>
            </form>
        </div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Siyaar !</h1>
                <p>vous n'avez pas de compte ?</p>
                <button class="btn register-btn">S'inscrire</button>
            </div>

            <div class="toggle-panel toggle-right">
                <h1>Kaay setaan</h1>
                <p>vous avez deja un compte ?</p>
                <button class="btn login-btn">Se connecter</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/js/boxicons.min.js"></script>
</body>

</html>
