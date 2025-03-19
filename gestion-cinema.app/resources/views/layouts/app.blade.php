<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Inclure vos feuilles de style et scripts ici -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header>
        <!-- Contenu de l'en-tête -->
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="text-center p-1" style="background: #ecb674; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">
        <p style="font-size: 14px; color: #333;">&copy; {{ date('Y') }} Cinema App - Tous droits réservés</p>
    </footer>
    
</body>
</html>
