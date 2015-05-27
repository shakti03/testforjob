<div class="header">
	<div class="navbar navbar-default" role="navigation">
	    <div class="container">
	        <div class="navbar-header">
	        	<a class="" href="login">
	    			<img class="logo" src="assets/images/logo.png">
	    		</a>
	        	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-main-menu">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            </button>
	        </div>
	        <div class="collapse navbar-collapse pull-right" id="nav-main-menu">
	            <ul class="nav navbar-nav">
					<li><a href="login">Home</a></li>
					<li><a href="#">Test Plan</a></li>
					<li><a href="it-fresher">IT Fresher</a></li>
					<li><a href="it-experience">IT Experience</a></li>
					<li><a href="contact-us">Contact us</a></li>
	            </ul>
	            <div class="navbar-nav nav navbar-right">
	            	<div>
			            <a href="javascript:void(0);" data-toggle="modal" data-target="#login" class="btn borderNone btn-default" id="btnlogin">&nbsp;&nbsp;Login&nbsp;&nbsp;</a>
			            <a href="javascript:void(0);" data-toggle="modal" data-target="#signup" class="btn borderNone btn-warning" style="margin-left: -5px;" id="btnSignup">&nbsp;&nbsp;SignUp&nbsp;&nbsp;</a>
			    	</div>
			    </div>
			</div>
		</div>
	</div>
</div>
<div class="header-bg-row">
	&nbsp;
</div>
<div class="below-header-bg-row row">
	<div class="col-md-3 col-md-push-1"><h2>Number of Questions</h2> <h3>15000</h3></div>
	<div class="col-md-3 col-md-push-1"><h2>User visited</h2> <h3>15000</h3></div>
	<div class="col-md-3 col-md-push-1"><h2>Number of Questions</h2> <h3>15000</h3></div>
</div>
<div class="carousel slide hidden-xs" id="myCarousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li class="" data-slide-to="0" data-target="#carousel-example-generic"></li>
        <li data-slide-to="1" data-target="#carousel-example-generic" class="active"></li>
        <li data-slide-to="2" data-target="#carousel-example-generic" class=""></li>
        <li data-slide-to="3" data-target="#carousel-example-generic" class=""></li>
        <li data-slide-to="4" data-target="#carousel-example-generic" class=""></li>
  	</ol>
    
    <!-- Wrapper for Slides -->
    <div class="carousel-inner">
	<img style="background-repeat: repeat-y; position:absolute; left:0px; top:0px; z-index:0;" width=100% src="{{URL::to('assets/images/bg_green.png')}}">
    	<?php $sliderImages = [	'assets/images/slider images 1.png',
				'assets/images/slider images 2.png',
				'assets/images/slider images 3.png',
				'assets/images/slider images 4.png',
				'assets/images/slider images 5.png',
				'assets/images/slider images 6.png'
			      ];
	  	?>
	  	<div class="item active">
          	<img width="100%" src="{{URL::to($sliderImages[0])}}">
        </div>
	  	@for($i=1;$i<count($sliderImages);$i++)
        <div class="item">
          	<img width="100%" src="{{URL::to($sliderImages[$i])}}">
        </div>
        @endfor
  	</div>
    
    <!-- Controls -->
    <a data-slide="prev" href="#myCarousel" class="left carousel-control">
        <span class="icon-prev"></span>
    </a>
    <a data-slide="next" href="#myCarousel" class="right carousel-control">
        <span class="icon-next"></span>
    </a>

</div>
<?php 
	$featuresImgs = [	'assets/images/Management.png',
						'assets/images/Study ABD.png',
						'assets/images/jobs.png',
						'assets/images/arts sci law.png',
						'assets/images/Language Skill.png',
						'assets/images/Sci & techno.png',
						'assets/images/school pro.png',
						'assets/images/feature_8.jpg'
					];
?>
<div class="container">
	<div class="row">&nbsp;</div>
	<div class="row">&nbsp;</div>
	<h1 class="text-center">100+ Exam Categories</h1>
	<h5 class="text-center">Crack your exam with India's no 1 testing platform.</h5>
	<div class="row">&nbsp;</div>
	<div class="row">&nbsp;</div>
	<div class="row">&nbsp;</div>
	<div class="row">
		@foreach($featuresImgs as $img)
		<div class="col-md-3">
			<center><img src="{{URL::to($img)}}" class="img-responsive"></center>
			<div>&nbsp;</div>
			<div>&nbsp;</div>
    	</div>
    	@endforeach
    </div>
</div>