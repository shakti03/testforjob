<!-- Modal -->
<div  class="modal fade pull-right" id="login" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="row">
        <div class="col-xs-12 col-md-9 col-md-offset-2">
            <div class="panel panel-primary btn-lg" style="margin-top:70px">
                <div class="panel-heading borderNone">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="panel-title bariol-thin"><i class="fa fa-user"></i>&nbsp; Login to {{Config::get('laravel-authentication-acl::app_name')}}</h3>
                </div>
                <?php $message = Session::get('message'); ?>
                @if( isset($message) )
                <div id="login_error" class="alert alert-success">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$message}}</div>
                @endif
                @if($errors && ! $errors->isEmpty() )
                <div id="login_error" class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                @foreach($errors->all() as $error)
                {{$error}}
                @endforeach
                </div>
                @endif
                <div class="panel-body">
                    {{Form::open(array('url' => URL::action("Jacopo\Authentication\Controllers\AuthController@postClientLogin"), 'method' => 'post' , 'onsubmit'=>'javascript:;') )}}
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    {{Form::email('email', '', ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email address', 'required', 'autocomplete' => 'off'])}}
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    {{Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'required', 'autocomplete' => 'off'])}}
                                </div>
                            </div>
                        
                    {{Form::label('remember','Remember me')}}
                    {{Form::checkbox('remember')}}
                    <input type="submit" value="Login" class="btn btn-info btn-block">
                    {{Form::close()}}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 margin-top-10">
                            
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#forgetpassword" id="btnforget">Forget password</a>
                            or
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#signup" id="loginSignup"><i class="fa fa-sign-in"></i> Signup here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
