<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\BrandSlider;
use App\Models\Feature;
use App\Models\Subcategory;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $GST;
    public $HSN_No;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $images;
    public $scategory_id;
    public $feature_id;
    public $brand;
    public function mount()
    {
        $this->stock_status = 'inStock';
        $this->featured = 0;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'GST' => 'required|numeric',
            'HSN_No' => 'required|max:10',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
            // 'feature_id' => 'required',
        ]);
    }

    public function addProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'SKU' => 'required',
            'GST' => 'required|numeric',
            'HSN_No' => 'required|max:10',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
            // 'feature_id' => 'required',
        ]);
        try {
            $product = new Product();
            $product->name = $this->name;
            $product->slug = $this->slug;
            $product->short_description = $this->short_description;
            $product->description = $this->description;
            $product->regular_price = $this->regular_price;
            $product->sale_price = $this->sale_price;
            $product->SKU = $this->SKU;
            $product->GST = $this->GST;
            $product->HSN_No = $this->HSN_No;
            $product->stock_status = $this->stock_status;
            $product->featured = $this->featured;
            $product->quantity = $this->quantity;
            $product->brand = $this->brand;
            // $product->feature_id = $this->feature_id;

            $imageName = Carbon::now()->timestamp . '_' . $this->image->extension();
            $this->image->storeAs('products', $imageName);
            $product->image = $imageName;

            if ($this->images) {
                $imagesname = '';
                foreach ($this->images as $key => $image) {
                    $imaName = Carbon::now()->timestamp . $key . '_' . $image->extension();
                    $image->storeAs('products', $imaName);
                    $imagesname = $imagesname . ',' . $imaName;
                }
                $product->images = $imagesname;
            }

            $product->category_id = $this->category_id;
            if ($this->scategory_id) {
                $product->subcategory_id = $this->scategory_id;
            }
            $product->save();
            session()->flash('message', 'Product added successfully');
        } catch (Exception $e) {
            session()->flash('message', $e->getMessage());
        }
    }

    public function store(Request $request)
    {

        try {
            $destination = 'assets/pages/img/products';
            $product = new Product();
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->short_description = $request->short_description;
            $product->description = $request->description;
            $product->regular_price = $request->regular_price;
            $product->sale_price = $request->sale_price;
            $product->SKU = $request->SKU;
            $product->GST = $request->GST;
            $product->HSN_No = $request->HSN_No;
            $product->stock_status = $request->stock_status;
            $product->featured = $request->featured;
            $product->quantity = $request->quantity;
            $product->brand = $request->brand;
            if ($request->feature_id > 0) {
                $product->feature_id = implode(',', $request->feature_id);
            }

            $imageName = Carbon::now()->timestamp . '_' . $request->image[0]->getClientOriginalName();
            $request->image[0]->move($destination, $imageName);
            $product->image = $imageName;

            if ($request->images) {
                $imagesname = '';
                foreach ($request->images as $key => $image) {
                    $imaName = Carbon::now()->timestamp . $key . '_' . $image->getClientOriginalName();
                    $image->move($destination, $imaName);
                    $imagesname = $imagesname . ',' . $imaName;
                }
                $product->images = $imagesname;
            }

            $product->category_id = $request->category_id;
            if ($request->scategory_id) {
                $product->subcategory_id = $request->scategory_id;
            }
            $product->save();
            session()->flash('message', 'Product added successfully');
            return redirect()->back();
        } catch (Exception $e) {
            session()->flash('message', $e->getMessage());
            return redirect()->back();
        }
    }


    public function changeSubcategory()
    {
        $this->scategory_id = 0;
    }
    public function render()
    {
        $categories = Category::all();
        $scategories = Subcategory::where('category_id', $this->category_id)->get();
        $brands = BrandSlider::all();
        $features = Feature::all();
        return view('livewire.admin.products.admin-add-product-component', ['categories' => $categories, 'scategories' => $scategories, 'brands' => $brands, 'features' => $features])->layout('layouts.dashboard');
    }
}
