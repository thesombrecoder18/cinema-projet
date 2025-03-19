@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Résultats pour : "{{ $query }}"</h2>

    @if(count($movies) > 0)
        <div class="row">
            @foreach($movies as $movie)
                <div class="col-md-4 mb-4">
                    <div class="card" style="border-radius: 15px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 18px; margin-bottom: 10px;">{{ $movie['title'] }}</h5>
                            <p class="card-text" style="font-size: 14px;">{{ $movie['description'] }} ({{ $movie['year'] }})</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Aucun film trouvé pour votre recherche.</p>
    @endif
</div>
@endsection
