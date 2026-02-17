<!DOCTYPE html>
<html lang="en">
    @include('layout2.partials.home-header')
       <body class="index-page">
            @include('layout2.partials.userpage-navhead', ['upload_image' => $upload_image ?? null,
            'memberName' => $memberName ?? 'Guest','notificationCount' => $notificationCount])

            @yield('content')
            @include('layout2.partials.home-footer')
        </body>
</html>
