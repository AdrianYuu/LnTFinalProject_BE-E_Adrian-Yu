<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ItemCreateRequest;

class ItemController extends Controller
{
    public function index()
    {
        $item = Item::all();
        return view('shop', ['itemList' => $item]);
    }

    public function view()
    {
        $item = Item::all();
        return view('item-list', ['itemList' => $item]);
    }

    public function create()
    {
        $category = Category::all();
        return view('item-add', ['category' => $category]);
    }

    public function store(Request $request)
    {   
        $newName = '';

        if($request->file('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name.'.'.$extension;
            $request->file('photo')->storeAs('photo', $newName);
        }   

        $request['image'] = $newName;

        $validated = $request->validate([
            'category_id' => 'required',
            'name' => 'unique:items|required|min:5|max:80|',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'image' => 'required',
        ]);

        $item = Item::create($request->all());

        if($item){
            Session::flash('status', 'success');
            Session::flash('message', 'Successfully added new item');
        }

        return redirect('shop');
    }

    public function edit($id)
    {
        $item = Item::with('category')->findOrFail($id);
        $category = Category::where('id', '!=', $item->category->id)->get();
        return view('item-edit', ['item' => $item, 'category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        
        $newName = $item->image;

        if($request->File('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name.'.'.$extension;
            $request->file('photo')->storeAs('photo', $newName);
        }

        $request['image'] = $newName;

        $validated = $request->validate([
            'category_id' => 'required',
            'name' => 'required|min:5|max:80|',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        $item->update($request->all());

        if($item){
            Session::flash('status', 'success');
            Session::flash('message', 'Successfully updated item');
        }

        return redirect ('item-list');
    }

    public function delete($id)
    {
        $item = Item::findOrFail($id);
        return view('item-delete', ['item' => $item]);
    }

    public function destroy($id)
    {
        $deletedItem = Item::findOrFail($id);
        $deletedItem->delete();

        if($deletedItem){
            Session::flash('status', 'success');
            Session::flash('message', 'Successfully deleted item');
        }

        return redirect('item-list');
    }
}