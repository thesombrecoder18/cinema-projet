<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<h1>Liste des tâches</h1>
<a href="{{ route('tasks.create') }}">➕ Ajouter une nouvelle tâche</a>

@foreach($tasks as $task)
    <div class="task">
        <h3>{{ $task->title }}</h3>
        <p>{{ $task->description }}</p>
        <a href="{{ route('tasks.edit', $task) }}">✏️ Modifier</a>
        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button class="delete-button" type="submit">🗑️ Supprimer</button>
        </form>
    </div>
@endforeach   
</body>
</html>