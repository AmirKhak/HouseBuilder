<div id="header">
  <img id="header_title_logo" src="/images/unfinishedWall.svg">
  <div class="header_title">
    <h1>HouseBuilder</h1>
  </div>
  <div id="nav_bar_container">
    <nav class="nav_bar">
      @foreach ($navbar_items as $navbar_item)
        @if ($navbar_item === "SIGN IN" && Auth::check())
          @php
            $user = Auth::user();
          @endphp
          <div id="auth_dropdown" class="navbar_item_container">
            <div id="auth_dropdown_after_link">
              {!! Form::open(['method' => 'POST', 'route' => ['logout']]) !!}
                {{ Form::submit('Sign Out') }}
              {!! Form::close() !!}
            </div>
            <a id="auth_dropdown_before_link" class="navbar_item" href="#">Hey {{$user->name}}</a>
          </div>
        @else
          <div class="navbar_item_container">
            <a class="navbar_item" href="{{$navbar_links[array_search($navbar_item, $navbar_items)]}}">
              {{$navbar_item}}
            </a>
          </div>
        @endif
      @endforeach
    </nav>
  </div>

</div>
<script>
  var navbar_items = document.getElementsByClassName("navbar_item");
  for (i = 0; i < navbar_items.length; i++) {
    navbar_items[i].style.animation = "appear " + (i * 1.5 + 2) + "s";
  }
</script>
