@extends('layouts.mainlayout')

@section('title', 'Category')

@section('content')

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->category->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->price }}</td>
            <td><img src="{{ asset('storage/photo/'.$item->image) }}" alt="product-picture" style="width:auto; height:15rem"></td>
        </tr>
    </tbody>
</table>

<form action="/cartAdd/{{ $item->id }}" method="POST" class="mb-5">
    @csrf
    <h6>Are you sure want to add this item to cart?</h6>
    <button type="submit" class="btn btn-success">YES</button>
    <a href="/shop" class="btn btn-danger">NO</a>
</form>

@endsection