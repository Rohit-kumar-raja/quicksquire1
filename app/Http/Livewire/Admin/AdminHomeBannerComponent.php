<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeBanner;
use Livewire\Component;

class AdminHomeBannerComponent extends Component
{


    // delete banner
    public function deleteBanner($id)
    {
        $banner = HomeBanner::find($id);
        $banner->delete();
        session()->flash('message', 'Banner has been deleted successfully');
    }

    public function render()
    {

        $banners = HomeBanner::all();
        return view('livewire.admin.admin-home-banner-component', ['banners' => $banners])->layout('layouts.dashboard');
    }
}
