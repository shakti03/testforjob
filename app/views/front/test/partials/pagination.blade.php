<ul class="pagination pagination-lg" style="margin:0px;">
	<li class="{{ ($pag==1)?'disabled':''}}">
		@if($pag!=1)
		<a href="{{ ($pag==1)?'javascript:void(0);':URL::to('user/get-question',1)}}"> First </a>
		@else
		<span>First</span>
		@endif
	</li>

	<li class="{{ ($pag==1)?'disabled':''}}">
		@if($pag!=1)
		<a href="{{ ($pag==1)?'javascript:void(0);':URL::to('user/get-question',$pag-1)}}"> Previous </a>
		@else
		<span>Previous</span>
		@endif
		
	</li>

	<li class="{{ ($pag==$las)?'disabled':''}}">
		@if($pag!=$las)
		<a href="{{ ($pag == $las)?'javascript:void(0);':URL::to('user/get-question',$page+1)}}"> Next </a>
		@else
		<span> Next </span> 
		@endif
	</li>

	<li class="{{ ($pag==$las)?'disabled':''}}">
		@if($pag!=$las)
		<a href="{{ ($pag==$las)?'javascript:void(0);':URL::to('user/get-question',$last)}}"> Last </a>
		@else
		<span> Last </span> 
		@endif
	</li>
	@if(URL::to('user/test/list') != URL::previous() )
	<li class="active">
		<a href="{{URL::previous()}}"><b> Current </b></a>
	</li>
	@endif
</ul>