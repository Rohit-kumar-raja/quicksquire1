<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\HomeCoupon;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class HomeAddCouponComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $image;
    public $status;
    public $link;
    public $category_id;

    public function mount()
    {
        $this->status = 0;
    }

    public function addCoupon()
    {

        $coupon = new  HomeCoupon();
        $coupon->title = $this->title;
        $imagename = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('coupons', $imagename);
        $coupon->image = $imagename;
        $coupon->status = $this->status;
        $coupon->link = $this->link;
        $coupon->category_id = $this->category_id;
        $coupon->save();
        session()->flash('message', 'Coupon Added Successfully');
    }

    public function render()
    {
        $cate = Category::all();
        return view('livewire.admin.home-add-coupon-component', ['cate' => $cate])->layout('layouts.dashboard');
    }
}
