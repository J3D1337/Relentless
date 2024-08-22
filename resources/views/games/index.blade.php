@extends('layout.app')
@section('title', 'Games List')

@section('content')
<div class="container">
    <h1>Games List</h1>

    @if(Auth::check() && Auth::user()->is_admin)
        <!-- Form for adding a new game (visible to admins only) -->
        <div class="mb-4">
            <h2>Add a New Game</h2>
            <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Game Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Game</button>
            </form>
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($games as $game)
                <tr>
                    <td>{{ $game->id }}</td>
                    <td>
                        @if ($game->image)
                            <img src="{{ asset('storage/' . $game->image) }}" alt="{{ $game->title }}" style="width: 100px; height: auto;">
                        @else
                            <img src="{{ asset('storage/default.png') }}" alt="Default Image" style="width: 100px; height: auto;">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('games.show', $game->id) }}">{{ $game->title }}</a> <!-- Make title clickable -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $games->links() }} <!-- Pagination links -->
</div>
@endsection
