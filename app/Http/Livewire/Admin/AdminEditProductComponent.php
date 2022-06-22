<?php

namespace App\Http\Livewire\Admin;


use App\Models\Category;
use App\Models\Feature;
use Livewire\Component;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $newimage;
    public $category_id;
    public $product_id;
    public $scategory_id;
    public $brand;
    public $images;
    public $newimages;
    public $feature_id;

    public function mount($product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->images = explode(",", $product->images);
        $this->category_id = $product->category_id;
        $this->scategory_id = $product->subcategory_id;
        $this->product_id = $product->id;
        $this->brand = $product->brand;
        $this->feature_id=explode(',',$product->feature_id);
       
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'category_id' => 'required',
        ]);
        if ($this->newimage) {
            $this->validateOnly($fields, [
                'newimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }
    }

    public function updateProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'category_id' => 'required',
        ]);

        if ($this->newimage) {
            $this->validate([
                'newimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }

        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $product->brand = $this->brand;
        if ($this->newimage) {
            // unlink('assets/pages/img/products' . '/' . $product->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('products', $imageName);
            $product->image = $imageName;
        }

        if ($this->newimages) {
            if ($product->images) {
                $images = explode(",", $product->images);
                foreach ($images as $image) {
                    if ($image) {
                        // unlink('assets/pages/img/products' . '/' . $image);
                    }
                }
            }
            $imagesname = '';
            foreach ($this->newimages as $key => $image) {
                $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                $image->storeAs('products', $imgName);
                $imagesname = $imagesname . ',' . $imgName;
            }
            $product->images = $imagesname;
        }

        $product->category_id = $this->category_id;
        if ($this->scategory_id) {
            $product->subcategory_id = $this->scategory_id;
        }
        $product->save();
        session()->flash('message', 'Product updated successfully');
    }

    function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'category_id' => 'required',
        ]);

        // if ($request->newimage) {
        //     $request->validate([
        //         'newimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     ]);
        // }
        $destination = 'assets/pages/img/products';
        $product = Product::find($request->product_id);
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->SKU = $request->SKU;
        $product->stock_status = $request->stock_status;
        $product->featured = $request->featured;
        $product->quantity = $request->quantity;
        $product->brand = $request->brand;
        if($request->feature_id>0){
        $product->feature_id = implode(',', $request->feature_id);
        }
        if ($request->newimage!='') {

            // unlink('assets/pages/img/products' . '/' . $product->image);
            // $imageName = Carbon::now()->timestamp . '.' . $request->newimage->extension();
            // $request->newimage->storeAs('products', $imageName);
            // $product->image = $imageName;


            $imageName = Carbon::now()->timestamp . '.' . $request->newimage->getClientOriginalName();
            $request->newimage->move($destination, $imageName);
            $product->image = $imageName;

        }

        if ($request->newimages >0) {
            if ($product->images) {
                $images = explode(",", $product->images);
                foreach ($images as $image) {
                    if ($image) {
                        // unlink('assets/pages/img/products' . '/' . $image);
                    }
                }
            }
            $imagesname = '';
            foreach ($request->newimages as $key => $image) {
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
        session()->flash('message', 'Product updated successfully');
        return redirect()->back();
    }


    public function changeSubcategory()
    {
        $this->scategory_id = 0;
    }
    public function render()
    {
        $scategories = Subcategory::where('category_id', $this->category_id)->get();
        $categories = Category::all();
        $brand = DB::table('brand_sliders')->get();
        $features = Feature::all();
        return view('livewire.admin.products.admin-edit-product-component', ['categories' => $categories, 'scategories' => $scategories, 'brands' => $brand, 'features' => $features])->layout('layouts.dashboard');
    }
}
