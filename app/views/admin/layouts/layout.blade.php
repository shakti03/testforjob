@extends('admin.layouts.base')

@section('container')
	<div class="page-container">
		<div>&nbsp;</div>
		<div class="container">
		{{ GlobalHelper::flashMessage()}}
		</div>
		<div class="main-container">
			@yield('content')
		</div>
	</div>

	<div class="loader">
		<img class="spinner" src="{{URL::to('assets/images/loader.gif')}}">
	</div>
	
	@yield('misc-scripts')
	@yield('scripts')
@stop