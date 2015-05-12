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
          <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
            {{Session::get('flash_msg')}} 
                <i class="fa fa-check"></i>
        </div>
    @endif
    @include('layouts.header')
    <!-- @include('layouts.contents') -->
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div>
                    <h4>HEAD OFFICE</h4>
                    <address>
                        <b>Address: </b> 463-G, BRS Nagar, Ludhiana 141012 India <br>
                        <b>Telephone: </b> +91-161-4682345 <br>
                        <b>Email: </b> tcy@tcyonline.com 
                    </address>
                </div>
                <div>
                    <h4>USA</h4>
                    <address>
                        <b>Address: </b> 196, Southfield Dr, Vemon hills, IL, 60061, US <br>
                        <b>Email: </b> yogesh@tcyonline.com <br>
                    </address>
                </div>
                <div>
                    <h4>CUSTOMER SERVICE/ SUPPORT/ <br> SALES RELATED QUERIES</h4>
                    <address>
                        <b>Email: </b> yogesh@tcyonline.com <br>
                        <b>Telephone: </b> 0161-4582334, 4682314, 4682345<br> (Mon-Fri 9am to 5pm) <br>
                    </address>
                </div>
                <div>
                    <h4>CUSTOMER FRANCHISE DIVISION</h4>
                    <address>
                        <b>Email: </b> associates@tcyonline.com <br>
                        <a href="http://partners.tcyonline.com">http://partners.tcyonline.com</a>
                        <!--<a href="#" class="btn btn-info">Online Enquriy Form</a>-->
                    </address>
                </div>
            </div>
            <div class="col-md-7">
                <img src="..."/>
                <div>
		@if(Session::has('success'))
		    <div class="alert-box success">
			<p>{{ Session::get('success') }}</p>
		    </div>
		@endif
		    <h1 style="color: #635A5B"> Feel Free to Ask...</h1>
		    {{Form::open(array('url' => URL::action("enquiry"), 'method' => 'post') )}}
			<div class="form-group">
			    <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				{{Form::text('name', '', ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Enter Name', 'required', 'autocomplete' => 'off'])}}
			    </div>
			</div>
			<div class="form-group">
			    <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-phone"></i></span>
				{{Form::text('mobile', '', ['id' => 'mobile', 'class' => 'form-control', 'placeholder' => 'Mobile', 'required', 'autocomplete' => 'off'])}}
			    </div>
			</div>
			<div class="form-group">
			    <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
				{{Form::email('email', '', ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email address', 'required', 'autocomplete' => 'off'])}}
			    </div>
			</div>
			<div class="form-group">
			    <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-message"></i></span>
				{{Form::textarea('message', '', ['id' => 'message', 'class' => 'form-control', 'placeholder' => 'Message', 'required', 'autocomplete' => 'off'])}}
			    </div>
			</div>
			<input class="btn btn-md btn-danger" id="submit" name="submit" type="submit" value="Send Enquiry"/>
			{{Form::close()}}
			<br>
		</div>
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