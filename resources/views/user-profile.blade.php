@extends('layouts.mainlayout')

@section('title', 'Profile')

@section('content')

<div class="p-5 border border-dark rounded-2 mt-2">
    <h2>Name : {{ Auth::user()->name }}</h2>
    <h2>Role : {{ Auth::user()->role->name }}</h2>
    <a href="/logout" class="btn btn-danger">Logout</a>
</div>

@endsection