<!-- resources/views/users/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier un utilisateur</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Modifier un utilisateur</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $user->name }}" required>
        <input type="email" name="email" value="{{ $user->email }}" required>
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>
