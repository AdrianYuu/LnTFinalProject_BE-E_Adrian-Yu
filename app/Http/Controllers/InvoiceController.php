<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\User;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InvoiceController extends Controller
{
    public function invoice($id)
    {
        $user = User::with('item')->findOrFail($id);
        return view('invoice', ['user' => $user]);
    }

    public function invoiceCreate(Request $request, $id)
    {
        $validated = $request->validate([
            'address' => 'required|min:10|max:100',
            'postal_code' => 'required|min:5|max:5',
        ]);

        Invoice::create([
            'name' => $request->name,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'no_invoice' => $request->no_invoice,
            'total_price' => $request->total_price,
        ]);

        $list = Cart::where('user_id', '=', $id)->get('item_id');

        foreach($list as $item){
            Item::findOrFail($item->item_id)->delete();
        }


        if($list){
            Session::flash('status2', 'success');
            Session::flash('message2', 'Successfully created invoice'); 
        }

        return redirect('shop');
    }

    public function showInvoice()
    {
        $listInvoice = Invoice::all();
        return view('invoice-list', ['invoice' => $listInvoice]);
    }
}
