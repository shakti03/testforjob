<!-- Modal -->
<div style="top:44px;right:-251px;" class="modal fade" id="signup" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="row">
        <div class="col-xs-8">
            <div class="panel panel-primary btn-lg">
                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin">Please sign up for {{Config::get('laravel-authentication-acl::app_name')}}</h3>
                </div>
                <?php $message = Session::get('message'); ?>
                @if( isset($message) )
                <div class="alert alert-success">{{$message}}</div>
                @endif
                <div class="panel-body">
                    {{Form::open(["action" => 'Jacopo\Authentication\Controllers\UserController@postSignup', "method" => "POST", "id" => "user_signup"])}}
                    {{-- Field hidden to fix chrome and safari autocomplete bug --}}
                    {{Form::password('__to_hide_password_autocomplete', ['class' => 'hidden'])}}
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        {{Form::text('first_name', '', ['id' => 'first_name', 'class' => 'form-control', 'placeholder' => 'First Name', 'required', 'autocomplete' => 'off'])}}
                                    </div>
                                    <span class="text-danger">{{$errors->first('first_name')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        {{Form::text('last_name', '', ['id' => 'last_name', 'class' => 'form-control', 'placeholder' => 'Last Name', 'required', 'autocomplete' => 'off'])}}
                                    </div>
                                    <span class="text-danger">{{$errors->first('last_name')}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                {{Form::email('email', '', ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email address', 'required', 'autocomplete' => 'off'])}}
                            </div>
                            <span class="text-danger">{{$errors->first('email')}}</span>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        {{Form::password('password', ['id' => 'password1', 'class' => 'form-control', 'placeholder' => 'Password', 'required', 'autocomplete' => 'off'])}}
                                    </div>
                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        {{Form::password('password_confirmation', ['class' => 'form-control', 'id' =>'password2', 'placeholder' => 'Confirm password', 'required'])}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                <div id="pass-info"></div>
                              </div>
                            </div>

                            {{-- Captcha validation --}}
                            @if(isset($captcha) )
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span id="captcha-img-container">
                                            @include('home.captcha-image')
                                        </span>
                                        <a id="captcha-gen-button" href="#" class="btn btn-small btn-info margin-left-5"><i class="fa fa-refresh"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
                                        {{Form::text('captcha_text',null, ['class'=> 'form-control', 'placeholder' => 'Fill in with the text of the image', 'required', 'autocomplete' => 'off'])}}
                                    </div>
                                </div>
                                <span class="text-danger">{{$errors->first('captcha_text')}}</span>
                            </div>
                            @endif
                        </div>
                        <input type="submit" value="Register" class="btn btn-info btn-block">
                    </form>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 margin-top-10">
                                {{link_to_action('Jacopo\Authentication\Controllers\AuthController@getClientLogin','Already have an account? Login here')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <script>
    $(document).ready(function() {
      //------------------------------------
      // password checking
      //------------------------------------
      var password1     = $('#password1'); //id of first password field
      var password2     = $('#password2'); //id of second password field
      var passwordsInfo = $('#pass-info'); //id of indicator element

      passwordStrengthCheck(password1,password2,passwordsInfo);

      //------------------------------------
      // captcha regeneration
      //------------------------------------
      $("#captcha-gen-button").click(function(e){
            e.preventDefault();
            
            $.ajax({
              url: "{{URL::to('/')}}/captcha-ajax",
              method: "POST"
            }).done(function(image) {
              $("#captcha-img-container").html(image);
            });
        });
    });
  </script>

