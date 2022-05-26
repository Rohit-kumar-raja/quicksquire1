<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeBanner;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddHomeBannerComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $image;
    public $status;

    public function mount()
    {

        $this->status = '0';
    }

    public function addBanner()
    {
        $banner = new  HomeBanner();
        $banner->title = $this->title;
        $imagename = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('banners', $imagename);
        $banner->image = $imagename;
        $banner->status = $this->status;
        $banner->save();
        session()->flash('message', 'Banner Added Successfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-home-banner-component')->layout('layouts.dashboard');
    }
}
