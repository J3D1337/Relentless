@auth
<h4 style="margin-top: 20px;"> Looking for a game </h4>
<div class="row">
    <form action="{{ route ('ideas.store')}}" method="post">
        @csrf
    <div class="mb-3">
        <textarea name="content" class="form-control" id="content" rows="3"></textarea>
        @error('idea')
            <span class="fs-6 text-danger"> {{$message}} </span>
        @enderror
    </div>
    <div class="">
        <button type="submit" class="btn btn-dark"> Post </button>
    </div>
</form>
</div>
@endauth
@guest
<h4 style="margin-top: 20px;"> Login to look for a game </h4>
@endguest
