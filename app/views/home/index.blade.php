<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Test for job</title>    
    <!-- CSS -->
    {{ HTML::style('assets/css/app.min.css') }}
    @yield('styles')

    {{ HTML::script('assets/js/jquery-1.10.2.min.js') }}
    <script type="text/javascript">
        BASE_URL = "{{ URL::to('/')}}";
    </script>
    @yield('header_scripts')
</head>
<body>
	@include('layouts.header')
    @if(Session::has('flash-msg'))
        <div role="alert" class="alert alert-warning alert-dismissible fade in">
          <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
            {{Session::get('flash_msg')}} 
                <i class="fa fa-check"></i>
        </div>
    @endif

    @if(Session::has('success'))
        <div role="alert" class="alert alert-success alert-dismissible fade in">
          <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
            {{Session::get('success')}} 
                <i class="fa fa-check"></i>
        </div>
    @endif
    <!-- @include('layouts.contents') -->
    <div class="container-fluid">
        <div class="row background-darkblue">
            <h2>TestForJob Online Test Prep Features</h2>
        </div>
        <div class="row">
            <div style="margin-left: 2%;" class="news col-md-2">
                <h4>Latest News <span class="badge">6</span></h4>
                <marquee behavior="scroll", direction="up" loop="true" speed="slow">
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                </marquee>
            </div>
            <div class="col-md-7" style="margin-top:1%; margin-bottom:1%;">
                <p class="text-justify">TestForJob is an adaptive learning platform for test preparation that diagnoses each IT candidate (Fresher’s as well as experience) strengths and weaknesses and creates a personalized study plan based on their needs(require IT jobs in IT Organizations). TestForJob is also fully integrated in to the Naviance platform.</p>
                <p class="text-justify">
                    TestForJob is an online test preparation for seeking IT jobs, designed to help students meet their achievement targets, TestForJob web-based test prep  system begins with an initial diagnostic  test to assess each IT candidates  strengths and weaknesses. All IT Fressors(BCA,BE,B.tech,Bsc IT, MCA, MCS, M.tech) can do the online preparation for fressers job for different MNC’s the same all IT experience can do the online preparation for IT experiecne jobs for different MNC’s based on theirs key skills.
                </p>
                <p class="text-justify">
                    Thousands of IT Freshers as well as IT experience in worldwide have used TestForJob and achieved amazing results as get placed in may MNC’s IT Organizations. We are providing all test series based on different technologies as well as company wise test solutions for all IT Fressers as well as IT experience candidates to come and get place in IT organizations to grow their carrier. We believe on our inspirations is the candidates performance. 
                </p>
            </div>
            <div style="margin-left: 2%;" class="col-md-2 news">
                <h4>Latest News <span class="badge">6</span></h4>
                <marquee behavior="scroll" direction="up" loop="true" speed="slow">
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                <p class="text-justify black rm-text-indent">Wipro, TCS are coming to hire new employees</p>
                </marquee>
            </div>
        </div>
            <div class="row background-darkblue">
                <h2>Features</h2>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-2"  style="margin-top:1%; margin-bottom:1%;">
                    <h3>More reasons why you'll love studying with TestForJob Over 500 questions </h3>
                    <p class="text-justify">Our practice questions are carefully written and edited to give you the most accurate practice possible.</p>
                        <div> &nbsp; </div>
                    <h3>Tips and advices from IT expertise from IT Companies </h3>
                    <p class="text-justify">Candidates can watch the different videos as well as text format It interview tips and guidelines by IT employees<br> (IT Fressor,Sr.Software engineers having technology expertisation in different technologies like, JAVA,DOT NET,PHP,<br> ANDROID,IOS,ORACLE,MSQA etc..) from different IT MNC’s .</p>
                        <div> &nbsp; </div>
                    <h3>Simple design</h3>
                    <p class="text-justify">Study online wherever you go. Our clean and simple interface gets out of the way and lets you learn.</p>
                        <div> &nbsp; </div>
                    <h3>Friendly support </h3>
                    <p class="text-justify">Help is always just a click away. If you don’t understand something, our tutors will explain it to you quickly and clearly.</p>
                        <div> &nbsp; </div>
                    <h3>Affordable</h3>
                    <p>You don’t need expensive classes and private tutors. Studying online is easier and we pass the savings on to you.</p>
                        <div> &nbsp; </div>
                    <h3>Connect with OUR IT Experties</h3>
                    <p class="text-justify">All IT fressor as well as experience candidates can connect with our IT Experties whose is currently working in Organasition.</p>
                </div>
            </div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
    </div>
    @include('layouts.footer')
    
    @include('home.partials.login')
    @include('home.partials.signup')
    @include('home.partials.forget-password')

    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/vendor/password_strength/strength.js') }}
    {{ HTML::script('assets/js/live_chat.js') }}
     <script src="http://malsup.github.com/jquery.form.js"></script>

    {{ HTML::script('assets/js/home/custom.js')}}
</body>
</html>