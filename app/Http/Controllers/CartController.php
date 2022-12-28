<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    public function Add_To_Cart(Request $request)
    {
        $qty = $request->input('qty');
        $id = $request->input('id');

        $product = Product::where('id', $id)->first();
        $data['quantity']= $qty;
        $data['id']= $product->id;
        $data['name']= $product->name;
        $data['price']= $product->price;
        $data['attributes']= array($product->image);
        Cart::add($data);
        CartCollection();
        return redirect()->back();
    }
    public function RemoveCart($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }
}
