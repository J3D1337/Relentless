@extends('layout.app')
@section('title', $game->title)

@section('content')
<div class="container">
    <h1>{{ $game->title }}</h1>

    <div class="card" style="width: 18rem;">
        <img src="{{ asset('storage/' . $game->image) }}" class="card-img-top" alt="{{ $game->title }}" style="height: auto;">
        <div class="card-body">
            <h5 class="card-title">{{ $game->title }}</h5>
            <p class="card-text">Game ID: {{ $game->id }}</p>
            <a href="{{ route('games.index') }}" class="btn btn-primary">Back to Games List</a>

            @if(auth()->user() && auth()->user()->is_admin)
            <!-- Edit and Delete Buttons -->
            <div class="mt-3">
                <button id="edit-btn" class="btn btn-warning">Edit</button>
                <form action="{{ route('games.destroy', $game->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
            @endif

            <!-- Edit Form, initially hidden -->
            <form id="edit-form" action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data" style="display: none; margin-top: 20px;">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Game Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $game->title }}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Game Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
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

<script>
    document.getElementById('edit-btn').addEventListener('click', function() {
        document.getElementById('edit-form').style.display = 'block';
    });
</script>

@endsection
