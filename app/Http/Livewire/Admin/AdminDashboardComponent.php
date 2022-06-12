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

        $month = array();
        $orders = array();
        $year = date('Y');
        $type = array();

        for ($i = 1; $i <= date('m'); $i++) {
            array_push($month, date("F", mktime(0, 0, 0, $i, 10)));
            if ($i < 10) {
                $monthly_orders = Db::table('orders')->where('created_at', 'like', $year . '-0' . $i . '-% %:%:%')->count();
            } else {
                $monthly_orders = Db::table('orders')->where('created_at', 'like', $year . '-' . $i . '-% %:%:%')->count();
            }
            array_push($orders, $monthly_orders);
        }
        $cancel_count1 = DB::table('orders')->where('status', 'canceled')->where('created_at', 'like', '%' .  $year . '%')->count();
        $order_count1 = DB::table('orders')->where('status', 'ordered')->where('created_at', 'like', '%' .  $year . '%')->count();
        $delivered_count1 = DB::table('orders')->where('status', 'delivered')->where('created_at', 'like', '%' . $year . '%')->count();
        $type = [$order_count1, $delivered_count1, $cancel_count1,];
        return view('livewire.admin.admin-dashboard-component', [
            'all_total' => $all_total,
            'order_amount' => $order_amount,
            'cancel_amount' => $cancel_amount,
            'delivered_amount' => $delivered_amount,
            'all_total_count' => $all_total_count,
            'cancel_count' => $cancel_count,
            'order_count' => $order_count,
            'delivered_count' => $delivered_count,
            'monthly' => $month,
            'orders' => json_encode($orders),
            'type' => json_encode($type)
        ])->layout('layouts.dashboard');
    }
}
