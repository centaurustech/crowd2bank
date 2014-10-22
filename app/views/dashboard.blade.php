@extends('layouts/master')

@section('content')
    @if ( $data['profile']['membership'] == 'Administrator' )
        @include('admin/dashboard')        
    @else
        @include('users/dashboard')
    @endif
@stop