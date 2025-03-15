<!-- resources/views/users/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Détails de l'utilisateur</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Détails de l'utilisateur</h1>
    <p>Nom : {{ $user->name }}</p>
    <p>Email : {{ $user->email }}</p>
    <a href="{{ route('users.index') }}">Retour à la liste</a>
</body>
</html>
