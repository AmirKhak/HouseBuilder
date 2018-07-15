<div id="header">
  <img id="header_title_logo" src="/images/unfinishedWall.svg">
  <div class="header_title">
    <h1>HouseBuilder</h1>
  </div>
  @php
    $navbar_items = array("HOME", "ORDER", "ABOUT US", "CONTACT", "FAQ", "SIGN IN");
  @endphp
  <div id="nav_bar_container">
    <nav class="nav_bar">
      @foreach ($navbar_items as $navbar_item)
        <div class="navbar_item_container">
          <a class="navbar_item" href="">{{$navbar_item}}</a>
        </div>
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
