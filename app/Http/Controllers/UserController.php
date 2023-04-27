<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index($id)
    {
        $user = User::with('item')->findOrFail($id);
        return view('cart', ['user' => $user]);
    }

    public function create($id)
    {
        $item = Item::findOrFail($id);
        return view('item-detail', ['item' => $item]);
    }

    public function store(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        
        Cart::create([
            'user_id' => $user_id,
            'item_id' => $id,
        ]);

        return redirect('shop');
    }
}
