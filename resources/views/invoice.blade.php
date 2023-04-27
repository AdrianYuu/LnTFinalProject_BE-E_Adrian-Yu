@extends('layouts.mainlayout')

@section('title', 'Invoice')

@section('content')

<?php $rand = mt_rand(0000000, 999999)?>
<?php $invoice = 'INV/'.$rand.'/'.date("M").date("Y")?>

@if($errors->any())
    <div class="alert alert-danger m-auto col-8 mb-3">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h3>No. Invoice : {{ $invoice }}</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal Price</th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0 ?>
        @foreach ($user->item as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->category->name }}</td>
            <td>Rp {{ $item->price }}</td>
            <td>x{{ $item->quantity }}</td>
            <td>Rp {{ $item->price * $item->quantity }}</td>
            <?php $total += $item->price * $item->quantity ?>
        </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Total Price</td>
            <td>Rp {{ $total }}</td>
        </tr>
    </tbody>
</table>

<form action="/invoicePost/{{ $user->id }}" class="m-auto mt-2" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="mb-2">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" readonly>
    </div>
    <div class="mb-3">
        <label for="address" class="mb-2">Address</label>
        <input type="text" class="form-control" name="address" id="address">
    </div>
    <div class="mb-3">
        <label for="postal_code" class="mb-2">Postal Code</label>
        <input type="text" class="form-control" name="postal_code" id="postal_code">
    </div>
    <div class="mb-3">
        <label for="no_invoice" class="mb-2">No. Invoice</label>
        <input type="text" class="form-control" name="no_invoice" id="no_invoice" value="{{ $invoice }}" readonly>
    </div>
    <div class="mb-3">
        <label for="total_price" class="mb-2">Total Price</label>
        <input type="text" class="form-control" name="total_price" id="total_price" value="{{ $total }}" readonly>
    </div>
    <div class="mb-3">
        <button class="btn btn-success">Create Invoice</button>
    </div>
</form>

@endsection