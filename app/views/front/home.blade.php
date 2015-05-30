@extends('front.layout')
@section('content')
<div class="container">
	<h4> SEARCH TEST</h4>
	<div class="row">
		<div class="col-md-3">
			<div class="panel panel-default">
			  	<div class="panel-body">
		  			<div class="checkbox">
			  			<label class="text-primary pull-right"><input id="selectCompany" type="checkbox">Company wise</label>
			  		</div>
			  		<div class="clearfix"></div>
			  		<div class="form-group displayNone" id="company">
                    	<label>Select Company</label>
                    	<select class="form-control">
                    		<option>- Select Company -</option>
                    		<option> Wipro </option>
                    		<option> TCS </option>
                    		<option> Infosys </option>
                    	</select>
                    </div>
				    <div class="form-group">
                    	<label>Test</label>
                    	<select class="form-control">
                    		<option>- Select test -</option>
                    		<option> Aptitude </option>
                    		<option> Technical </option>
                    	</select>
                    </div>
                    <div class="form-group">
                    	<label>Test type</label>
                    	<select class="form-control">
                    		<option>- Select type -</option>
                    		<option> Objective </option>
                    		<option> Subjective </option>
                    	</select>
                    </div> 
                    <div class="form-group">
                    	<label>Subject</label>
                    	<select class="form-control">
                    		<option>- Select test -</option>
                    		<option> C++ </option>
                    		<option> JAVA </option>
                    	</select>
                    </div>
                    <div class="form-group">
                    	<label>Difficulty level</label>
                    	<select class="form-control">
                    		<option>- Select test -</option>
                    		<option> Beginner </option>
                    		<option> Expert </option>
                    	</select>
                    </div>
                	<div class="form-group">
                		<button class="btn btn-primary pull-right"><strong>Search<strong>&nbsp;<i class="fa fa-search"></i></button>
            			<div class="clearfix">&nbsp;</div>
        			</div>
			  	</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="panel panel-default">
			  	<div class="panel-body">
			  		<table class="table">
			  			<thead>
			  				<tr>
			  					<th>Test</th>
			  					<th>Difficulty level</th>
			  					<th>No. of question</th>
			  					<th>Timing</th>
			  					<th>Action</th>
			  				</tr>
			  			</thead>
			  			<tbody>
			  				<tr>
			  					<td>CPP test 1</td>
			  					<td>Beginner</td>
			  					<td>20</td>
			  					<td>20 minutes</td>
			  					<td><button class="btn btn-danger">Start</button></td>
			  				</tr>
			  				<tr>
			  					<td>CPP test 1</td>
			  					<td>Beginner</td>
			  					<td>20</td>
			  					<td>20 minutes</td>
			  					<td><button class="btn btn-danger">Start</button></td>
			  				</tr>
			  				<tr>
			  					<td>CPP test 1</td>
			  					<td>Beginner</td>
			  					<td>20</td>
			  					<td>20 minutes</td>
			  					<td><button class="btn btn-danger">Start</button></td>
			  				</tr>
			  				<tr>
			  					<td>CPP test 1</td>
			  					<td>Beginner</td>
			  					<td>20</td>
			  					<td>20 minutes</td>
			  					<td><button class="btn btn-danger">Start</button></td>
			  				</tr>
			  				<tr>
			  					<td>CPP test 1</td>
			  					<td>Beginner</td>
			  					<td>20</td>
			  					<td>20 minutes</td>
			  					<td><button class="btn btn-danger">Start</button></td>
			  				</tr>
			  				<tr>
			  					<td>CPP test 1</td>
			  					<td>Beginner</td>
			  					<td>20</td>
			  					<td>20 minutes</td>
			  					<td><button class="btn btn-danger">Start</button></td>
			  				</tr>
			  			</tbody>
			  		</table>
			  	</div>
		  	</div>
	  	</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#selectCompany').change(function(){
			if( $('#selectCompany:checked').length)
				$('#company').show();
			else
				$('#company').hide();
		});
	});
</script>
@stop	