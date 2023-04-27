@extends('layouts.mainlayout')

@section('title', 'Category')

@section('content')

<h2 class="mb-4">Are you sure want to delete this item?</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Item Category</th>
            <th>Item Price</th>
            <th>Item Quantity</th>
            <th>Item Image</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->category->name }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->quantity }}</td>
            <td><img src="{{ asset('storage/photo/'.$item->image) }}" alt="product-picture"></td>
        </tr>
    </tbody>
</table>

<form action="/itemDelete/{{ $item->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger form-control mb-2">Yes</button>
    <a href="/item-list" class="btn btn-success form-control">No</a>
</form>

@endsection