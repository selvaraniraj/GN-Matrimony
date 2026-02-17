<!DOCTYPE html>
<html lang="en">
    @include('layout2.partials.home-header')
       <body class="index-page">
            @include('layout2.partials.home-navhead')
            @include('layout2.partials.messages')
            @yield('content')
            @include('layout2.partials.home-footer')
        </body>
</html>
