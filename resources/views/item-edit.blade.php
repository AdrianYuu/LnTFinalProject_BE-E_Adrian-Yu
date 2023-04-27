@extends('layouts.mainlayout')

@section('title', 'Item')

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

<form action="/itemUpdate/{{ $item->id }}" method="POST" class="m-auto col-8 mt-2" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="category" class="mb-2">Item Category</label>
        <select class="form-control" name="category_id" id="category">
            <option value="{{ $item->category->id }}">{{ $item->category->name }}</option>
            @foreach($category as $items)
                @if($items->id == $item->category->id && $items->name == $item->category->name)
                    @continue
                @endif
                <option value="{{ $items->id }}">{{ $items->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="nama" class="mb-2">Item Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $item->name }}">
    </div>

    <div class="mb-3">
        <label for="nama" class="mb-2">Item Price</label>
        <input type="text" class="form-control" name="price" id="price" value="{{ $item->price }}">
    </div>

    <div class="mb-3">
        <label for="nama" class="mb-2">Item Quantity</label>
        <input type="text" class="form-control" name="quantity" id="quantity" value="{{ $item->quantity }}">
    </div>

    <div class="mb-3">
        <label for="photo" class="mb-2">Item Image</label>
        <div class="input-group">
            <input type="file" class="form-control" name="photo" id="photo" value="{{ $item->image }}">
        </div>
    </div>

    <div class="mb-3">
        <button class="btn btn-primary">Update Item</button>
    </div>
</form>

@endsection