<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Test for job</title>    
    <!-- CSS -->
	{{ HTML::style('assets/css/font-awesome.min.css') }}
    {{ HTML::style('assets/css/bootstrap.min.css') }}
	{{ HTML::style('assets/css/bootstrap-theme.min.css') }}
    {{ HTML::style('assets/css/strength.css') }}
	{{ HTML::style('assets/css/responsive.css') }}
	{{ HTML::style('assets/css/style.css') }}
	{{ HTML::style('assets/css/color-font.css') }}

    @yield('styles')

    {{ HTML::script('assets/js/jquery-1.10.2.min.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/vendor/password_strength/strength.js') }}
    {{ HTML::script('assets/js/live_chat.js') }}
     <script src="http://malsup.github.com/jquery.form.js"></script>
	

    <script type="text/javascript">
        BASE_URL = "{{ URL::to('/')}}";
    </script>
    @yield('header_scripts')
</head>
<body>
	@if(Session::has('flash-msg'))
        <div role="alert" class="alert alert-warning alert-dismissible fade in">
          <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
            {{Session::get('flash_msg')}} 
                <i class="fa fa-check"></i>
        </div>
    @endif
	@include('layouts.header')
    @include('layouts.contents')
    @include('layouts.footer')
{{ HTML::script('assets/js/home/custom.js')}}

    @include('home.partials.login')
    @include('home.partials.signup')
    @include('home.partials.forget-password')
</body>
</html>