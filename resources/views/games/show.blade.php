@extends('layout.app')

@section('content')
<div class="container">
    <h1>{{ $game->title }}</h1>

    <div class="card" style="width: 18rem;">
        <img src="{{ asset('storage/' . $game->image) }}" class="card-img-top" alt="{{ $game->title }}" style="height: auto;">
        <div class="card-body">
            <h5 class="card-title">{{ $game->title }}</h5>
            <p class="card-text">Game ID: {{ $game->id }}</p>
            <!-- Add more game details here if needed -->
            <a href="{{ route('games.index') }}" class="btn btn-primary">Back to Games List</a>
        </div>
    </div>
</div>
@endsection
