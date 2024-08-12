@extends('layout.app')

@section('title', $user->name)


@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-7">
                        @include('shared.success-message')
                        <div class="mt-3">
                            @include('users.shared.user-card')
                        </div>
                        @foreach($ideas as $idea)
                            <div class="mt-3">
                                @include('ideas.shared.idea-card')
                            </div>
                        @endforeach
                        <div class="mt-3">
                            {{ $ideas->links() }}
                        </div>
                    </div>
                    <div class="col-5">

                        @include('shared.search-bar')

                        @include('shared.looking-for')
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('shared.footer')
