@extends('admin.layouts.base-1cols')

@section('title')
    Admin area: Question list
@stop

@section('content')

<div class="row">&nbsp;</div>
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
        
        
        {{ Datatable::table()
        ->addColumn('question','option_a','option_b','option_c','option_d')
        ->setUrl(route('api.questions'))
        ->render() }}
       
    </div>
</div>
@stop

@section('head_css')
    <link rel="stylesheet" type="text/css" href="assets/css/jquery-dataTables.css">
  
      
    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.js"></script>
@stop