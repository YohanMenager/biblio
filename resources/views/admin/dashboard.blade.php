@extends('admin.layout')

@section('title')

@section('content')
    <h1>{{ Auth::user()->prenom }} {{ Auth::user()->nom }} </h1>
    <h2>Statut : {{ Auth::user()->statut }}</h2>
@endsection
