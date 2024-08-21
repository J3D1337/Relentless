@extends('layout.app')

@section('content')
<div class="container">
    <h1>Games List</h1>

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
