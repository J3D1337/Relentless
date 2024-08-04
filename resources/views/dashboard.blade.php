@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Dashboard</h2>
                <p>Welcome to the dashboard</p>
                <div class="row">
                    <div class="col-7">
                        @include('shared.success-message')
                        @include('shared.submit-idea')
                        <hr>
                        @foreach($ideas as $idea)
                        <div class="mt-3">
                            @include('shared.idea-card')
                        </div>
                        @endforeach
                        <div class="mt-3">
                        {{ $ideas->links() }}
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header pb-0 border-1">
                                <h5 class="">Search For Games</h5>
                            </div>
                            <div class="card-body">
                                <input placeholder="..." class="form-control w-100" type="text" id="search">
                                <button class="btn btn-dark mt-2 mr-5"> Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <footer class="bg-dark text-white mt-4">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-6">
                    <h5>About Us</h5>
                    <p>We share innovative ideas and thoughts.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h5>Contact</h5>
                    <ul class="list-unstyled">
                        <li>Email: david.kezele@hotmail.com</li>
                        <li>Phone: +385 95 367 2445</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">&copy; 2024 Relentless. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
@endsection
