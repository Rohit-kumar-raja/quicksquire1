<?php

namespace App\Http\Livewire\Admin;

use App\Models\BrandSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddBrandSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $link;
    public $image;
    public $status;

    public function mount()
    {
        $this->status = 0;
    }
    public function addSlide()
    {
        $slider = new BrandSlider();
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->link = $this->link;
        $imagename = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('brands', $imagename);
        $slider->image = $imagename;
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message', 'Brand has been created successfully');
    }
    public function render()
    {
        return view('livewire.admin.brand.admin-add-brand-slider-component')->layout('layouts.dashboard');
    }
}
