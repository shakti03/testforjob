<html>
    <head>
        <title> Test For Job </title>
        <!-- css -->
        {{ HTML::style('assets/css/bootstrap.min.css') }}
        {{ HTML::style('assets/css/bootstrap-theme.min.css') }}
        {{ HTML::style('assets/css/strength.css') }}
        {{ HTML::style('assets/css/style.css') }}
        {{ HTML::style('assets/css/color-font.css') }}
        {{ HTML::style('assets/css/cindex.css')}}
        
        <!-- js -->
        {{ HTML::script('assets/js/jquery-1.10.2.min.js') }}
        {{ HTML::script('assets/js/vendor/password_strength/strength.js') }}
        {{ HTML::script('assets/js/bootstrap.min.js') }}
        {{ HTML::script('assets/js/live_chat.js') }}
        {{ HTML::script('assets/js/home/custom.js')}}

        <script type="text/javascript">
            base_url = "{{ URL::to('/')}}";
        </script> 
        

    </head>
    <body>
        @if(Session::has('reminder-success'))
            afafafaaaaaaaaaa
        @endif
        <div class="row header" style="z-index:2;">
            <div class="col-md-2">
                <img style="height: 50px;" src="{{URL::to('/')}}/assets/images/1.jpg"/>
            </div>
            <div class="col-md-3">&nbsp;
            </div>
            <div class="col-md-5">
                <ul>
                    <li>What is SmarT?</li>
                    <li>FAQ</li>
                    <li>User Stories</li>
                    <li>Plans</li>
                    <li>Schools</li>
                </ul>
            </div>
            <div class="col-md-2">
                <a id="btnlogin" class="btn btn-default" data-target="#login" data-toggle="modal"  href="javascript:void(0);">Login</a>

                <a id="btnSignup" style="margin-left: -5px;" class="btn borderNone btn-warning" data-target="#signup" data-toggle="modal"  href="javascript:void(0);">SignUp</a>
            </div>
        </div>
        
        <!-- Slider -->
        <div class="row slider">
            <div class="col-md-12">
                <img class="bg-img" src="{{URL::to('/')}}/assets/images/temp_feature1.png"/>
            </div>
            <div class="col-md-12">
                <div class="fg-img"></div>
            </div>
            
        </div>
        
        <!-- Features Info -->
        <div class="feature">
            <div class="container">
                <div class="col-md-12">
                    <h1 class="text-center">100+ Exam Categories</h1>
                </div>
                <div class="col-md-12">
                    <h5 class="text-center">Crack your exam with India's no 1 testing platform.</h5>
                </div>
                <div class="col-md-12">
                    <div class="col-md-3">
                        <img class="img-responsive" src="{{URL::to('/')}}/assets/images/feature_1.jpg"/>
                    </div>
                    <div class="col-md-3">
                        <img class="img-responsive" src="{{URL::to('/')}}/assets/images/feature_2.jpg"/>
                    </div>
                    <div class="col-md-3">
                        <img class="img-responsive" src="{{URL::to('/')}}/assets/images/feature_3.jpg"/>
                    </div>
                    <div class="col-md-3">
                        <img class="img-responsive" src="{{URL::to('/')}}/assets/images/feature_4.jpg"/>
                    </div>
                    <div class="col-md-3">
                        <img class="img-responsive" src="{{URL::to('/')}}/assets/images/feature_5.jpg"/>
                    </div>
                    <div class="col-md-3">
                        <img class="img-responsive" src="{{URL::to('/')}}/assets/images/feature_6.jpg"/>
                    </div>
                    <div class="col-md-3">
                        <img class="img-responsive" src="{{URL::to('/')}}/assets/images/feature_7.jpg"/>
                    </div>
                    <div class="col-md-3">
                        <img class="img-responsive" src="{{URL::to('/')}}/assets/images/feature_8.jpg"/>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Second Features Info -->
        <div class="feature">
            <div class="container">
                <div class="col-md-12">
                    <h1 class="col-md-9">Features</h1>
                    <a class="col-md-3"><img style="margin-top: 15%;" src="{{URL::to('/')}}/assets/images/know_more.jpg"/></a>
                </div>
                <div class="col-md-12">
                    <h5>Get fully features TCY Analytics which will help you prepare, compare and share your performance with your friends.</h5>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4">
                        <img width="50px" height="50px" class="img-circle" src="{{URL::to('/')}}/assets/images/icon_feature_1.jpg"/>
                        <h4>High Quality Content</h4>
                        <p class="lead">Videos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & Mock</p>
                    </div>
                    <div class="col-md-4">
                        <img width="50px" height="50px" class="img-circle" src="{{URL::to('/')}}/assets/images/icon_feature_2.jpg"/>
                        <h4>High Quality Content</h4>
                        <p class="lead">Videos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & Mock</p>
                    </div>
                    <div class="col-md-4">
                        <img width="50px" height="50px" class="img-circle" src="{{URL::to('/')}}/assets/images/icon_feature_3.jpg"/>
                        <h4>High Quality Content</h4>
                        <p class="lead">Videos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & Mock</p>
                    </div>
                    <div class="col-md-4">
                        <img width="50px" height="50px" class="img-circle" src="{{URL::to('/')}}/assets/images/icon_feature_4.jpg"/>
                        <h4>High Quality Content</h4>
                        <p class="lead">Videos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & Mock</p>
                    </div>
                    <div class="col-md-4">
                        <img width="50px" height="50px" class="img-circle" src="{{URL::to('/')}}/assets/images/icon_feature_5.jpg"/>
                        <h4>High Quality Content</h4>
                        <p class="lead">Videos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & Mock</p>
                    </div>
                    <div class="col-md-4">
                        <img width="50px" height="50px" class="img-circle" src="{{URL::to('/')}}/assets/images/icon_feature_6.jpg"/>
                        <h4>High Quality Content</h4>
                        <p class="lead">Videos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & Mock</p>
                    </div>
                    <div class="col-md-4">
                        <img width="50px" height="50px" class="img-circle" src="{{URL::to('/')}}/assets/images/icon_feature_7.jpg"/>
                        <h4>High Quality Content</h4>
                        <p class="lead">Videos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & Mock</p>
                    </div>
                    <div class="col-md-4">
                        <img width="50px" height="50px" class="img-circle" src="{{URL::to('/')}}/assets/images/icon_feature_8.jpg"/>
                        <h4>High Quality Content</h4>
                        <p class="lead">Videos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & Mock</p>
                    </div>
                    <div class="col-md-4">
                        <img width="50px" height="50px" class="img-circle" src="{{URL::to('/')}}/assets/images/icon_feature_9.jpg"/>
                        <h4>High Quality Content</h4>
                        <p class="lead">Videos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & MockVideos, TopiceWise, Sectional & Mock</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!--  -->
        <div class="snd-feature">
            <div class="container">
                <div class="col-md-2">
                    <ul>
                        <li><h5>TCY ONINE</h5></li>
                        <li>About Us</li>
                        <li>Classroom Training</li>
                        <li>Franchise</li>
                        <li>Partnerships</li>
                        <li>CEO Blogs</li>
                        <li>Teacher Assistant(SAS)</li>
                    </ul>
                </div>                
                <div class="col-md-2">                    
                    <ul>
                        <li><h5>STUDENT RESOURCES</h5></li>
                        <li>Exam Alerts</li>
                        <li>GK Today</li>
                        <li>Discussions</li>
                        <li>Groups</li>
                        <li>Premium Courses</li>
                        <li>TCY App Zone</li>
                        <li>Blogs</li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul>
                        <li><h5>TEACHER RESOURCES</h5></li>
                        <li>Upload & Exam</li>
                        <li>Upload Tests</li>
                        <li>Peers</li>
                        <li>Upload Videos</li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul>
                        <li><h5>POPULAR COURSES</h5></li>
                        <li>MBA</li>
                        <li>GRE</li>
                        <li>Bank PO</li>
                        <li>IIT JEE</li>
                        <li>MCA</li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul>
                        <li><h5>MISC</h5></li>
                        <li>Work with Us</li>
                        <li>Contact Us</li>
                        <li>Advertise with Us</li>
                        <li>Category CLoud</li>
                        <li>Feedback</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <div class="container">
                <div class="col-md-5">
                    <div>
                        <ul>
                            <li>Site Map</li>
                            <li>Term & Conditions</li>
                            <li>Privacy Policy</li>
                            <li>Disclaimer</li>
                        </ul>
                    </div>
                    <div>@2015 TCY Learning(P) LTD. All Rights Reserved.</div>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li><a><img src="{{URL::to('/')}}/assets/images/icon_fb.jpg"/></a></li>
                        <li><a><img src="{{URL::to('/')}}/assets/images/icon_twitter.jpg"/></a></li>
                        <li><a><img src="{{URL::to('/')}}/assets/images/icon_google_plus.jpg"/></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul>
                        <li><a><img width="80px;" src="{{URL::to('/')}}/assets/images/icon_android.jpg"/></a></li>
                        <li><a><img width="100px;" src="{{URL::to('/')}}/assets/images/icon_flipkart.jpg"/></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2"><a class="live-chat-btn" href="#"><img width="40px;" src="{{URL::to('/')}}/assets/images/icon_chat.png"/>Live chat</a></div>                
            </div>
            <div class="row">
                <div class="col-md-3 col-md-offset-9 ">                    
                    <div class="live-chat-window" id='chat_div'></div>
                </div>
                <div class="col-md-3 col-md-offset-9 live-chat">
                    <div>Live Chat<a><img class="img-circle float close-initial-chat" width="25px;" src="{{URL::to('/')}}/assets/images/icon_close.png"/></a></div>
                    <input class="form-control" name="chat_uname" id="chat_uname" type="text" placeholder="Name"/><br>
                    <!--<input name="chat_uname" id="chat_uname" type="text"/>-->
                    <input class="btn btn-info" name="chat_submit" id="chat_submit" type="button" value="Start Chat"/>
                </div>
            </div>
        </div>
        @include('home.partials.login')
        @include('home.partials.signup')
        @include('home.partials.forget-password')
    </body>
</html>