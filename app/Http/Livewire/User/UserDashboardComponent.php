<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
class UserDashboardComponent extends Component
{
    public function render()
    {
        $total_amount=0;
        $total_coin=DB::table('coin')->get()->sum('gain');
        $orders = Order::orderBy('created_at', 'DESC')->where('user_id', Auth::user()->id)->get()->take(10);
        $totalCost = Order::where('status',  'canceled')->where('user_id', Auth::user()->id)->get();
        $totalPurchase = Order::where('user_id', Auth::user()->id)->count();
        $totalDelivered = Order::where('status',  'delivered')->where('user_id', Auth::user()->id)->count();
        $totalCanceled = Order::where('status',  'canceled')->where('user_id', Auth::user()->id)->count();
        return view('livewire.user.user-dashboard-component', ['orders' => $orders, 'totalCost' => $totalCost, 'totalPurchase' => $totalPurchase, 'totalDelivered' => $totalDelivered, 'totalCanceled' => $totalCanceled,'total_amount'=>$total_amount,'total_coin'=>$total_coin])->layout('layouts.base');
    }
}
