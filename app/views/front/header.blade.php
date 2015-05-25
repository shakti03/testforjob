<div class="header">
	<div class="navbar navbar-default" role="navigation">
	    <div class="container">
	        <div class="navbar-header">
	        	<a class="" href="#">
	    			<img width="150" height="70" class="logo" src="{{URL::asset('assets/images/logo.png')}}">
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
					<li>
						<a href="{{URL::to('user/dashboard')}}">
							<i class="fa fa-dashboard"></i> <span>Dashboard</span> 
						</a>
					</li>
					<li>
						<a href="{{URL::to('user/test/list')}}">
							<i class="fa fa-database"></i> <span>Test</span> 
						</a>
					</li>
					<li>
						<a href="{{URL::to('user/videos')}}">
							<i class="fa fa-desktop"></i> <span>Videos</span> 
						</a>
					</li>
					<li>
						<a href="{{URL::to('user/test-history')}}">
							<i class="fa fa-tasks"></i> <span>Test history</span> 
						</a>
					</li>
					<li>
						<a href="{{URL::to('user/logout')}}">
							<i class="fa fa-sign-out"></i> <span>Logout</span> 
						</a>
					</li>
		        </ul>
	        </div>
		</div>
	</div>
</div>