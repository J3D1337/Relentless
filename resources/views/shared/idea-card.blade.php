<div class="card h-100">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{$idea->user->name}}" alt="{{$idea->user->name}}">
                <div>
                    <h5 class="card-title mb-0"><a href="#"> {{$idea->user->name}}
                        </a></h5>
                </div>
            </div>
            <div>
                <form method="POST" action="{{ route('ideas.destroy', $idea) }}">
                    @csrf
                    @method('DELETE')
                    @if (auth()->id() == $idea->user_id)
                    <a class="mx-2" href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
                    @endif
                    <a href="{{ route('ideas.show', $idea->id) }}">View</a>
                    @if (auth()->id() == $idea->user_id)
                    <button class="ms-1 btn btn-danger btn-sm">X</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <div class="card-body d-flex flex-column">
        @if($editing ?? false)
        <form action="{{ route ('ideas.update', $idea->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <textarea name="content" class="form-control" id="content" rows="3">{{$idea->content}}</textarea>
                @error('content')
                    <span class="fs-6 text-danger"> {{$message}} </span>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark mb-2">Post</button>
            </div>
        </form>
        @else
        <p class="fs-6 fw-light text-muted flex-grow-1">
            {{ $idea->content }}
        </p>
        @endif
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"><span class="fas fa-heart me-2"></span>{{$idea->likes}}</a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"><span class="fas fa-clock"></span>{{$idea->created_at}}</span>
            </div>
        </div>
        @include('shared.comments-box')
    </div>
</div>
