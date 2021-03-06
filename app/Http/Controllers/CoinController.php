<?php

namespace App\Http\Controllers;

use App\Models\cf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCoin($user_id, $order_id, $transaction_id, $total_amount)
    {
        $gain = session('coin_gain');
        $use=session("success_use_coin");
        $coupon_name=session("coupon_name");
        $coupon_discount=session("coupon_discount");

        DB::table('coin')->insert(['user_id' => $user_id, 'order_id' => $order_id, 'transaction_id' => $transaction_id, 'gain' => $gain, 'use' => $use,'coupon_name'=>$coupon_name,'coupon_discount'=>$coupon_discount, 'created_at' => date('Y-m-d h:m:s')]);
        session(['coin_gain'=>0]);
        session(['success_use_coin'=>0]);
        session()->forget('coupon_name');
        session()->forget('coupon_discount');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cf  $cf
     * @return \Illuminate\Http\Response
     */
    public function show(cf $cf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cf  $cf
     * @return \Illuminate\Http\Response
     */
    public function edit(cf $cf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cf  $cf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cf $cf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cf  $cf
     * @return \Illuminate\Http\Response
     */
    public function destroy(cf $cf)
    {
        //
    }
}
