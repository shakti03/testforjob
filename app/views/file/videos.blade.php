@extends('layouts.layout')



@section('container')

	<div class="row">

		<div class="col-md-12 col-xs-12 col-sm-12">

			<ul style="list-style: none;">

				@foreach($videos as $video)

					<li class="col-md-1 col-xs-12 col-sm-2">

						<div style="">

							<a class="various" href="{{$video->link}}" data-fancybox-type="iframe">

								<img alt="thumbnail" src="{{$video->thumbnail}}" style="width:100%;height:100%">

							</a>

							<span>{{$video->title}}</span>

						</div>

					</li>

				@endforeach

			</ul>

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