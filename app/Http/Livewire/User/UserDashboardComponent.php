<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboardComponent extends Component
{
    public function render()
    {
        $total_amount=0;
        $orders = Order::orderBy('created_at', 'DESC')->where('user_id', Auth::user()->id)->get()->take(10);
        $totalCost = Order::where('status',  'canceled')->where('user_id', Auth::user()->id)->get();
        $totalPurchase = Order::where('status',  'canceled')->where('user_id', Auth::user()->id)->count();
        $totalDelivered = Order::where('status',  'delivered')->where('user_id', Auth::user()->id)->count();
        $totalCanceled = Order::where('status',  'canceled')->where('user_id', Auth::user()->id)->count();
        return view('livewire.user.user-dashboard-component', ['orders' => $orders, 'totalCost' => $totalCost, 'totalPurchase' => $totalPurchase, 'totalDelivered' => $totalDelivered, 'totalCanceled' => $totalCanceled,'total_amount'=>$total_amount])->layout('layouts.base');
    }
}
