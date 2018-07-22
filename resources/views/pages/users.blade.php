@extends('layouts.app')

@section('content')
  <div id="users_body">
    @foreach($users as $user)
      <div class="user_container">
        <div id="user_button_container">
          <button onclick="document.getElementById('more_info_modal').style.display='block'"> More</button>
        </div>
        <p><strong>Name: </strong>{{$user->name}}</p>
        <p><strong>Email: </strong>{{$user->email}}</p>

        <div id="more_info_modal" class="w3-modal" style="display:none;">
          <div id="users_modal_content" class="w3-modal-content">
            <div class="w3-container">
              <div id="modal_form">
                <span onclick="document.getElementById('more_info_modal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <p><strong>Orders: </strong></p>
                @foreach($user->orders as $order)
                  <p><strong>Subject: </strong>{{$order->title}}</p>
                @endforeach
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
