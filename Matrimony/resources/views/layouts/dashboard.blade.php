<!doctype html>
<html lang="en">
   @include('layouts.partials.dashboard-header')
   <body>
      <div class="page">
         @include('layouts.partials.dashboard-nav')
         <div class="page-wrapper">
            <div class="container-fluid">
                @include('layouts.partials.page-header')
                <div class="page-body">
                        @include('layouts.partials.messages')
                        @yield('content')
                </div>
            </div>
         </div>
      </div>
      <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
      <script src="{{ asset('js/chart.min.js') }}"></script>
      <script src="{{ asset('js/respond.min.js') }}"></script>
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('summernote/summernote-lite.min.js') }}"></script>
      @section('scripts') @show
      @stack('custom_scripts')
   </body>

</html>
