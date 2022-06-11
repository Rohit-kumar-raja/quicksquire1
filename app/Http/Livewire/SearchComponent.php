<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;

class SearchComponent extends Component
{

    public $sorting;
    public $pagesize;

    public $search;
    public $product_cat;
    public $product_cat_id;
    public $min;
    public $max;

    public function mount()
    {
        $this->sorting =  "default";
        $this->pagesize =  12;
        $this->fill(request()->only('search', 'product_cat', 'product_cat_id', 'sorting', 'pagesize', 'min', 'max'));
    }

    public function store($product_id, $product_name, $product_price)
    {

        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added to cart');
        return redirect()->route('product.cart');
    }
    use WithPagination;
    public function render()
    {
        session(['search' => $this->search, 'sorting' => $this->sorting, 'pagesize' => $this->pagesize, 'min_amount' => $this->min, 'max_amount' => $this->max]);

        // Searching for max and min amount
        if ($this->sorting == 'new' && $this->max!='' && $this->min!='') {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereBetween('sale_price', [$this->min, $this->max])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } else if ($this->sorting == 'low to high' && $this->max!='' && $this->min!='') {
           echo "lol 1";
            $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereBetween('sale_price', [$this->min, $this->max])->orderBy('sale_price', 'ASC')->paginate($this->pagesize);
        } else  if ($this->sorting == 'high to low' && $this->max!='' && $this->min!='') {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereBetween('sale_price', [$this->min, $this->max])->orderBy('sale_price', 'DESC')->paginate($this->pagesize);
        } elseif ($this->max!='' && $this->min!='') {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->whereBetween('sale_price', [$this->min, $this->max])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }



       else if ($this->sorting == 'new') {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } else if ($this->sorting == 'low to high') {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('sale_price', 'ASC')->paginate($this->pagesize);
        } else if ($this->sorting == 'high to low') {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('sale_price', 'DESC')->paginate($this->pagesize);
        } else {
            $products =  Product::where('name', 'like', '%' . $this->search . '%')->Where('category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }

        $categories = Category::all();
        // getting all brand start
        $brand = array();
        foreach ($products as  $prod) {
            if ($prod->brand != '')
                array_push($brand, $prod->brand);
        }
        $brand =  array_unique($brand);
        // getting brand end


        return view('livewire.search-component', ['products' => $products, 'categories' => $categories, 'brands' => $brand])->layout("layouts.base");
    }
}
