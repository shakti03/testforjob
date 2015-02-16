<?php 
	$featuresImgs = [	'assets/images/feature_1.jpg',
						'assets/images/feature_2.jpg',
						'assets/images/feature_3.jpg',
						'assets/images/feature_4.jpg',
						'assets/images/feature_5.jpg',
						'assets/images/feature_6.jpg',
						'assets/images/feature_7.jpg',
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
    <div class="row">&nbsp;</div>
    <div class="row">&nbsp;</div>
    <div class="row">
    	<div class="col-md-9">
    		<h1>Features </h1>
    		<h5>Get fully features TCY Analytics which will help you prepare, compare and share your performance with your friends.</h5>
    	</div>
    	<div class="col-md-3">	
    		<div>&nbsp;</div>
    		<div>&nbsp;</div>
			<a class="btn btn-warning borderNone">Know more</a>
    	</div>
    </div>
    <div class="row">&nbsp;</div>
    <div class="row">
    	<?php 
    		$background = ['#82AADD','#F06553','#6CCBC5','#5DAF64','#E7AC88','#FDD519','#FDD519','#6ECAC4','#50B75E'];
    		$icons = ['fa-pencil','fa-area-chart','fa-bar-chart','fa-send','fa-copy','fa-won','fa-area-chart','fa-bar-chart','fa-send'];
    		$content = "Videos, TopiceWise, Sectional &amp; MockVideos, TopiceWise, Sectional &amp; MockVideos, TopiceWise, Sectional &amp; MockVideos, TopiceWise, Sectional &amp; Mock";
		?>
    	@for($i=0;$i<9;$i++)
    		<div class="col-md-4">
    			<div><i class="fa {{$icons[$i]}} cir" style="background:{{$background[$i]}}"></i></div><br>
                <h4>High Quality Content</h4>
				<span class="hqcontent">{{$content}}</span>
				<div>&nbsp;</div>
				<div>&nbsp;</div>
			</div>
    	@endfor
    </div>
</div>
