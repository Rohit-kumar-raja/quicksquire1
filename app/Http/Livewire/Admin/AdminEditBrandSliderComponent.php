<?php

namespace App\Http\Livewire\Admin;

use App\Models\BrandSlider;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminEditBrandSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $link;
    public $image;
    public $status;
    public $newimage;
    public $slider_id;
    public function mount($slide_id)
    {
        $slider = BrandSlider::find($slide_id);
        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->link = $slider->link;
        $this->image = $slider->image;
        $this->status = $slider->status;
        $this->slider_id = $slider->id;
    }
    public function updateSlide()
    {
        $slider = BrandSlider::find($this->slider_id);
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->link = $this->link;
        if ($this->newimage) {
            $imagename = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('brands', $imagename);
            $slider->image = $imagename;
        }
        $slider->image = $this->image;
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message', 'Brand has been updated successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-brand-slider-component')->layout('layouts.dashboard');
    }
}
