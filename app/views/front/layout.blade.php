<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	<title>Test for job</title> 
	{{ HTML::style('assets/css/bootstrap.min.css') }}
	{{ HTML::style('assets/css/bootstrap-theme.min.css') }}
    {{ HTML::style('assets/front/css/style.css') }}
	
	{{ HTML::style('assets/css/color-font.css') }}
	{{ HTML::style('assets/css/fonts.css') }}
    {{ HTML::style('assets/css/font-awesome.min.css') }}


	{{ HTML::script('assets/front/js/jquery.min.js')}}
	{{ HTML::script('assets/front/js/bootstrap.min.js')}}
	{{ HTML::script('assets/front/js/user.js')}}

	@yield('misc-styles')
	@yield('styles')
	<script type="text/javascript">var baseUrl = BASE_URL = '{{URL::to('/')}}'; </script>
</head>
<body>
	<div class="page-container">
		@include('front.header')
		<div class="main-container">
			@yield('content')
		</div>
	</div>
	@include('front.footer')

	<div class="loader">
		<img class="spinner" src="{{URL::to('assets/images/loader.gif')}}">
	</div>
	
	@yield('misc-scripts')
	@yield('scripts')
</body>
</html>