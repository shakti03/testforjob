<!-- Modal -->
<div style="top:44px;right:-251px;" class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="false">
  <div class="modal-dialog">
    <div class="row">
        <div class="col-xs-9">
            <div class="panel panel-primary btn-lg">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="panel-title bariol-thin">Login {{Config::get('laravel-authentication-acl::app_name')}}</h3>
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
                    {{Form::open(array('url' => URL::action("Jacopo\Authentication\Controllers\AuthController@postClientLogin"), 'method' => 'post') )}}
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
            {{link_to_action('Jacopo\Authentication\Controllers\AuthController@getReminder','Forgot password?')}}
            or <a href="{{URL::action('Jacopo\Authentication\Controllers\UserController@signup')}}"><i class="fa fa-sign-in"></i> Signup here</a>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
