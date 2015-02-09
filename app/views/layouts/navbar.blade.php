<div class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand menu" href="{{URL::to('/home')}}">Home</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-main-menu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="nav-main-menu">
            <ul class="nav navbar-nav">
		        <li class=""><a class="menu" href="{{URL::to('videos')}}" >Videos</a></li>
                <li class=""><a class="menu" href="javascript:void(0);" id="package"> Test Plans</a></li>
                <li class=""><a class="menu" href="javascript:void(0);" data-toggle="modal" data-target="#uploadExcel"> Upload Excel</a></li>
            </ul>
            <div class="navbar-nav nav navbar-right">
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="dropdown-profile">
                        <img src="{{URL::to('/').'/assets/images/avatar.png'}}" width="30">
                        <span id="nav-email">{{isset($logged_user) ? $logged_user->email : 'User'}}</span> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                            <!-- <li>
                                <a href="{{URL::route('users.selfprofile.edit')}}"><i class="fa fa-user"></i> Your profile</a>
                            </li> -->
                            <!-- <li class="divider"></li> -->
                        <li>
                            <a href="{{URL::action('Jacopo\Authentication\Controllers\AuthController@getLogout')}}"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </div><!-- nav-right -->
		</div>
	</div>
</div>