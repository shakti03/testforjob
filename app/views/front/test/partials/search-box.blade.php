{{--*/ 
        $data['company']   = [''=>'-Select company-'] + $companies;
        $data['subject']   = [''=>'-Select subject-'] + $subjects;
        $data['test_types'] = [''=>'-Select test type-'] + $test_types;
        $data['question_types'] = [''=>'-Select question type-'] + $question_types;
        $data['difficulty_levels'] = [''=>'-Select difficulty-'] + $difficulty_levels; 
 /*--}}
<div class="panel panel-default">
  	<div class="panel-body">
        {{Form::open(['url'=>'front/search-test','method'=>'post','id'=>'searchForm'])}}
    		<div class="checkbox">
      			<label class="text-primary pull-right"><input id="selectCompany" type="checkbox">Company wise</label>
      		</div>
      		<div class="clearfix"></div>
      		<div class="form-group displayNone" id="company">
             	<label>Select Company</label>
                {{ Form::select('company', $data['company'], '', ['class'=>'form-control'])}}
             </div>
    	    <div class="form-group">
             	<label>Test</label>
             	{{ Form::select('test_type', $data['test_types'], '', ['class'=>'form-control'])}}
            </div>
            <div class="form-group">
            	<label>Test type</label>
            	{{ Form::select('question_type', $data['question_types'], '', ['class'=>'form-control'])}}
            </div> 
            <div class="form-group">
            	<label>Subject</label>
            	{{ Form::select('subject', $data['subject'], '', ['class'=>'form-control'])}}
            </div>
            <div class="form-group">
            	<label>Difficulty level</label>
            	{{ Form::select('difficulty_level', $data['difficulty_levels'], '', ['class'=>'form-control'])}}
            </div>
            <div class="form-group">
            	<button class="btn btn-primary pull-right"><strong>Search<strong>&nbsp;<i class="fa fa-search"></i></button>
            	<div class="clearfix">&nbsp;</div>
            </div>
        {{Form::close()}}    
    </div>
</div>