<div class="header">
	<div class="navbar navbar-default" role="navigation">
	    <div class="container">
	        <div class="navbar-header">
	        	<a class="" href="#">
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
			        <li><a href="#">IT Fresher</a></li>
					<li><a href="#">IT Experience</a></li>
					<li><a href="#">IT Technologies</a></li>
					<li><a href="#">Test series</a></li>
					<li><a href="#">About us</a></li>
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
    	<?php $sliderImages = [	'assets/images/a1.jpg',
    							'assets/images/a2.jpg',
    							'assets/images/a3.jpg',
    							'assets/images/a4.jpg',
    							'assets/images/a5.jpg'
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
	