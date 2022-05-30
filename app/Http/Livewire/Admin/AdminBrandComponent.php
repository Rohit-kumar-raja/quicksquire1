<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Brand;
use Livewire\WithFileUploads;

class AdminBrandComponent extends Component
{
    use WithFileUploads;
    use WithPagination;
    public function deleteBrand($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        session()->flash('message', 'Brand Deleted Successfully');
    }
    public function render()
    {
        $brands = Brand::paginate(10);
        return view('livewire.brand.admin.admin-brand-component', ['brands' => $brands])->layout('layouts.dashboard');
    }
}
