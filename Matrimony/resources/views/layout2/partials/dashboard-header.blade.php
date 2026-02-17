<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content="noindex, nofollow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" name="robots" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@section('title') Dashboard @show | {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('/css/v2Navbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/v2Style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/summernote/summernote-lite.min.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/2.12.0/tabler-icons.min.css" rel="stylesheet">

    @section('custom-css')@show
    <script type="text/javascript" src="{{ asset('/js/html5shiv.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/respond.min.js') }}"></script>
    <![endif]-->
</head>
