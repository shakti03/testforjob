@extends('admin.layouts.layout')

@section('title')
    Admin area: Videos list
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-1 col-xs-12">
            <span class="custom-heading">Videos</span>
        </div>
        <div class="col-md-2 col-xs-12">
          <div class="form-group">
            {{Form::select('videoType',[''=>'- Select -']+VideoCategory::lists('name','id') , '', ['class'=>'form-control','id'=>'videoType'])}}
          </div>
        </div>
        <div class="col-md-2 col-xs-12">
            <button id="deleteCategory" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete category</button>
        </div>
        <div class="col-md-9 col-xs-12">
            <div class="pull-right">
                <button class="btn btn-success" title="Add" data-toggle="modal" data-target="#uploadVideo"><i class="fa fa-plus"></i> Add </button>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <hr>

    <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-12" id="videos">
        <div class="row">
          <ul class="unstyledList">
            {{--*/ $i=1; /*--}}
            @foreach($videos as $video)
              <li class="col-md-2 col-xs-12 col-sm-2 videoFile" data-filter="{{$video->video_category_id}}">
                <div style="position:absolute;z-index:2;right:16px;">
                  <a title="Edit" data-content="{{json_encode($video)}}" class="btn btn-xs btn-danger"><i class="fa fa-pencil"></i></a>
                  <a title="delete" href="{{URL::to('admin/videos/delete',$video->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                </div>
                <a title="{{$video->title}}" class="various" style="z-index:1" href="{{$video->link}}" data-fancybox-type="iframe">
                  <img class="videoIcon" alt="thumbnail" src="{{$video->thumbnail}}">
                </a>
                <span title="{{$video->title}}" class="text-right">{{ (strlen($video->title) > 24) ? substr($video->title,0,22).'..' : $video->title}}</span>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
</div>
@include('admin.videos.partials.upload-video')

@stop


@section('scripts')
<!-- Add mousewheel plugin (this is optional) -->
{{HTML::script("assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js")}}
{{HTML::script("assets/fancybox/source/jquery.fancybox.pack.js")}}
{{HTML::script("assets/admin/js/videos.js")}}
<script type="text/javascript">
  $(function(){
     $('[data-toggle="popover"]').popover(); 
     $('#deleteCategory').click(function(){
        var videoType = $('#videoType').val();
        if(videoType != undefined && videoType != ''){
          $.get(baseUrl + '/videos/category/delete/'+videoType, function(response){
              window.location.reload();
          });
        }
        else{
          alert('Please select Video type from the list');
        }
     });
   });
</script>
@stop

@section('styles')
<!-- Add fancyBox -->
{{HTML::style("assets/fancybox/source/jquery.fancybox.css?v=2.1.5")}}
@stop