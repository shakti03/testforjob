<!-- Modal -->
<div class="modal fade" id="forgetpassword" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="row">
           <div class="col-xs-12 col-sm-8 col-md-9 col-md-offset-3">
                <div class="panel panel-primary btn-lg">
                    <div class="panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="panel-title">Password recovery</h3>
                    </div>
                    @if($errors && ! $errors->isEmpty() )
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                    @endif
                    <div class="panel-body">
                        {{Form::open(array('url' => URL::action("Jacopo\Authentication\Controllers\AuthController@postReminder"), 'method' => 'post') )}}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {{Form::label('email','Email:')}}
                                    <div class="input-group" id="password-field">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        {{Form::email('email', '', ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Your account email', 'required', 'autocomplete' => 'off'])}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Recover" class="btn btn-info btn-block">
                        {{Form::close()}}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 margin-top-10">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#login" id="backToLogin"><i class="fa fa-arrow-left"></i> Back to login</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
  </div>
</div>
