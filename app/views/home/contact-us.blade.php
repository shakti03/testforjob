@extends('home.layout')
@section('content')

    <!-- @include('layouts.contents') -->
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-5 background-light-blue">
			<h2>Office Details</h2>
		</div>
		<div class="col-md-7 background-light-pink">
			<h2>Feel Free to Ask...</h2>
		</div>
	</div>
        <div class="row">
            <div class="col-md-5">
				<div>&nbsp;</div>
				<div class="col-md-12 card" style="background-color:#FFB963;">
					<h2>Head Office</h2>
					<address>
						<b>Address: </b> 463-G, BRS Nagar, Ludhiana 141012 India <br>
						<b>Telephone: </b> +91-161-4682345 <br>
						<b>Email: </b> tcy@tcyonline.com 
					</address>
				</div>
				<div>&nbsp;</div>
				<div class="col-md-12 card" style="background-color:#D3FF87;">
					<h2>USA Office</h2>
                    <address>
                        <b>Address: </b> 196, Southfield Dr, Vemon hills, IL, 60061, US <br>
                        <b>Email: </b> yogesh@tcyonline.com <br>
                    </address>
				</div>
				<div>&nbsp;</div>
				<div class="col-md-12 card" style="background-color:#C3A8FF;">
					<h2>CUSTOMER SERVICE/ SUPPORT/ <br> SALES RELATED QUERIES</h2>
                    <address>
                        <b>Email: </b> yogesh@tcyonline.com <br>
                        <b>Telephone: </b> 0161-4582334, 4682314, 4682345<br> (Mon-Fri 9am to 5pm) <br>
                    </address>
				</div>
				<div>&nbsp;</div>
				<div class="col-md-12 card" style="background-color:#EAEAEA;">
					<h2>CUSTOMER FRANCHISE DIVISION</h2>
                    <address>
                        <b>Email: </b> associates@tcyonline.com <br>
                        <a href="http://partners.tcyonline.com">http://partners.tcyonline.com</a>
                        <!--<a href="#" class="btn btn-info">Online Enquriy Form</a>-->
                    </address>
				</div>
				<div>&nbsp;</div>
            </div>
            <div class="col-md-7">
			<div>&nbsp;</div>
		@if(Session::has('success'))
		    <div class="alert-box success">
			<p>{{ Session::get('success') }}</p>
		    </div>
		@endif
		    <!--<h1 style="color: #635A5B"> Feel Free to Ask...</h1>-->
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
@stop