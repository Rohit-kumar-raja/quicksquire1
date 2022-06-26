<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Feature;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Support\Facades\DB;
class ShopComponent extends Component
{

    public $sorting;
    public $pagesize;

    public $min_price;
    public $max_price;

    public function mount()
    {
        $this->sorting =  "default";
        $this->pagesize =  12;

        $this->min_price =  1;
        $this->max_price =  1000;
    }

    public function store($product_id, $product_name, $product_price)
    {

        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added to cart');
        return redirect()->route('product.cart');
    }

    public function add($product_id)
    {
        $product = DB::table('products')->find($product_id);
        $product_name = $product->name;
        $product_price = $product->sale_price;
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emit('wishlist-count-component', 'refreshComponent');
        return redirect()->back();
    }
    public function remove($product_id)
    {
        try {
            DB::table('wishlist_product')->where('product_id',$product_id)->delete();
        } catch (Exception $e) {
        }
        foreach (Cart::instance('wishlist')->content() as $witem) {
            if ($witem->id == $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emit('wishlist-count-component', 'refreshComponent');
                return redirect()->back();
            }
        }
    }

    use WithPagination;
    public function render()
    {
        if ($this->sorting == 'date') {
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } else if ($this->sorting == 'price') {
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        } else if ($this->sorting == 'price-desc') {
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        } else {
            $products = Product::paginate($this->pagesize);
        }


        $categories = Category::all();
        $brands = Brand::all();
        $features = Feature::all();
        return view('livewire.shop-component', ['products' => $products, 'categories' => $categories, 'brands' => $brands, 'features' => $features])->layout("layouts.base");
    }
}
