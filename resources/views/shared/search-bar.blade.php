<div class="card">
    <div class="card-header pb-0 border-1">
        <h5 class="">Search For Games</h5>
    </div>
    <div class="card-body">
        <form action="{{route ('dashboard')}}" method="GET">
        <input name="search" placeholder="..." class="form-control w-100" type="text" id="search">
        <button class="btn btn-dark mt-2 mr-5"> Search</button>
        </form>
    </div>
</div>
