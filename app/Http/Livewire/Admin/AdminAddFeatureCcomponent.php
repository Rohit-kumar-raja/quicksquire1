<?php

namespace App\Http\Livewire\Admin;

use App\Models\Feature;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddFeatureCcomponent extends Component
{
    public $name;
    public $slug;

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function storeFeature()
    {
        $feature = new Feature();
        $feature->name = $this->name;
        $feature->slug = $this->slug;
        $feature->save();
        session()->flash('message', 'Feature Added Successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-feature-ccomponent')->layout('layouts.dashboard');
    }
}
