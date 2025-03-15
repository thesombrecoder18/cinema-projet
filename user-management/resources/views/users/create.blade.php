<!-- resources/views/users/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Créer un utilisateur</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Créer un utilisateur</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nom" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Créer</button>
    </form>
</body>
</html>
