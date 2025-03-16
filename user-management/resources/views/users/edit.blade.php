<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ $user->name }}" required>
            <input type="email" name="email" value="{{ $user->email }}" required>
            <input type="text" name="role" value="{{ $user->role }}" required>
            <button type="submit" class="btn">Update User</button>
        </form>
    </div>
</body>
</html>
