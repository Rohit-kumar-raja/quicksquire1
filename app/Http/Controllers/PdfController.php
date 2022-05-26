<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;



class PdfController extends Controller
{
    public function getAllOrders()
    {
        $orders = Order::where('user_id', Auth::user()->id)->paginate(12);
        return view('orderdetails', compact('orders'));
    }

    public function downloadPDF()
    {
        $orders = Order::where('user_id', Auth::user()->id)->paginate(12);
        $pdf = PDF::loadView('orderdetails', compact('orders'));
        return $pdf->download('invoice.pdf');
    }

    // view the cart item
    public function viewCart()
    {
        $cartItems = Cart::content();
        return view('orderdetails', compact('cartItems'));
    }
    //Print the cart item as pdf
    public function printCart()
    {
        $cartItems = Cart::content();
        $pdf = PDF::loadView('orderdetails', compact('cartItems'));
        return $pdf->download('Product.pdf');
    }
}
