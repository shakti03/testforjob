@extends('layouts.layout')

@section('container')
	<div class="row">
		<div class="col-md-3 col-xs-12 col-sm-12">
			<div class="panel panel-default">
			  <div class="panel-heading">Search</div>
			  <div class="panel-body">
			     <div class="form-group">
			     	<label>Filter by</label>
			     	{{Form::select('filterBy',[''=>'- Select -']+VideoCategory::lists('name','id') , '', ['class'=>'form-control'])}}
			     </div> 
			  </div>
			</div>
		</div>
		<div class="col-md-9 col-xs-12 col-sm-12" id="videos">
			<div class="row">
				<div class="col-md-12">
					<label><strong> TCS </strong></label>
				</div>
			</div>
			<div class="row">
				<ul class="unstyledList">
					{{--*/ $i=1; /*--}}
					@foreach($videos as $video)
						<li class="col-md-2 col-xs-12 col-sm-2">
							<a class="various" href="{{$video->link}}" data-fancybox-type="iframe">
								<img alt="thumbnail" src="{{$video->thumbnail}}" style="width:100%;height:100%">
							</a>
							<span>{{$video->title}}</span>
						</li>
						@if($i++%6 == 0)
							</ul>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-12">
									<label><strong> TCS </strong></label>
								</div>
							</div>
							<div class="row">
								<ul class="unstyledList">
						@endif
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@stop

@section('footer_scripts')
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="assets/fancybox/source/jquery.fancybox.pack.js"></script>
{{ HTML::script('assets/js/videos.js')}}
@stop

@section('styles')
<!-- Add fancyBox -->
<link rel="stylesheet" href="assets/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
@stop