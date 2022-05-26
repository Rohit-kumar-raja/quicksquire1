<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeCoupon;
use Livewire\Component;

class HomeCouponComponent extends Component
{
    public function deleteCoupon($id)
    {
        $coupon = HomeCoupon::find($id);
        $coupon->delete();
        session()->flash('message', 'Coupon has been deleted successfully');
    }
    public function render()
    {
        $coupons = HomeCoupon::all();
        return view('livewire.admin.home-coupon-component', ['coupons' => $coupons])->layout('layouts.dashboard');
    }
}
