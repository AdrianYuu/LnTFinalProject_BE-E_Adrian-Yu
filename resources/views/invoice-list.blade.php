@extends('layouts.mainlayout')

@section('title', 'Category')

@section('content')

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Address</th>
            <th>Postal Code</th>
            <th>No. Invoice</th>
            <th>Total Price</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($invoice as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->postal_code }}</td>
            <td>{{ $item->no_invoice }}</td>
            <td>{{ $item->total_price }}</td>
            <td>{{ $item->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection