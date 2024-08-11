@extends('layout.app')

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-7">
                        @include('shared.success-message')
                        <div class="mt-3">
                            @include('ideas.shared.idea-card')
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header pb-0 border-1">
                                <h5 class="mt-4">Search For Games</h5>
                            </div>
                            <div class="card-body">
                                <input placeholder="..." class="form-control w-100" type="text" id="search">
                                <button class="btn btn-dark mt-2 mr-5"> Search</button>
                            </div>
                            @include('shared.looking-for')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@include('shared.footer')
