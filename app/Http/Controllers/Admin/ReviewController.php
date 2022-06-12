<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index($product_id)
    {
        if ($product_id != "all") {
            $orders = DB::table('reviews')->where('product_id', $product_id)->get();
        } else {
            $orders = DB::table('reviews')->get();
        }
        return view('livewire.admin.products.reviews', ['data' => $orders]);
    }

    public function destroy($id)
    {
        DB::table('reviews')->delete($id);
        return redirect()->back()->with(['delete' => 'orders Delete successfully']);
    }
}
