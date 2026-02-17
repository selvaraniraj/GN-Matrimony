<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <meta content="noindex, nofollow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" name="robots" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
      <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">
      <title>@section('title') Home @show | {{{ config('app.name') }}}</title>
      <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
      <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/css/bootstrap.min.css') }}" />

      <script type="text/javascript" src="{{ asset('/js/html5shiv.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('/js/respond.min.js') }}"></script>

   </head>
   <body  class="bg-website d-flex flex-column">
      @yield('content')
      <script src="{{ asset('bootstrap-5.0.2/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('js/custom.js') }}"></script>
      <script src="{{ asset('js/validations.js') }}"></script>
   </body>
</html>
