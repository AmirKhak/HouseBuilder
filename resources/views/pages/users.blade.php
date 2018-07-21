@extends('layouts.app')

@section('content')
  <div id="users_body">
    @foreach($users as $user)
      <div class="user_container">
        <p><strong>Name: </strong>{{$user->name}}</p>
        <p><strong>Email: </strong>{{$user->email}}</p>
      </div>
    @endforeach
  </div>
@endsection
