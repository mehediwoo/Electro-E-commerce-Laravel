<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipping;
use Cart;
use App\Models\Payment;

class ShippingController extends Controller
{
    public function ShippingDetails(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zip-code' => 'required',
            'tel' => 'required',
        ]);

        $shipping = new Shipping;
        $shipping->name    = $request->input('name') ;
        $shipping->email   = $request->input('email');
        $shipping->address = $request->input('address');
        $shipping->city    = $request->input('city');
        $shipping->country = $request->input('country');
        $shipping->zip     = $request->input('zip-code');
        $shipping->tel	   = $request->input('tel');
        $shipping->save();
        return redirect('/Payment');
    }

    // Payment
    public function Payment()
    {
        $PaymentCart = Cart::getContent();
        $cartArray   = $PaymentCart->toArray();
        return view('payment', compact('cartArray'));
    }

    //Order Placement
    public function PlaceOrder(Request $request)
    {
        $payment = $request->input('payment');

        $payTo   = new Payment;
        $payTo->payment_method = $payment;
        $payTo->status = 'Pending';
        $payTo->save();
        return redirect('/');

    }
}
