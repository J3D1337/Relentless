@auth
<h4 style="margin-top: 20px;"> Minds </h4>
<div class="row">
    <form action="{{ route('ideas.store') }}" method="post">
        @csrf

        <!-- Game selection dropdown -->
        <div class="mb-3">
            <label for="game_id" class="form-label">Select Game</label>
            <select name="game_id" class="form-control" required>
                <option value="">-- Choose a Game --</option>
                @foreach($games as $game)
                    <option value="{{ $game->id }}">{{ $game->title }}</option>
                @endforeach
            </select>
        </div>

        <!-- Content textarea -->
        <h6> Or just make a general post </h6>
        <div class="mb-3">
            <textarea name="content" class="form-control" id="content" rows="3"></textarea>
            @error('idea')
                <span class="fs-6 text-danger"> {{$message}} </span>
            @enderror
        </div>

        <!-- Submit button -->
        <div class="">
            <button type="submit" class="btn btn-dark"> Post </button>
        </div>
    </form>
</div>
@endauth

@guest
<h4 style="margin-top: 20px;"> Login to look for a game </h4>
@endguest

