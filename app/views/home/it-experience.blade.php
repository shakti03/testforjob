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
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto">

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
          <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">�</span></button>
            {{Session::get('flash_msg')}} 
                <i class="fa fa-check"></i>
        </div>
    @endif
    @include('layouts.header')
    <!-- @include('layouts.contents') -->
    <div class="container">
	<div class="row">
	    <div class="col-md-8">
		<h3>Our instructors are test prep experts</h3>
		<div class="col-md-6">
		    <img style="float:left;" width="100px" src="assets/images/tony.jpeg" class="img-thumbnail">
		    <p class="text-justify">Using color to add meaning only provides a visual indication, which will not be conveyed to users of assistive technologies ? such as screen readers. Ensure that information denoted by the color is either obvious from the content itsel</p> 
		</div>
		<div class="col-md-6">
		    <img style="float:left;" width="100px" src="assets/images/tony.jpeg" class="img-thumbnail">
		    <p class="text-justify">Using color to add meaning only provides a visual indication, which will not be conveyed to users of assistive technologies ? such as screen readers. Ensure that information denoted by the color is either obvious from the content itsel</p> 
		</div>
		<div class="col-md-6">
		    <img style="float:left;" width="100px" src="assets/images/tony.jpeg" class="img-thumbnail">
		    <p class="text-justify">Using color to add meaning only provides a visual indication, which will not be conveyed to users of assistive technologies ? such as screen readers. Ensure that information denoted by the color is either obvious from the content itsel</p> 
		</div>
		<div class="col-md-6">
		    <img style="float:left;" width="100px" src="assets/images/tony.jpeg" class="img-thumbnail">
		    <p class="text-justify">Using color to add meaning only provides a visual indication, which will not be conveyed to users of assistive technologies ? such as screen readers. Ensure that information denoted by the color is either obvious from the content itsel</p> 
		</div>
		<div class="col-md-6">
		    <img style="float:left;" width="100px" src="assets/images/tony.jpeg" class="img-thumbnail">
		    <p class="text-justify">Using color to add meaning only provides a visual indication, which will not be conveyed to users of assistive technologies ? such as screen readers. Ensure that information denoted by the color is either obvious from the content itsel</p> 
		</div>
		<div class="col-md-6">
		    <img style="float:left;" width="100px" src="assets/images/tony.jpeg" class="img-thumbnail">
		    <p class="text-justify">Using color to add meaning only provides a visual indication, which will not be conveyed to users of assistive technologies ? such as screen readers. Ensure that information denoted by the color is either obvious from the content itsel</p> 
		</div>
	    </div>
	    <div class="col-md-4">
		<h3>Our students love us</h3>
		<p class="text-justify">"It's very rare to come across an excellent product combined with excellent support and that is exactly what I think about Magoosh."</p>
		<h5>Michael Rooz</h5>
		<p class="text-justify">"It's very rare to come across an excellent product combined with excellent support and that is exactly what I think about Magoosh."</p>
		<h5>Michael Rooz</h5>
		<p class="text-justify">"It's very rare to come across an excellent product combined with excellent support and that is exactly what I think about Magoosh."</p>
		<h5>Michael Rooz</h5>
		<p class="text-justify">"It's very rare to come across an excellent product combined with excellent support and that is exactly what I think about Magoosh."</p>
		<h5>Michael Rooz</h5>
	    </div>
	</div>
    </div>
    @include('layouts.footer')
    
    @include('home.partials.login')
    @include('home.partials.signup')
    @include('home.partials.forget-password')

    {{ HTML::script('assets/js/home/custom.js')}}
</body>
</html>