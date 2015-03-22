@extends('layouts.layout')

@section('container')
<div class="row">
    <div class="col-md-6">
        <div class="row">
        @foreach($testTypes as $key=>$value)
            <div class="col-md-6">
                <div class="thumbnail bgDarkSlateGray padding10">
                    <h4 class="text-white font18"> {{ ucfirst($value)}} Test</h4> 
                    {{ Form::select("select$key", [''=>'Select question type', 'objective'=>'Objective','subjective'=>'Subjective'], null,['class'=>'form-control borderNone testType','data-id'=>$key])}} 
                </div>
            </div>
        @endforeach
        </div>

        <div class="row">
            <div class="col-md-12">
            @foreach($testOptions as $option)
                <div class="col-md-6">
                    <div class="minHeight200" style="overflow: hidden;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{strtoupper($option)}}</th>
                                </tr>
                            </thead>
                            <tbody data-id="{{$option}}" class="testOption">
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>

    <div class="col-md-4 col-md-push-2">
        <table class="table"style="padding-bottom:0px;">
            <thead>
                <tr>
                    <th colspan="3">TEST HISTORY</th>
                </tr>
            </thead>
            <tbody class="testOption">
                {{--*/ $sr = ($testHistory->getCurrentPage()-1) * $testHistory->getPerPage() + 1;/*--}}
                @foreach($testHistory as $value)
                    <tr>
                        <td style="width:8px;">{{$sr++}}.</td>
                        <td class=""><label class="text-left">{{$value->name.' test '.$value->test_index}}</label><a  class="pull-right" href="{{URL::to('restart-test',$value->id)}}"><i class="fa fa-search"></i></a></td> 
                    </tr>
                @endforeach
            </tbody>
            <tbody><tr style="padding:0px;"><td colspan=3 style="padding:0px;"><div class="pull-right" style="padding:0px;">{{$testHistory->links('pagination::slider-3')}}</div></td></tr></tbody>    
        </table>
    </div>
</div>

@include('test.partials.tests')
<button data-toggle="modal" data-target="#test-links" class="hide" id="showTests"></button>
@stop

@section('footer_scripts')
    {{ HTML::script('assets/js/test/home.js')}}
@stop