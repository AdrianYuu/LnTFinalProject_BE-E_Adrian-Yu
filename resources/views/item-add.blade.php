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

<form action="/itemAdd" method="POST" class="m-auto col-8 mt-2" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="category" class="mb-2">Item Category</label>
        <select class="form-control" name="category_id" id="category">
            <option value="">Select One</option>
            @foreach($category as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="nama" class="mb-2">Item Name</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>

    <div class="mb-3">
        <label for="nama" class="mb-2">Item Price</label>
        <input type="text" class="form-control" name="price" id="price">
    </div>

    <div class="mb-3">
        <label for="nama" class="mb-2">Item Quantity</label>
        <input type="text" class="form-control" name="quantity" id="quantity">
    </div>

    <div class="mb-3">
        <label for="photo" class="mb-2">Item Image</label>
        <div class="input-group">
            <input type="file" class="form-control" name="photo" id="photo">
        </div>
    </div>

    <div class="mb-3">
        <button class="btn btn-primary">Add Item</button>
    </div>
</form>

@endsection