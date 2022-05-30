<?php

namespace App\Http\Livewire\Admin;

use App\Models\BrandSlider;
use Livewire\Component;

class AdminBrandSliderComponent extends Component
{
    public function deleteSlide($slide_id)
    {
        $slider =  BrandSlider::find($slide_id);
        $slider->delete();
        session()->flash('message', 'Brand has been deleted successfully');
    }

    public function render()
    {
        $sliders = BrandSlider::all();
        return view('livewire.admin.brand.admin-brand-slider-component', ['sliders' => $sliders])->layout('layouts.dashboard');
    }
}
