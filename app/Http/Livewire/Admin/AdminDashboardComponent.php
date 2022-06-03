<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        // amount
        $all_total = 0;
        $order_amount = 0;
        $delivered_amount = 0;
        $cancel_amount = 0;

        $all_totals = DB::table('orders')->select('total')->get();
        foreach ($all_totals as $total) {
            $all_total = $all_total +  str_replace(",", "", $total->total);
        }

        $order_amounts = DB::table('orders')->select('total')->where('status', 'delivered')->get();
        foreach ($order_amounts as $order) {
            $order_amount = $order_amount +  str_replace(",", "", $order->total);
        }

        $delivered_amounts = DB::table('orders')->select('total')->where('status', 'delivered')->get();
        foreach ($delivered_amounts as $delivered) {
            $delivered_amount = $delivered_amount +  str_replace(",", "", $delivered->total);
        }

        $cancel_amounts = DB::table('orders')->select('total')->where('status', 'canceled')->get();
        foreach ($cancel_amounts as $cancel) {
            $cancel_amount = $cancel_amount +  str_replace(",", "", $cancel->total);
        }

        $all_total_count = DB::table('orders')->count();
        $cancel_count = DB::table('orders')->where('status', 'canceled')->count();
        $order_count = DB::table('orders')->where('status', 'ordered')->count();
        $delivered_count = DB::table('orders')->where('status', 'delivered')->count();




        return view('livewire.admin.admin-dashboard-component', [
            'all_total' => $all_total,
            'order_amount' => $order_amount,
            'cancel_amount' => $cancel_amount,
            'delivered_amount' => $delivered_amount,
            'all_total_count' => $all_total_count,
            'cancel_count' => $cancel_count,
            'order_count' => $order_count,
            'delivered_count' => $delivered_count,
        ])->layout('layouts.dashboard');
    }
}
