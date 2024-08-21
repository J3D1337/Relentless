@extends('layout.app')

@section('content')
<div class="container">
    <h1>{{ $game->title }}</h1>

    <div class="card" style="width: 18rem;">
        <img src="{{ asset('storage/' . $game->image) }}" class="card-img-top" alt="{{ $game->title }}" style="height: auto;">
        <div class="card-body">
            <h5 class="card-title">{{ $game->title }}</h5>
            <p class="card-text">Game ID: {{ $game->id }}</p>
            <a href="{{ route('games.index') }}" class="btn btn-primary">Back to Games List</a>
        </div>
    </div>

    @auth
    <!-- Idea Submission Form -->
    <h4 style="margin-top: 20px;">Looking To Play</h4>
    <div class="row">
        <form action="{{ route('ideas.store') }}" method="post">
            @csrf
            <input type="hidden" name="game_id" value="{{ $game->id }}">
            <div class="mb-3">
                <textarea name="content" class="form-control" id="content" rows="3" placeholder="What do you want to play?"></textarea>
                @error('content')
                    <span class="fs-6 text-danger"> {{$message}} </span>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark">Post</button>
            </div>
        </form>
    </div>
    @endauth

    <!-- Display Existing Ideas -->
    <h4 style="margin-top: 20px;">Ideas for This Game</h4>
    <div class="row">
        @foreach ($game->ideas as $idea)
            @include('ideas.shared.idea-card', ['idea' => $idea])
        @endforeach
    </div>
</div>
@endsection
