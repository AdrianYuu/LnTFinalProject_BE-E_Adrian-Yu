@extends('layouts.mainlayout')

@section('title', 'Item')

@section('content')

@if(Session::has('status'))
    <div class="alert alert-success" role="alert">
        {{Session::get('message')}}
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($itemList as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->category->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td><img src="{{ asset('storage/photo/'.$item->image) }}" style="width:auto; height:10rem" alt="product-picture"></td>
                <td>
                    <a href="/item-edit/{{ $item->id }}" class="btn btn-warning">Edit</a>
                    <a href="/item-delete/{{ $item->id }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection