<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function finalBill($id)
    {
        $final_bill = DB::table('orders')->where('user_id',Auth::user()->id)->where('id', $id)->first();
        return view('livewire.user.final-bill', ['data' => $final_bill]);
    }
}
