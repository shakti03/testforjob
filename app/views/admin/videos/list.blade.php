@extends('admin.layouts.base-2cols')

@section('title')
    Admin area: Question list
@stop

@section('sidebar')
    @include('admin.videos.partials.side-bar')
@stop

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <h3><i class="fa fa-dashboard"></i> Videos</h3>
      <hr/>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {{-- print messages --}}
        <?php $message = Session::get('message'); ?>
        @if( isset($message) )
            <div class="alert alert-success">{{$message}}</div>
        @endif
        {{-- print errors --}}
        @if($errors && ! $errors->isEmpty() )
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif
        
       
    </div>
</div>
@include('admin.partials.upload-video')
@stop

@section('head_css')
    >
@stop