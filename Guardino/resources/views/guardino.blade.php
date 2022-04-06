@extends('layouts.app')

@section('content')
@include('layouts.partials.nav')
    <div id="app">
        <app :sensors="{{ json_encode($sensors) }}"></app>
        <h1>WELCOME USER<h1>
    </div>
@endsection
