@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Register
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-sm-12 ">
        <div class="well custom-well">
        {{ Form::open(array('action' => 'Sentinel\UserController@store', 'class' => 'form-horizontal')) }}
            <h2>Sign up with Crowd2Bank</h2>
            <hr>
            <div class="row">
                <div class="col-sm-12">

                    <div class="form-group">
                        <p class="col-sm-2 control-label"><strong>Personal Information</strong></p>
                    </div>

                    <div class="form-group {{ ($errors->has('first_name')) ? 'has-error' : '' }}">
                        <label for="inputFirstName" class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-5">
                            {{ Form::text('first_name', null, array('class' => 'form-control', 'placeholder' => 'First Name')) }}
                        </div>
                        <div class="col-sm-5">
                            <p class="text-danger">{{ ($errors->has('first_name') ? $errors->first('first_name') : '') }}</p>
                        </div>
                    </div>

                    <div class="form-group {{ ($errors->has('last_name')) ? 'has-error' : '' }}">
                        <label for="inputLastName" class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-5">
                            {{ Form::text('last_name', null, array('class' => 'form-control', 'placeholder' => 'Last Name')) }}                            
                        </div>    
                        <div class="col-sm-5">
                            <div class="text-danger">{{ ($errors->has('last_name') ? $errors->first('last_name') : '') }}</div>
                        </div>
                    </div>

                    <div class="form-group {{ ($errors->has('contact')) ? 'has-error' : '' }}">
                        <label for="inputContact" class="col-sm-2 control-label">Contact</label>
                        <div class="col-sm-5">
                            {{ Form::text('contact', null, array('class' => 'form-control', 'placeholder' => 'Contact')) }}                            
                        </div>
                        <div class="col-sm-5">
                            <p class="text-danger">
                                {{ ($errors->has('contact') ? $errors->first('contact') : '') }}
                            </p>
                        </div>
                    </div>

                    <div class="form-group {{ ($errors->has('company')) ? 'has-error' : '' }}">
                        <label for="inputCompany" class="col-sm-2 control-label">Company</label>
                        <div class="col-sm-5">
                            {{ Form::text('company', null, array('class' => 'form-control', 'placeholder' => 'Company')) }}
                        </div>
                        <div class="col-sm-5">
                            <p class="text-danger">
                                {{ ($errors->has('company') ? $errors->first('company') : '') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                <hr>
                    <div class="form-group">                                           
                        <p class="col-sm-2 control-label"><strong>Account Information</strong></p>
                    </div>

                    <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">                                           
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-5">
                            {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'E-mail')) }}
                        </div>
                        <div class="col-sm-5">
                            <p class="text-danger">
                                {{ ($errors->has('email') ? $errors->first('email') : '') }}
                            </p>
                        </div>
                    </div>

                    <div class="form-group {{ ($errors->has('username')) ? 'has-error' : '' }}">
                        <label for="inputUsername" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-5">
                            {{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Username')) }}                            
                        </div>
                        <div class="col-sm-5">
                            <p class="text-danger">
                                {{ ($errors->has('username') ? $errors->first('username') : '') }}
                            </p>
                        </div>
                    </div>

                    <div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
                        <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-5">
                            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}                            
                        </div>
                        <div class="col-sm-5">
                            <p class="text-danger">
                                {{ ($errors->has('password') ?  $errors->first('password') : '') }}
                            </p>
                        </div>
                    </div>

                    <div class="form-group {{ ($errors->has('password_confirmation')) ? 'has-error' : '' }}">
                        <label for="inputConfirmPassword" class="col-sm-2 control-label">Confirm Password</label>
                        <div class="col-sm-5">
                            {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm Password')) }}                            
                        </div>
                        <div class="col-sm-5">
                            <p class="text-danger">
                                {{ ($errors->has('password_confirmation') ?  $errors->first('password_confirmation') : '') }}
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-5">
                            {{ Form::submit('Sign Up', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-5">
                            <p><a href="{{ URL::route('Sentinel\login') }}">Already have an account? Sign in now</a></p>
                            <p><a href="{{ URL::route('Sentinel\forgotPasswordForm') }}">Forgot your password</a></p>
                        </div>
                    </div>

                </div>
            </div>     
        {{ Form::close() }}
        </div>
    </div>
</div>


@stop