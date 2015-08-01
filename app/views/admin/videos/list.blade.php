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
            {{Form::select('videoType',[''=>'- Select -']+VideoCategory::lists('name','id') , '', ['class'=>'form-control','id'=>'videoType','autocomplete'=>'off'])}}
          </div>
        </div>
        <div class="col-md-2 col-xs-12">
            <button id="deleteCategory" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete category</button>
        </div>
        <div class="col-md-1 col-xs-12">
          <span class="custom-heading">Plan</span>
        </div>
        <div class="col-md-2 col-xs-12">
          <div class="form-group">
            {{Form::select('testPlans',[''=>'- Select -']+$testPlans , '', ['class'=>'form-control','id'=>'testPlans','autocomplete'=>'off'])}}
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
            <div class="pull-right">
                <button id="addPlan" class="btn btn-info" title="Add" data-toggle="modal" data-target="#addPlanModal"><i class="fa fa-money"></i> Link Plan</button>
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
              <li class="col-md-2 col-xs-12 col-sm-2 videoFile" data-filter="{{$video->video_category_id}}" data-plan="{{$video->test_plan_ids}}">
                <div class="pull-right">
                  <input type="checkbox" class="selectVideo" name="testvideo[]" value="{{$video->id}}" autocomplete="off">
                  <a title="Edit" data-content="{{json_encode($video)}}" class="btn btn-xs btn-danger"><i class="fa fa-pencil"></i></a>
                  <a title="delete" href="{{URL::to('admin/videos/delete',$video->id)}}" class="btn btn-xs btn-danger delete"><i class="fa fa-trash"></i></a>
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
@include('admin.videos.partials.add-plan')

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
          $('.loader').show();
          $.get(baseUrl + '/videos/category/delete/'+videoType, function(response){
              window.location.reload();
          });
        }
        else{
          alert('Please select Video type from the list');
        }
     });

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

     $('.delete').click(function(){
      $('.loader').show();
     });

      $('#addPlan').click(function(){
        if($('.selectVideo:checked').length == 0) {
          alert('Please select test first');
          return false;
        }
        var data = [];
        $('.selectVideo:checked').each(function(){
            data.push($(this).val());
        });

        $('#addPlanModal #videoids').val(data.join(','));
      });

      $('#testPlans').change(function(){
        var selectedPlan = ''+$(this).val();
        if(selectedPlan) {
          $('.videoFile').hide();
          $('.videoFile').filter(function(){
            var planIds = "" +$(this).data('plan');
            var plans=[];

            plans = planIds.split(',');
            return $.inArray(""+selectedPlan, plans) != -1;//=== ''+$(this).data('filter');
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