{{-- @php
    $games = \App\Models\Game::all();
@endphp --}}
<div class="card-body" style="margin-top: 20px; margin-left: 20px;">
    <h5>Looking For Game</h5>
    <table class="table table-hover">
        <tbody>
                @foreach ($games as $game)
                    <tr>
                        <td style="width: 60px;">
                            <div class="avatar">
                                <a href="#!">
                                    <img class="avatar-img rounded-circle img-small"
                                        src="{{ asset('storage/' . $game->image) }}" alt="{{ $game->title }}"
                                        style="width: 50px; height: 50px;">
                                </a>
                            </div>
                        </td>
                        <td>
                            <a class="h6 mb-0" href="{{ route('games.show', $game->id) }}">{{ $game->title }}</a>
                            <p class="mb-0 small text-truncate"></p>
                        </td>
                    </tr>
                @endforeach
        </tbody>
    </table>
    <div class="d-grid mt-3">
        <a class="btn btn-sm btn-primary-soft" href={{route("games.index")}}>Show More</a>

    </div>
</div>
