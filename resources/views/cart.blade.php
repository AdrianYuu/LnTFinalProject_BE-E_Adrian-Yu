@extends('layouts.mainlayout')

@section('title', 'Cart')

@section('content')

@if($user->item->count() != 0)
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user->item as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->category->name }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->quantity }}</td>
            <td><img src="{{ asset('storage/photo/'.$item->image) }}" alt="product-picture" style="width:auto; height:15rem"></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@if($user->item->count() != 0)
    <h6>Do you want to checkout your cart?</h6>
    <a href="/invoice/{{ $user->id }}" class="btn btn-success">YES</a>
    <a href="/shop" class="btn btn-danger">NO</a>
@else
    <div class="d-flex justify-content-center">
        <h1>Cart is empty!</h1>
    </div>
@endif

@endsection