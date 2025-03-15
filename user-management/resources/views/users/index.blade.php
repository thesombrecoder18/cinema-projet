<!-- resources/views/users/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Liste des utilisateurs</h1>
    <a href="{{ route('users.create') }}">Créer un utilisateur</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}">Modifier</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>




