@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
Log In
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <div class="well custom-well">
            {{ Form::open(array('action' => 'Sentinel\SessionController@store')) }}

                <h2 class="form-signin-heading">Sign In</h2>
                <hr>

                <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                    {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email', 'autofocus')) }}
                    {{ ($errors->has('email') ? $errors->first('email') : '') }}
                </div>

                <div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
                    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password'))}}
                    {{ ($errors->has('password') ?  $errors->first('password') : '') }}
                </div>
                
                <div class="form-group">
                    <label class="checkbox">
                        {{ Form::checkbox('rememberMe', 'rememberMe') }} Remember me
                    </label>
                </div>

                {{ Form::submit('Sign In', array('class' => 'btn btn-primary'))}}
                <hr>
                <p><a href="{{ route('Sentinel\login') }}">Don't have an account? Register here</a></p>
                <p><a href="{{ route('Sentinel\forgotPasswordForm') }}">Forgot your password</a></p>
            {{ Form::close() }}  
        </div>
    </div>
</div>

@stop