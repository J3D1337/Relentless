@extends('layout.app')
@section('title', 'Games')
@section('content')
@foreach($games as $game)
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Last</th>
        <th scope="col">#</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>{{$game->title}}</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
    </tbody>
    </table>
@endforeach
@endsection
