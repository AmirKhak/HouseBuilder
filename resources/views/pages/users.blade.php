@extends('layouts.app')

@section('content')
  <div id="users_body">
    @php
      $counter = 0;
    @endphp
    @foreach($users as $user)
      @php
        $counter++;
      @endphp
      <div class="user_container">
        <div id="user_button_container">
          <button onclick="document.getElementById('{{$counter}}').style.display='block'"> More</button>
        </div>
        <p><strong>Name: </strong>{{$user->name}}</p>
        <p><strong>Email: </strong>{{$user->email}}</p>

        <div id="{{$counter}}" class="w3-modal" style="display:none;">
          <div id="users_modal_content" class="w3-modal-content">
            <div class="w3-container">
              <div id="modal_form">
                <span onclick="document.getElementById('{{$counter}}').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <p><strong>Name: </strong>{{$user->name}}</p>
                <p><strong>Email: </strong>{{$user->email}}</p>
                <p><strong>Date Created: </strong>{{$user->created_at}}</p>
                <p><strong>Orders: </strong></p>
                @if(count($user->orders) == 0)
                  <p>No Order Sent</p>
                @endif
                @foreach($user->orders as $order)
                  <p><strong>Subject: </strong>{{$order->title}}</p>
                @endforeach
                <div class="user_button_container">
                  {!!Form::open(['action' => ['PagesController@destroy', $user->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'container_button'])}}
                  {!!Form::close()!!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    <div id="pagination">
     {{$users->links()}}
    </div>
  </div>
@endsection
