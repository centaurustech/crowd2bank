@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Create Group
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-12">
	{{ Form::open(array('action' => 'Sentinel\GroupController@store')) }}
        <h2>Create New Group</h2>
    
        <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
            {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name')) }}
            {{ ($errors->has('name') ? $errors->first('name') : '') }}
        </div>

        {{ Form::label('Permissions') }}
        <div class="form-group">
            <label class="checkbox-inline">
                {{ Form::checkbox('permissions[admin]', 1) }} Admin
            </label>
            <label class="checkbox-inline">
                {{ Form::checkbox('permissions[users]', 1) }} User
            </label>
        </div>

        {{ Form::submit('Create New Group', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
    </div>
</div>

@stop