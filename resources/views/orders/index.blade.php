@extends('layouts.app')
@section('content')
  <div id="orders_body">
    <h2>Choose the section you need</h2>
    <div id="options_container">
      <div id="option_1" class="option_container">
        <div id="option_1_dropdown">
          <div class="option_dropdown_link">
            <button onclick="createModal('Interior and exterior painting')">Interior and exterior painting</button>
          </div>
        </div>
        <p>Interior and exterior painting</p>
      </div>
      <div id="option_2" class="option_container">
        <div id="option_2_dropdown">
          <div class="option_dropdown_link">
            <button onclick="createModal('Building conservatory and extension')">Building conservatory and extension</button>
          </div>
        </div>
        <p>Building conservatory and extension</p>
      </div>
      <div id="option_3" class="option_container">
        <div id="option_3_dropdown">
          <div class="option_dropdown_link">
            <button onclick="createModal('Plumbing and electrical wiring')">Plumbing and electrical wiring</button>
          </div>
        </div>
        <p>Plumbing and electrical wiring</p>
      </div>
      <div id="option_4" class="option_container">
        <div id="option_4_dropdown">
          <div class="option_dropdown_link">
            <button onclick="createModal('Desiging and paving house front')">Desiging and paving house front</button>
          </div>
        </div>
        <p>Desiging and paving house front</p>
      </div>
      <div id="option_5" class="option_container">
        <div id="option_5_dropdown">
          <div class="option_dropdown_link">
            <button onclick="createModal('Installing laminate flooring')">Installing laminate flooring</button>
          </div>
        </div>
        <p>Installing laminate flooring</p>
      </div>
      <div id="option_6" class="option_container">
        <div id="option_6_dropdown">
          <div class="option_dropdown_link">
            <button onclick="createModal('Other house related works')">Other house related works</button>
          </div>
        </div>
        <p>Other house related works</p>
      </div>
    </div>

    <div id="order_create_modal" class="w3-modal" style="display:none;">
      <div id="modal_content" class="w3-modal-content">
        <div class="w3-container">
          <div id="modal_form">
            @if (Auth::check())
              @php
                $customer = Auth::user();
              @endphp
              <span onclick="document.getElementById('order_create_modal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
              {!! Form::open(['action' => 'OrdersController@store', 'method' => 'POST']) !!}
                {{Form::hidden('group', '', ['id' => 'group_field'])}}
                {{Form::hidden('user_id', $customer->id, ['id' => 'group_field'])}}
                <div class="form-group">
                  {{Form::label('title', 'Subject')}}
                  {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Subject'])}}
                </div>
                <div class="form-group">
                  {{Form::label('description', 'Description')}}
                  {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
                </div>
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
              {!! Form::close() !!}
            @else
              <span onclick="document.getElementById('order_create_modal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
              <h2>Sorry, You should sign in.</h2>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function createModal($group) {
      document.getElementById('order_create_modal').style = "display: block;";
      document.getElementById('group_field').value = $group;
    }
  </script>
@endsection
