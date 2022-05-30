<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddBrandComponent extends Component
{
    use WithFileUploads;
    public $brand_name;
    public $brand_slug;
    public $brand_image;

    public function generateslug()
    {
        $this->brand_slug = Str::slug($this->brand_name);
    }
    public function update($fields)
    {
        $this->validateOnly($fields, [
            'brand_name' => 'required',
            'brand_slug' => 'required|unique:brands',
            'brand_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }
    public function addBrand()
    {
        $this->validate([
            'brand_name' => 'required',
            'brand_slug' => 'required|unique:brands',
            'brand_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $brand = new Brand();
        $brand->brand_name = $this->brand_name;
        $brand->brand_slug = $this->brand_slug;
        // $brand->image = $this->brand_image->store('brands');

        $imageName = Carbon::now()->timestamp . '_' . $this->brand_image->extension();
        $this->brand_image->storeAs('brands', $imageName);
        $brand->brand_image = $imageName;

        $brand->save();
        session()->flash('message', 'Brand Added Successfully');
    }
    // public function storeBrand()
    // {
    //     $brand = new Brand();
    //     $brand->brand_name = $this->brand_name;
    //     $brand->brand_slug = $this->brand_slug;
    //     $brand->brand_image = $this->brand_image;
    //     $brand->save();
    //     session()->flash('message', 'Brand Added Successfully');
    // }
    public function render()

    {
        return view('livewire.brand.admin.admin-add-brand-component')->layout('layouts.dashboard');
    }
}
