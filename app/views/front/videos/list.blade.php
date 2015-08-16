@extends('front.layout')
@section('content')
<div class="container">
	<div>&nbsp;	</div>
	<div class="row">
		<div class="col-md-3 col-xs-12 col-sm-12">
		  	<div class="form-group">
		     	<label>Filter by</label>
		     	{{Form::select('videoType',[''=>'- Select -']+VideoCategory::lists('name','id') , '', ['class'=>'form-control','id'=>'videoType'])}}
		    </div>
		</div>
	</div>
	<div class="container">
		@if(!empty($videos))
		<div class="row">
			<div class="col-md-12 col-xs-12 col-sm-12" id="videos">
				<ul class="unstyledList">
					{{--*/ $i=1; /*--}}
					@foreach($videos as $video)
						<li class="col-md-2 col-xs-12 col-sm-2 videoFile" data-filter="{{$video->video_category_id}}">
							<a class="various" href="{{$video->link}}" data-fancybox-type="iframe">
								<img class="videoIcon" alt="thumbnail" src="{{$video->thumbnail}}">
							</a>
							<span title="{{$video->title}}" class="text-right">{{ (strlen($video->title) > 24) ? substr($video->title,0,22).'..' : $video->title}}</span>
						</li>
					@endforeach
				</ul>
			</div>	
		</div>
		@else
		<p> No video available. Pleaes purchase a payment plan. </p>
		@endif
	</div>
</div>
@stop

@section('scripts')
<!-- Add mousewheel plugin (this is optional) -->
{{HTML::script("assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js")}}
{{HTML::script("assets/fancybox/source/jquery.fancybox.pack.js")}}
{{HTML::script("assets/front/js/videos.js")}}
<script type="text/javascript">
	$(function(){
		$('#videoType').change(function(){
			var rex = ''+$(this).val();
	        if(rex) {
	          $('.videoFile').hide();
	          $('.videoFile').filter(function(){
	            return rex === ''+$(this).data('filter');
	          }).show();
	        }
	        else{
	          $('.videoFile').show();
	        }
		});
	});
</script>
@stop

@section('styles')
<!-- Add fancyBox -->
{{HTML::style("assets/fancybox/source/jquery.fancybox.css?v=2.1.5")}}
@stop