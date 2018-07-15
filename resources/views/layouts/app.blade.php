<!DOCTYPE html>
<html lang={{ config('app.locale') }}>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HouseBuilder</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
  </body>
  <script>
  </script>
</html>
