@extends('register.layout_register')
@section('title')
    
@endsection
@section('content')
    <h1>Hello</h1>
    @auth
    <h3>{{auth()->user()->name}}</h3>    
    @endauth
@endsection