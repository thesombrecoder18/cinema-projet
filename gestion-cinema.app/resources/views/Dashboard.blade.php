@extends('layouts.app')

@section('content')
<h1>Tableau de Bord</h1>
<p>Bienvenue, {{ auth()->user()->nom }} !</p>

<ul>
    <li><a href="/films">Gérer les films</a></li>
    <li><a href="/salles">Gérer les salles</a></li>
    <li><a href="/seances">Gérer les séances</a></li>
    <li><a href="/reservations">Gérer les réservations</a></li>
    <li><a href="/paiements">Gérer les paiements</a></li>
</ul>
@endsection