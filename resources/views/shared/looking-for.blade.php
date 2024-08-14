{{-- @php
    $games = \App\Models\Game::all();
@endphp --}}
<div class="card-body" style="margin-top: 20px; margin-left: 20px;">
    <h5>Looking For</h5>
    <table class="table table-hover">
        <tbody>
            @if ($games->isEmpty())
                <p>No games available at the moment.</p>
            @else
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
                            <a class="h6 mb-0" href="#!">{{ $game->title }}</a>
                            <p class="mb-0 small text-truncate"></p>
                        </td>
                        <td class="text-end">
                            <a class="btn btn-primary-soft rounded-circle icon-md" href="#">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div class="d-grid mt-3">
        <a class="btn btn-sm btn-primary-soft" href="{{route ('games.index')}}">Show More</a>
    </div>
</div>
