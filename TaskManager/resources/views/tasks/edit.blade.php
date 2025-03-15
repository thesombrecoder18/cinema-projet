<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<h1>Modifier la tâche</h1>
<form action="{{ route('tasks.update', $task) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $task->title }}" required>
    <textarea name="description">{{ $task->description }}</textarea>
    <button type="submit">💾 Mettre à jour</button>
</form>
<a href="{{ route('tasks.index') }}">⬅️ Retour à la liste des tâches</a>
</body>
</html>