@if (count($errors) > 0)
  @foreach($errors->all() as $error)
    <div class="messages">
       {{$error}}
    </div>
  @endforeach
@endif

@if (session('success'))
  <div class="messages">
    {{session('success')}}
  </div>
@endif

@if (session('error'))
  <div class="messages">
    {{session('error')}}
  </div>
@endif
