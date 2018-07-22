@extends('layouts.app')
@section('content')
  <div id="faq_body">
    @if($is_current_user_admin)
      <div id="faq_body_button">
        <button onclick="document.getElementById('faq_create_modal').style.display='block'">Add faq</button>
      </div>

      <div id="faq_create_modal" class="w3-modal" style="display:none;">
        <div id="modal_faq_content" class="w3-modal-content">
          <div class="w3-container">
            <div id="modal_form">
              <span onclick="document.getElementById('faq_create_modal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
              {!! Form::open(['action' => 'FaqsController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                  {{Form::label('question', 'Question')}}
                  {{Form::textarea('question', '', ['class' => 'form-control', 'placeholder' => 'question'])}}
                </div>
                <div class="form-group">
                  {{Form::label('answer', 'Answer')}}
                  {{Form::textarea('answer', '', ['class' => 'form-control', 'placeholder' => 'answer'])}}
                </div>
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    @endif

    <div id="faqs_container">
      @foreach ($faqs as $faq)
        <div class="faq_container">
          @if ($is_current_user_admin)
            <div class="faq_button_container">
              {!!Form::open(['action' => ['FaqsController@destroy', $faq->id], 'method' => 'POST'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'container_button'])}}
              {!!Form::close()!!}
            </div>
          @endif
          <p><strong>{{$faq->question}}</strong></p>
          <p>{{$faq->answer}}</p>
        </div>
      @endforeach
    </div>

  </div>
@endsection
