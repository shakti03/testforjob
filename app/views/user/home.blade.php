@extends('layouts.layout')

@section('container')
<?php 
    $subjects = [
                    ['name'=>'C','percent'=>'30%'],
                    ['name'=>'C++','percent'=>'30%'],
                    ['name'=>'PHP','percent'=>'30%'],
                    ['name'=>'PYTHON','percent'=>'30%'],
                    ['name'=>'RUBY','percent'=>'30%'],
                    ['name'=>'DBMS','percent'=>'30%'],
                    ['name'=>'RUBY','percent'=>'30%'],
                    ['name'=>'DBMS','percent'=>'30%'],
                    ['name'=>'RUBY','percent'=>'30%'],
                    ['name'=>'DBMS','percent'=>'30%'],
                    ['name'=>'C','percent'=>'30%'],
                    ['name'=>'C++','percent'=>'30%'],
                    ['name'=>'PHP','percent'=>'30%'],
                    ['name'=>'PYTHON','percent'=>'30%'],
                    ['name'=>'RUBY','percent'=>'30%'],
                    ['name'=>'DBMS','percent'=>'30%'],
                    ['name'=>'RUBY','percent'=>'30%'],
                    ['name'=>'DBMS','percent'=>'30%'],
                    ['name'=>'RUBY','percent'=>'30%'],
                    ['name'=>'DBMS','percent'=>'30%']
                ];
                //echo '<pre>'; print_r($subjects); exit;
?>
<div class="row">
    <div class="col-md-4" style="overflow:scroll;">
        <div class="row subjecttable-title thumbnail"> 
            <div class="col-md-12">
                USER PERFORMANCE IN DIFFERENT SUBJECT
            </div>
        </div>
        @foreach($subjects as $subject)
            <div class="subjecttable-row thumbnail row">
                <div class="col-md-8">{{$subject['name']}}</div>
                <div class="col-md-4">{{$subject['percent']}}</div>
            </div>
        @endforeach
    </div>
    <div class="col-md-8">
        <div class="groupDiv" style="background-color: #aaccaa;min-height:300px;">
            <div class="bar" style="height: 133.34px;">
                <label>66.67%</label>
                <img src="http://testforjob.tailorsthought.com/public/images/bar3.png" style="height:70%">
                <img src="http://testforjob.tailorsthought.com/public/images/bar4.png" style="height:30%">
                <div class="bar-label">
                    <label>Android</label>
                </div>
            </div>
            <div class="legend">
                <img src="http://testforjob.tailorsthought.com/public/images/bar3.png"> <label> Accuracy </label><br>
                <img src="http://testforjob.tailorsthought.com/public/images/bar4.png"> <label> Speed </label><br>
            </div>
        </div>
    </div>
</div>
@stop