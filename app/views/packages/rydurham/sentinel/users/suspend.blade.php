@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Suspend User
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Form::open(array('action' => array('Sentinel\UserController@suspend', $user->id), 'method' => 'post')) }}
 
            <h2>Suspend {{ $user->email }}</h2>

            <div class="form-group {{ ($errors->has('minutes')) ? 'has-error' : '' }}">
                {{ Form::text('minutes', null, array('class' => 'form-control', 'placeholder' => 'Minutes', 'autofocus')) }}
                {{ ($errors->has('minutes') ? $errors->first('minutes') : '') }}
            </div>    	   

            {{ Form::hidden('id', $user->id) }}

            {{ Form::submit('Suspend User', array('class' => 'btn btn-primary')) }}
            
        {{ Form::close() }}
    </div>
</div>

@stop