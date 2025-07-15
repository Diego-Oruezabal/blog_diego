@extends('layouts.base')

@section('title', 'Blog - El Patrón Singleton')

@section('content')
        <h1>Bienvenido, {{ auth()->user()->name }}</h1>
       @include('partials.newletter')
@endsection
