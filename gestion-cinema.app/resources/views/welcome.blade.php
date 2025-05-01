<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>

<body>
    <h1>Bienvenue sur notre site</h1>
    <a href="{{ route('auth.form') }}">Se Connecter</a>
    {{-- <a href="{{ route('login') }}">Se connecter</a> --}}
    <a href="{{ route('register') }}">S'inscrire</a>
</body>

</html>
