@extends('layout2.dashboard')

@section('title')
    Dashboard
@endsection

@section('content')
    @php $routesCheckLists = empty(getRoutesList() === false) ? getRoutesList() : []; @endphp
    <h2>Welcome {{Auth::user()->name }}</h2>
@endsection
