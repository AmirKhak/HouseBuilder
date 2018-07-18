<div id="footer">
  <div class="menu_container">
    <div class="menu_header_container">
      <p><strong>MENU</strong></p>
    </div>
    @foreach ($navbar_items as $navbar_item)
      @if ($navbar_item === "SIGN IN" && Auth::check())
        @php
          $user = Auth::user();
        @endphp
        <div class="menu_item_container">
          {!! Form::open(['method' => 'POST', 'route' => ['logout']]) !!}
            {{ Form::submit('Sign Out') }}
          {!! Form::close() !!}
        </div>
      @else
        <div class="menu_item_container">
          <a href="{{$navbar_links[array_search($navbar_item, $navbar_items)]}}">{{$navbar_item}}</a>
        </div>
      @endif
    @endforeach
  </div>
  <div id="footer_address_container" class="menu_container">
    <div id="footer_address" class="menu_header_container">
      <p><strong>HouseBuilder</strong></p>
      <p>info@HouseBuilder.com</p><br/>
      <p>Hedgemans Rd</p>
      <p>Dagenham</p>
      <p>London</p>
      <p>RM9</p>
      <p>020 8995 3575</p>
    </div>
  </div>
  <div id=footer_icon_area>
    <img id="footer_icon" src="/images/building_icon.png">
    <p>HouseBuilder</p>
  </div>
</div>
