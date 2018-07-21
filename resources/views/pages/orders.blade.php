@extends('layouts.app')

@section('content')
  <div id="order_body">
    @foreach($orders as $order)
      <!-- @php
      @endphp -->
      <div class="order_container">
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
        
      </div>
    @endforeach
  </div>
@endsection
