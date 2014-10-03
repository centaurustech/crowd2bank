@extends('layouts/master')

@section('content')

    @include('template/crowdlist', array('title'=>'Current Projects', 'category' => 'current', 'projects' => $projects['current']))
    @include('template/crowdlist', array('title'=>'Completed Projects', 'category' => 'completed', 'projects' => $projects['completed']))

@stop