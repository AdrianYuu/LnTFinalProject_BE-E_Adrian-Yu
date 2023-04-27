@extends('layouts.mainlayout')

@section('title', 'Category')

@section('content')

@if(Session::has('status'))
    <div class="alert alert-success m-auto col-8" role="alert">
        {{Session::get('message')}}
    </div>
@endif

<div class="container col-8">
    <div class="mb-4 mt-4">
        <a href="/category-add" class="btn btn-primary">Add Category</a>
    </div>
    
    <table class="table table-bordered">   
        <thead>
            <tr>
                <th>No.</th>
                <th class="w-100">Category Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categoryList as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="my-5">
        {{  $categoryList->links() }}
    </div>
</div>

@endsection