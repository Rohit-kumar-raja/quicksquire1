<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function store($product_id)
    {
        $product = DB::table('products')->find($product_id);
        $product_name = $product->name;
        $product_price = $product->sale_price;

        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added to cart');
        return redirect()->route('product.cart');
    }
    public function cartAddOneMore(Request $request)
    {
    
        $product_id = $request->input('product_id');
        $product = DB::table('products')->find($product_id);
        $product_name = $product->name;
        $product_price = $product->sale_price;

        for($i=0; $i<$request->input('item');$i++){
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added to cart');
        }
        return redirect()->route('product.cart');
    }

    public function addwith(Request $request)
    {
        $total_product_id = $request->input('product_addwith');
        foreach ($total_product_id as $product_id) {
            $product = DB::table('products')->find($product_id);
            $product_name = $product->name;
            $product_price = $product->sale_price;

            Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
            session()->flash('success_message', 'Item added to cart');
        }

        return redirect()->route('product.cart');
    }
    // added
}
