<?php

namespace App\Http\Livewire\Admin;

use App\Models\Feature;
use Livewire\Component;
use Livewire\WithPagination;

class AdminFeatureComponent extends Component
{
    public function deleteFeature($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('message', 'Category Has Been Deleted Successfully!!');
    }
    public function render()
    {
        $features = Feature::paginate(5);
        return view('livewire.admin.admin-feature-component', ['features' => $features])->layout('layouts.dashboard');
    }
}
