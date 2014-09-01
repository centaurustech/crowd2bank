@extends('layouts/master')

@section('content')
	@include('template/crowdlist', array('title'=>'Current Projects'))
	@include('template/crowdlist', array('title'=>'Completed Projects'))
@stop