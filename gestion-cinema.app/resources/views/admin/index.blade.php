<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
</head>
<body>
    <div class="login-container active" id="loginPage">
        <div class="login-box">
            <div class="login-logo">
                <i class="fas fa-film" style="font-size: 48px; color: var(--primary-color);"></i>
                <h1>CinéAdmin</h1>
            </div>
            <!-- Formulaire de connexion -->
            <form class="login-form" action="{{ route('admin.login') }}" method="POST">
                @csrf <!-- Protection CSRF -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                    <div style="text-align: right; margin-top: 4px;">
                        <a href="#" style="color: var(--primary-color); font-size: 0.9em;">Mot de passe oublié ?</a>
                    </div>
                </div>
                <button type="submit" class="login-btn" id="loginBtn">Se connecter</button>
            </form>
        </div>
    </div>
</body>
</html>