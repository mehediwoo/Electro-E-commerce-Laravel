<?php


use Illuminate\Support\Facades\DB;


function getNav()
{
    $Nav = DB::table('categories')->OrderBy('id','DESC')->get();
    return $Nav;
}

function CartCollection()
{
    $cartCollection = Cart::getContent();
    return $cartCollection->toArray();
}








?>
