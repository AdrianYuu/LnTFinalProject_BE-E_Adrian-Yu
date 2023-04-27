@extends('layouts.mainlayout')

@section('title', 'Category')

@section('content')

@if(Session::has('status'))
    <div class="alert alert-success" role="alert">
        {{Session::get('message')}}
    </div>
@endif

@if(Session::has('status2'))
    <div class="alert alert-success" role="alert">
        {{Session::get('message2')}}
    </div>
@endif

@if($itemList->count() == 0)
    <div class="m-auto d-flex justify-content-center">
        <h3>Barang sudah habis, silakan tunggu hingga barang di-restock ulang</h3>
    </div>
@endif

<div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
    @foreach($itemList as $item)
    <div class="col">
      <div class="card h-100">
        <img src="{{ asset('storage/photo/'.$item->image) }}" class="card-img-top" alt="product-picture" style="width:auto; height:20rem">
        <div class="card-body">
          <h5 class="card-title">Name : {{ $item->name }}</h5>
          <p class="card-text">Category : {{ $item->category->name }} <br>Price : Rp {{ $item->price }} <br>Quantity : {{ $item->quantity }}</p>
          @if(Auth::user()->role_id != 1)   
          <a href="/item-detail/{{ $item->id }}" class="btn btn-primary form-control">Add to Cart</a>
          @endif
        </div>
      </div>
    </div>
    @endforeach
</div>

@endsection