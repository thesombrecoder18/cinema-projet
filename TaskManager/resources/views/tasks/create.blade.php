<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<h1>Créer une nouvelle tâche</h1>
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Titre de la tâche" required>
    <textarea name="description" placeholder="Description"></textarea>
    <button type="submit">✅ Enregistrer</button>
</form>
<a href="{{ route('tasks.index') }}">⬅️ Retour à la liste des tâches</a>
</body>
</html>

