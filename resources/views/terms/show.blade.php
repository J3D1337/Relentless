@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-7">
                        @include('shared.success-message')
                        <div class="mt-3">
                        <h1>Terms</h1>

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
@endsection

@include('shared.footer')


