<!doctype html>
<html lang="en">
   @include('layout2.partials.dashboard-header')
   <body>
      <div class="page">
         {{-- @include('layout2.partials.dashboard-nav') --}}
         <div class="page-wrapper">
            <div class="container-fluid">
                @include('layout2.partials.page-header')
                <div class="page-body">
                        @include('layout2.partials.messages')
                        @yield('content')
                </div>
            </div>
         </div>
      </div>
      <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('summernote/summernote-lite.min.js') }}"></script>
      @section('scripts') @show
      @stack('custom_scripts')
   </body>
</html>
