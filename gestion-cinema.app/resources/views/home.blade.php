@extends('layouts.app')

@section('content')
@include('partials.dashboard-header')
<!-- La page adopte le fond en dégradé défini dans ton CSS global -->
<div class="container" style="width: 850px; height: auto; padding-bottom: 30px; ">
    <!-- Header / Banner -->
    <header class="text-center p-4" style="background: url('https://via.placeholder.com/850x250?text=Cinema+Hero') no-repeat center center; background-size: cover; border-top-left-radius: 30px; border-top-right-radius: 30px;">
        <h1 class="" style="font-size: 36px; margin: 0; color: #ecb674;">Bienvenue sur Cinema App</h1>
        <p class="" style="font-size: 16px; color: #ecb674;">Votre portail pour réserver des places au cinéma</p>
    </header>

    <!-- Section principale -->
    <div class="p-4">
        <h2 class="text-center mb-4" style="font-size: 28px;">Films à l'affiche</h2>
        <div class="row">
            <!-- Exemple de carte film -->
            <div class="col-md-3 mb-4">
                <div class="card" style="border-radius: 15px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                    <img src="https://via.placeholder.com/300x450?text=Film+1" class="card-img-top" alt="Film 1">
                    <div class="card-body text-center" style="padding: 15px;">
                        <h5 class="card-title" style="font-size: 18px; margin-bottom: 10px;">Film 1</h5>
                        <p class="card-text" style="font-size: 14px;">Une brève description du film.</p>
                        <a href="#" class="btn" style="background: #ecb674; color: #fff; font-weight: 600; width: 100%;">Voir plus</a>
                    </div>
                </div>
            </div>
            <!-- Répéter pour d'autres films -->
            <div class="col-md-3 mb-4">
                <div class="card" style="border-radius: 15px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                    <img src="https://via.placeholder.com/300x450?text=Film+2" class="card-img-top" alt="Film 2">
                    <div class="card-body text-center" style="padding: 15px;">
                        <h5 class="card-title" style="font-size: 18px; margin-bottom: 10px;">Film 2</h5>
                        <p class="card-text" style="font-size: 14px;">Description succincte.</p>
                        <a href="#" class="btn" style="background: #ecb674; color: #fff; font-weight: 600; width: 100%;">Voir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card" style="border-radius: 15px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                    <img src="https://via.placeholder.com/300x450?text=Film+3" class="card-img-top" alt="Film 3">
                    <div class="card-body text-center" style="padding: 15px;">
                        <h5 class="card-title" style="font-size: 18px; margin-bottom: 10px;">Film 3</h5>
                        <p class="card-text" style="font-size: 14px;">Description succincte.</p>
                        <a href="#" class="btn" style="background: #ecb674; color: #fff; font-weight: 600; width: 100%;">Voir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card" style="border-radius: 15px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                    <img src="https://via.placeholder.com/300x450?text=Film+4" class="card-img-top" alt="Film 4">
                    <div class="card-body text-center" style="padding: 15px;">
                        <h5 class="card-title" style="font-size: 18px; margin-bottom: 10px;">Film 4</h5>
                        <p class="card-text" style="font-size: 14px;">Description succincte.</p>
                        <a href="#" class="btn" style="background: #ecb674; color: #fff; font-weight: 600; width: 100%;">Voir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pied de page simple -->
    
</div>
@endsection
