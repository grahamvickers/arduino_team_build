@extends('layouts.app')

@section('content')
@include('layouts.partials.nav')
    <div id="app">
        <app :sensors="{{ json_encode($sensors) }}"></app>
    </div>
@endsection
