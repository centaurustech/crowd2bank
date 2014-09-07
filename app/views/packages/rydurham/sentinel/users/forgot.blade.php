@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Forgot Password
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <div class="well custom-well">
              {{ Form::open(array('action' => 'Sentinel\UserController@forgot', 'method' => 'post')) }}
                
                <h2>Forgot your Password?</h2>
                
                <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                    {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'E-mail', 'autofocus')) }}
                    {{ ($errors->has('email') ? $errors->first('email') : '') }}
                </div>

                {{ Form::submit('Send Instructions', array('class' => 'btn btn-primary'))}}
                <hr>
                <p><a href="{{ route('Sentinel\login') }}">Don't have an account? Register here</a></p>
                <p><a href="{{ route('Sentinel\forgotPasswordForm') }}">Forgot your password</a></p>
            {{ Form::close() }}          
        </div>
  	</div>
</div>

@stop