@extends('layouts/master')

@section('content')
	@include('template/crowdlist', array('title'=>'Current Projects', 'category' => 'current'))
	@include('template/crowdlist', array('title'=>'Completed Projects', 'category' => 'completed'))
@stop