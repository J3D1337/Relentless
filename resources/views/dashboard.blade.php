@foreach($users as $user)
    <p>{{$user ['name']}}</p>
    <p>{{$user ['age']}}</p>
    @if($user['age'] < 18)
        <p>User can't drive</p>
    @endif
    <hr>
@endforeach

@copyright {{date ('Y')}}
