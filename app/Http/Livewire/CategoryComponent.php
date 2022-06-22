<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Feature;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;
use App\Models\Subcategory;

class CategoryComponent extends Component
{

    public $sorting;
    public $pagesize;
    public $category_slug;
    public $scategory_slug;
    public $feature_slug;
    public $search;
    public $product_cat;
    public $product_cat_id;
    public $min;
    public $max;
    public $brand;
    public $feature;

    public function mount($category_slug, $scategory_slug = null, $feature_slug = null)
    {
        $this->sorting =  "default";
        if($this->pagesize==''){
            $this->pagesize =  12;
        }
        $this->fill(request()->only('search', 'product_cat', 'product_cat_id', 'sorting', 'pagesize', 'min', 'max', 'brand', 'feature'));

        $this->category_slug = $category_slug;
        $this->scategory_slug = $scategory_slug;
        $this->feature_slug = $feature_slug;
    }


    public function store($product_id, $product_name, $product_price)
    {

        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added to cart');
        return redirect()->route('product.cart');
    }
    use WithPagination;
    public function render()
    {
        // $feature = Feature::where('slug', $this->feature_slug)->first();
        // $feature_id = $feature->id;
        // $feature_name = $feature->name;

        // print_r($this);
        $category_name = "";
        $filter = "";

        if ($this->scategory_slug) {
            $scategory = Subcategory::where('slug', $this->scategory_slug)->first();
            $category_id = $scategory->id ?? 0;
            $category_name = $scategory->category->name ?? 0;
            $filter = "sub";
        } else {
            $category = Category::where('slug', $this->category_slug)->first();
            $category_id = $category->id;
            $category_name = $category->name;
            $filter = "";
        }




        session(['sorting' => $this->sorting, 'pagesize' => $this->pagesize, 'min_amount' => $this->min, 'max_amount' => $this->max, 'brand' => $this->brand, 'feature' => $this->feature]);
        $brand_name = explode(',', $this->brand);


        $feature_name = str_replace(',', '|', $this->feature);        // search by feature
        if ($this->feature != '')
            if ($this->brand != '') {
                if ($this->sorting == 'new' && $this->max != '' && $this->min != '') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('feature_id', 'REGEXP', $feature_name)->where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereBetween('sale_price', [$this->min, $this->max])->whereIn('brand', $brand_name)->orderBy('created_at', 'DESC')->paginate($this->pagesize);
                } else if ($this->sorting == 'low to high' && $this->max != '' && $this->min != '') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('feature_id', 'REGEXP', $feature_name)->where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereBetween('sale_price', [$this->min, $this->max])->whereIn('brand', $brand_name)->orderBy('sale_price', 'ASC')->paginate($this->pagesize);
                } else  if ($this->sorting == 'high to low' && $this->max != '' && $this->min != '') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('feature_id', 'REGEXP', $feature_name)->where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereBetween('sale_price', [$this->min, $this->max])->whereIn('brand', $brand_name)->orderBy('sale_price', 'DESC')->paginate($this->pagesize);
                } elseif ($this->max != '' && $this->min != '') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('feature_id', 'REGEXP', $feature_name)->whereBetween('sale_price', [$this->min, $this->max])->whereIn('brand', $brand_name)->orderBy('created_at', 'DESC')->paginate($this->pagesize);
                } else if ($this->sorting == 'new') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('feature_id', 'REGEXP', $feature_name)->where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereIn('brand', $brand_name)->orderBy('created_at', 'DESC')->paginate($this->pagesize);
                } else if ($this->sorting == 'low to high') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('feature_id', 'REGEXP', $feature_name)->where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereIn('brand', $brand_name)->orderBy('sale_price', 'ASC')->paginate($this->pagesize);
                } else if ($this->sorting == 'high to low') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('feature_id', 'REGEXP', $feature_name)->where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereIn('brand', $brand_name)->orderBy('sale_price', 'DESC')->paginate($this->pagesize);
                } else {
                    $products =  Product::where('name', 'like', '%' . $this->search . '%')->where('feature_id', 'REGEXP', $feature_name)->Where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereIn('brand', $brand_name)->orderBy('created_at', 'DESC')->paginate($this->pagesize);
                }
            } else {
                // Searching for max and min amount
                if ($this->sorting == 'new' && $this->max != '' && $this->min != '') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('feature_id', 'REGEXP', $feature_name)->where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereBetween('sale_price', [$this->min, $this->max])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
                } else if ($this->sorting == 'low to high' && $this->max != '' && $this->min != '') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('feature_id', 'REGEXP', $feature_name)->where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereBetween('sale_price', [$this->min, $this->max])->orderBy('sale_price', 'ASC')->paginate($this->pagesize);
                } else  if ($this->sorting == 'high to low' && $this->max != '' && $this->min != '') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('feature_id', 'REGEXP', $feature_name)->where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereBetween('sale_price', [$this->min, $this->max])->orderBy('sale_price', 'DESC')->paginate($this->pagesize);
                } elseif ($this->max != '' && $this->min != '') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('feature_id', 'REGEXP', $feature_name)->whereBetween('sale_price', [$this->min, $this->max])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
                } else if ($this->sorting == 'new') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('feature_id', 'REGEXP', $feature_name)->where('category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('created_at', 'DESC')->paginate($this->pagesize);
                } else if ($this->sorting == 'low to high') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('feature_id', 'REGEXP', $feature_name)->where('category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('sale_price', 'ASC')->paginate($this->pagesize);
                } else if ($this->sorting == 'high to low') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('feature_id', 'REGEXP', $feature_name)->where('category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('sale_price', 'DESC')->paginate($this->pagesize);
                } else {
                 
                    $this->pagesize;

                    if ($this->sorting == 'new') {
                        $products = Product::where($filter . 'category_id', $category_id)->orderBy('created_at', 'DESC')->paginate($this->pagesize);
                    } else if ($this->sorting == 'price') {
                        $products = Product::where($filter . 'category_id', $category_id)->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
                    } else if ($this->sorting == 'price-desc') {
                        $products = Product::where($filter . 'category_id', $category_id)->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
                    } else {
                        $products = Product::where($filter . 'category_id', $category_id)->paginate($this->pagesize);
                    }
                    $category_id = null;
                }
            }
        // search by feature end

        else {

            // searching by brand
            if ($this->brand != '') {
                if ($this->sorting == 'new' && $this->max != '' && $this->min != '') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereBetween('sale_price', [$this->min, $this->max])->whereIn('brand', $brand_name)->orderBy('created_at', 'DESC')->paginate($this->pagesize);
                } else if ($this->sorting == 'low to high' && $this->max != '' && $this->min != '') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereBetween('sale_price', [$this->min, $this->max])->whereIn('brand', $brand_name)->orderBy('sale_price', 'ASC')->paginate($this->pagesize);
                } else  if ($this->sorting == 'high to low' && $this->max != '' && $this->min != '') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereBetween('sale_price', [$this->min, $this->max])->whereIn('brand', $brand_name)->orderBy('sale_price', 'DESC')->paginate($this->pagesize);
                } elseif ($this->max != '' && $this->min != '') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->whereBetween('sale_price', [$this->min, $this->max])->whereIn('brand', $brand_name)->orderBy('created_at', 'DESC')->paginate($this->pagesize);
                } else if ($this->sorting == 'new') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereIn('brand', $brand_name)->orderBy('created_at', 'DESC')->paginate($this->pagesize);
                } else if ($this->sorting == 'low to high') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereIn('brand', $brand_name)->orderBy('sale_price', 'ASC')->paginate($this->pagesize);
                } else if ($this->sorting == 'high to low') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereIn('brand', $brand_name)->orderBy('sale_price', 'DESC')->paginate($this->pagesize);
                } else {
                    $products =  Product::where('name', 'like', '%' . $this->search . '%')->Where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereIn('brand', $brand_name)->orderBy('created_at', 'DESC')->paginate($this->pagesize);
                }
            } else {
                // Searching for max and min amount
                if ($this->sorting == 'new' && $this->max != '' && $this->min != '') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereBetween('sale_price', [$this->min, $this->max])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
                } else if ($this->sorting == 'low to high' && $this->max != '' && $this->min != '') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereBetween('sale_price', [$this->min, $this->max])->orderBy('sale_price', 'ASC')->paginate($this->pagesize);
                } else  if ($this->sorting == 'high to low' && $this->max != '' && $this->min != '') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->whereBetween('sale_price', [$this->min, $this->max])->orderBy('sale_price', 'DESC')->paginate($this->pagesize);
                } elseif ($this->max != '' && $this->min != '') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->whereBetween('sale_price', [$this->min, $this->max])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
                } else if ($this->sorting == 'new') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('created_at', 'DESC')->paginate($this->pagesize);
                } else if ($this->sorting == 'low to high') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('sale_price', 'ASC')->paginate($this->pagesize);
                } else if ($this->sorting == 'high to low') {
                    $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('sale_price', 'DESC')->paginate($this->pagesize);
                } else {
                    $products =  Product::where('name', 'like', '%' . $this->search . '%')->Where('category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('created_at', 'DESC')->paginate($this->pagesize);
                }
            }
        }
        $categories = Category::all();


        // getting all brand start
        $products_brand = Product::where('name', 'like', '%' . $this->search . '%')->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        $brand = array();
        $feature = array();
        foreach ($products_brand as  $prod) {
            if ($prod->brand != '')
                array_push($brand, $prod->brand);
        }
        $brand =  array_unique($brand);

        // feature getting
        foreach ($products_brand as  $prod) {
            $feature_in =  explode(',', $prod->feature_id);
            foreach ($feature_in as $f_all) {
                if ($f_all != '')
                    array_push($feature, $f_all);
            }
        }
        $feature =  array_unique($feature);
        // feature end






















        $categories = Category::all();

        return view('livewire.category-component', ['products' => $products, 'categories' => $categories, 'brands' => $brand, 'features' => $feature, 'categories' => $categories, 'category_name' => $category_name,])->layout("layouts.base");
    }
}
