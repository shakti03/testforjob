@extends('layouts.layout')

@section('container')

<div class="row">
    <div class="col-md-9">
        <div class="row">
    @foreach($testTypes as $key=>$value)
        <div class="col-md-4">
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
                <div class="col-md-4">
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
    <div class="col-md-3">
        <div class="minHeight200" style="overflow: hidden;">
            <table class="table">
                <thead>
                    <tr>
                        <th>TEST HISTORY</th>
                    </tr>
                </thead>
                <tbody class="testOption">
                    @foreach($testHistory as $value)
                        <tr><td><a href="{{URL::to('restart-test',$value->id)}}">{{$value->name.' test '.$value->test_index}}</a></td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('test.partials.tests')
<button data-toggle="modal" data-target="#test-links" class="hide" id="showTests"></button>
@stop

@section('footer_scripts')
    {{ HTML::script('assets/js/test/home.js')}}
@stop