@extends('layouts.app')

@section('content')
  <div id="order_body">
    @if(count($orders) == 0)
      <p><strong>No Order Sent</strong></p>
    @endif
    @php
      $counter = 0;
    @endphp
    @foreach($orders as $order)
      @php
        $counter++;
      @endphp
      <div class="order_container">
        <div id="user_button_container">
          <button onclick="document.getElementById('{{$counter}}').style.display='block'"> More</button>
        </div>
        <p><strong>Subject: </strong>{{$order->title}}</p>
        <p><strong>Group: </strong>{{$order->group}}</p>
        <p><strong>Data Ordered: </strong>{{$order->created_at}}</p>

        <div id="{{$counter}}" class="w3-modal" style="display:none;">
          <div id="orders_modal_content" class="w3-modal-content">
            <div class="w3-container">
              <div id="modal_form">
                <span onclick="document.getElementById('{{$counter}}').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <p><strong>Group: </strong>{{$order->group}}</p>
                <p><strong>Subject: </strong>{{$order->title}}</p>
                <p><strong>Status: </strong>
                  @php
                    $status = "Not Finished";
                    if ($order->done) {
                      $status = "Done";
                    }
                  @endphp
                  {{$status}}
                </p>
                <p><strong>Data Ordered: </strong>{{$order->created_at}}</p>
                @php
                  $customer = \App\User::find($order->user_id);
                  $mark = 'Mark As Done';
                  if ($order->done) {
                    $mark = 'Mark As Not Finished';
                  }
                @endphp
                <p><strong>Customer: </strong>{{$customer->name}}</p>
                <p><strong>Customer Email: </strong>{{$customer->email}}</p>
                <p><strong>Description: </strong>{{$order->description}}</p>
                <div class="modal_button_container">
                  {!!Form::open(['action' => ['PagesController@mark_as_done', $order->id], 'method' => 'GET'])!!}
                    {{Form::submit($mark, ['class' => 'modal_button'])}}
                  {!!Form::close()!!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    <div id="pagination">
     {{$orders->links()}}
    </div>
  </div>

@endsection
