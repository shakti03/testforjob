<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Test-Job: User Home</title>    
    <!-- CSS -->
    {{ HTML::style('assets/css/main-v1.css') }}
    {{ HTML::style('assets/css/bootstrap.min.css') }}
    {{ HTML::style('assets/css/bootstrap-theme.min.css') }}
    {{ HTML::style('assets/css/style.css') }}
    {{ HTML::style('assets/css/color-font.css') }}

    @yield('styles')

    {{ HTML::script('assets/js/jquery-1.10.2.min.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}

    <script type="text/javascript">
        BASE_URL = "{{ URL::to('/')}}";
    </script>

    @yield('header_scripts')
</head>
<body>
    {{-- navbar --}}
    <section class="content">
        @include('layouts.navbar')
        @if(Session::has('flash_notice'))
        <div role="alert" class="alert alert-{{Session::get('flash_notice')['type']}} alert-dismissible fade in">
          <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
            {{Session::get('flash_notice')['msg']}} 
            @if(Session::get('flash_notice')['type'] == 'warning')
                <i class="fa fa-check"></i>
            @endif    
        </div>
        @endif
        @yield('container')
        
    </section>
    <img id="loader" src="{{URL::to('assets/images/loader.gif')}}" style="position:fixed;top:40%;left:40%;display:none">

    <!-- js -->

    @yield('footer_scripts')
 
</body>
</html>