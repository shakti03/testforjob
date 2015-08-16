<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Test for job</title>    
    <!-- CSS -->
    {{ HTML::style('assets/css/app.min.css') }}
    @yield('styles')

    {{ HTML::script('assets/js/jquery-1.10.2.min.js') }}
    <script type="text/javascript">
        BASE_URL = "{{ URL::to('/')}}";
    </script>
    @yield('header_scripts')
</head>
<body>
    @include('layouts.header')

    <div class="main-container">
        @yield('content')
    </div>
    
    
    <div class="loader displayNone" id="loader">
        <img src="{{URL::to('assets/images/loader.gif')}}">
    </div>
    @include('layouts.footer')
    
    @include('home.partials.login')
    @include('home.partials.signup')
    @include('home.partials.forget-password')

    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/vendor/password_strength/strength.js') }}
    {{ HTML::script('assets/js/live_chat.js') }}
     <script src="http://malsup.github.com/jquery.form.js"></script>

    {{ HTML::script('assets/js/home/custom.js')}}
</body>
</html>