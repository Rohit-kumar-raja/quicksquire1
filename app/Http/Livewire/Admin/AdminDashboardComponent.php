<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
class AdminDashboardComponent extends Component
{
    public function render()
    {

        $dateS = Carbon::now()->subMonth(3);
        $dateE = Carbon::now(); 
        $monthly_total = DB::table('orders')
        ->whereBetween('placed_at',[$dateS,$dateE])
     
        ->sum('total_cost');

        return view('livewire.admin.admin-dashboard-component')->layout('layouts.dashboard');
    }
}
