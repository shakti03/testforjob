<ul class="pagination pull-right" style="margin-top:-20px;padding:0px;">
	<li class="{{ ($pag==1)?'disabled':''}}">
		<a href="{{ ($pag==1)?'javascript:void(0);':URL::to('get-question',1)}}"> First </a>
	</li>
	<li class="{{ ($pag==1)?'disabled':''}}">
		<a href="{{ ($pag==1)?'javascript:void(0);':URL::to('get-question',$pag-1)}}"> Previous </a>
	</li>
	<li class="{{ ($pag==$las)?'disabled':''}}">
		<a href="{{ ($pag == $las)?'javascript:void(0);':URL::to('get-question',$page+1)}}"> Next </a>
	</li>
	<li class="{{ ($pag==$las)?'disabled':''}}">
		<a href="{{ ($pag==$las)?'javascript:void(0);':URL::to('get-question',$last)}}"> Last </a>
	</li>
</ul>