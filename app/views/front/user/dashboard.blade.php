@extends('front.layout')
@section('content')
<style type="text/css">
	.table tr th, .table tr td{
		width:50%;
	}
	.profile-image{
		width:100px;
		height:100px;
	}
	.profile-image  img{
		width:100%;
		height:100%;
	}
	.tag {
	  background: green none repeat scroll 0 0;
	  color: #fff;
	  margin: 5px;
	  min-width: 40px;
	  padding: 2px 10px;
	  border-radius: 9px;
	}
	.details {
	  background: #dddddd none repeat scroll 0 0;
	  padding: 10px;
	}
</style>
<div class="container">
	<div>&nbsp;</div>
	<h3>DASHBOARD</h3>
	<div class="row">
		<div class="col-md-7">
			<div class="panel panel-default testPanel">
			  	<div class="panel-body">

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="row">
						    <div class="col-md-4">
						        <div class="profile-image">
						            <img src="http://localhost:8081/assets/images/avatar.png">
						        </div>
						    </div>
						    <div class="col-md-7">
						    	<p>{{ $user->first_name ." ".$user->last_name}}</p>
						    	<p>{{ $user->tag_line }}</p>
						    	@if(isset($user->current_company))
						    	<p>{{ $user->current_company->name. " (".$user->current_company->experience." year experience)"}}</p>
						    	@endif
						    </div>
						    <div class="col-md-1">
						    	<button class="btn btn-xs btn-primary pull-right">Edit profile <i class="fa fa-pencil"></i></button>
						    </div>
						</div>
                        <div class="row">
                        	<div class="col-md-12">
                        		<h3>Technical skills</h3>
                        		<div class="details">
                        			@foreach($user->technical_skills as $skill)
	                        		<a href="javascript:;"><span class="tag"> {{ $skill }} </span></a>
	                        		@endforeach
                        		</div>
                        	</div>
                        </div>
                        <div class="row">
                        	<div class="col-md-12">
                        		<h3>Education</h3>
                        		<table class="table table-bordered table-striped">
									<tbody>
										<tr>
											<th>Year</th>
											<th>Degree/Course</th>
											<th>Percent/Grade</th>
										</tr>
										@foreach($user->educations as $education)
										<tr>
											<th>{{ $education['year'] }}</th>
											<td>{{ $education['degree'] }}</td>
											<td>{{ $education['grade'] }}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
                        	</div>
                    	</div>
                    	<div class="row">
                        	<div class="col-md-12">
                        		<h3>Personal detail</h3>
                        		<table class="table table-bordered table-striped">
									<tbody>
										<tr>
											<th></th>
											<td></td>
										</tr>
										<tr>
											<th></td>
											<td></td>
										</tr>
										<tr>
											<th></th>
											<td></td>
										</tr>
										<tr>
											<th></th>
											<td></td>
										</tr> 
									</tbody>
								</table>	
                    		</div>
                    	</div>	                        
                    </div>
                </div>
            
			  	</div>
		  	</div>
		</div>
		<div class="col-md-5">
			<table class="table table-bordered table-striped">
				<tbody>
					<tr>
						<th>Total test attempted</th>
						<td>{{$objective + $subjective}}</td>
					</tr>
					<tr>
						<th>Objective test</td>
						<td>{{$objective}}</td>
					</tr>
					<tr>
						<th>Subjective test</th>
						<td>{{$subjective}}</td>
					</tr>
					<!-- <tr>
						<th>User rank</th>
						<td>1</td>
					</tr>  -->
				</tbody>
			</table>	

		</div>
	</div>
</div>
@stop	