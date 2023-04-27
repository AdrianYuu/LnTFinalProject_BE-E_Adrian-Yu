@extends('layouts.mainlayout')

@section('title', 'Category')

@section('content')

@if($errors->any())
    <div class="alert alert-danger m-auto col-8">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/categoryAdd" method="POST" class="m-auto col-8 mt-2">
    @csrf
    <div class="mb-3">
        <label for="name" class="mb-2">Category Name</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="mb-3">
        <button class="btn btn-primary">Add</button>
    </div>
</form>

@endsection