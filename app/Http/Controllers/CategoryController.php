<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CategoryCreateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categoryList = Category::paginate(10);
        return view('category', ['categoryList' => $categoryList]);
    }

    public function create()
    {
        return view('category-add');
    }

    public function store(CategoryCreateRequest $request)
    {
        $category = Category::create($request->all());

        if($category){
            Session::flash('status', 'success');
            Session::flash('message', 'Successfully added new category');
        }

        return redirect('category');
    }
}
