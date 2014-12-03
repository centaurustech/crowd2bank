@extends('layouts/master')

@section('content')
    @include('template/crowdlist', array('title'=>'Current Projects', 'category' => 'current', 'projects' => $current))
@stop