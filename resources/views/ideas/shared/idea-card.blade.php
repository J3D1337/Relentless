<div class="card h-100">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{$idea->user->getImageURL()}}" alt="{{$idea->user->name}}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{route('users.show', $idea->user->id)}}"> {{$idea->user->name}}
                        </a></h5>
                </div>
            </div>
            <div>
                @auth
                <form method="POST" action="{{ route('ideas.destroy', $idea) }}">
                    @csrf
                    @method('DELETE')

                    @can('update', $idea)
                    <a class="mx-2" href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
                    @endcan

                    <a href="{{ route('ideas.show', $idea->id) }}">View</a>

                    @can('delete', $idea)
                    <button class="ms-1 btn btn-danger btn-sm">X</button>
                    @endcan
                </form>
                @endauth
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
            @include('ideas.shared.like-button')
            <div>
                <span class="fs-6 fw-light text-muted">
                    <span class="fas fa-clock mb-3" style="margin-right: 8px;"></span>{{ $idea->created_at->diffForHumans() }}
                </span>
            </div>

        </div>
        @include('shared.comments-box')
    </div>
</div>
