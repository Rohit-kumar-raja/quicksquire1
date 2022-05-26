<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Livewire\Component;
use Cart;
use App\Models\Category;

class ProductDetailsController extends Controller
{
    public $slug;
    public $qty;
  
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->qty = 1;
    }
    public function store($product_id, $product_name, $product_price)
    {

        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added to cart');
        return redirect()->route('product.cart');
    }

    public function increaseQuantity()
    {
        $this->qty++;
    }
    public function decreseQuantity()
    {
        if ($this->qty > 1) {
            $this->qty--;
        }
    }

    public function index($slug)
    {
        $total=0;
        $this->slug = $slug;
        $related_products = Product::where('category_id', '30', $this->slug)->inRandomOrder()->limit(3)->get();
        $product = Product::where('slug', $this->slug)->first();
        $bestseller_products = Product::inRandomOrder()->limit(4)->get();
        $popular_products = Product::inRandomOrder()->limit(10)->get();
        //$related_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(3)->get();
        foreach ($related_products as $r_product) {
            $total=  $total+$r_product->regular_price;
        }
        
        $categories = Category::all();
        return view('livewire.details-component', ['product' => $product, 'popular_products' => $popular_products, 'related_products' => $related_products, 'bestseller_products' => $bestseller_products, 'categories' => $categories,'total'=>$total])->layout('layouts.base');
    }
}
