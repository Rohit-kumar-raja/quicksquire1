<?php

namespace App\Http\Livewire;

use App\Http\Controllers\CoinController;
use App\Http\Controllers\OtpController;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Livewire\Component;
use illuminate\Support\Facades\Auth;
use Cart;
use Cartalyst\Stripe\Api\Orders;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CheckoutComponent extends Component
{
    public $ship_to_different;
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;
    public $s_firstname;
    public $s_lastname;
    public $s_email;
    public $s_mobile;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_province;
    public $s_country;
    public $s_zipcode;
    public $paymentmode;
    public $thankyou;
    public $total_amount;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'line1' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'paymentmode' => 'required',
        ]);
        if ($this->ship_to_different) {
            $this->validateOnly($fields, [
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_email' => 'required|email',
                's_mobile' => 'required',
                's_line1' => 'required',
                's_city' => 'required',
                's_province' => 'required',
                's_country' => 'required',
                's_zipcode' => 'required',
                // 'paymentmode' => 'required',
            ]);
        }
    }
    public function placeOrder(Request $request)
    {
        $order = new Order();
        if (isset($request->address)) {
            $request->validate([
                'paymentmode' => 'required',
            ]);
            $get_address = DB::table('orders')->find($request->address);
            $order->firstname = $get_address->firstname;
            $order->lastname = $get_address->lastname;
            $order->email = $get_address->email;
            $order->mobile = $get_address->mobile;
            $order->line1 = $get_address->line1;
            $order->line2 = $get_address->line2;
            $order->city = $get_address->city;
            $order->province = $get_address->province;
            $order->country = $get_address->country;
            $order->zipcode = $get_address->zipcode;
            $this->mobile = $get_address->mobile;
        } else {
            $request->validate([
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email',
                'mobile' => 'required|numeric',
                'line1' => 'required',
                'city' => 'required',
                'province' => 'required',
                'country' => 'required',
                'zipcode' => 'required',
                'paymentmode' => 'required',

            ]);
            $order->firstname = $request->firstname;
            $order->lastname = $request->lastname;
            $order->email = $request->email;
            $order->mobile = $request->mobile;
            $this->mobile = $request->mobile;
            $order->line1 = $request->line1;
            $order->line2 = $request->line2;
            $order->city = $request->city;
            $order->province = $request->province;
            $order->country = $request->country;
            $order->zipcode = $request->zipcode;
        }







        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        if ($request->coin_on == 'yes') {
            $coin_use_for_product = session('coin_use');
            session(['success_use_coin' => $coin_use_for_product]);

            $order->total = str_replace(",", '', session('final_amount_after_coupon') ?? session()->get('checkout')['total']) - $coin_use_for_product;
        } else {
            $order->total = session('final_amount_after_coupon') ?? session()->get('checkout')['total'];
        }
        $order->status = 'ordered';
        $order->is_shipping_between = $request->ship_to_different ? 1 : 0;
        $order->save();

        $total_amount = 0;
        $productinfo=array();
        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            array_push($productinfo,$item->name);
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $total_amount = $total_amount + $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if ($request->ship_to_different) {
            $request->validate([
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_email' => 'required|email',
                's_mobile' => 'required|numeric',
                's_line1' => 'required',
                's_city' => 'required',
                's_province' => 'required',
                's_country' => 'required',
                's_zipcode' => 'required',
            ]);

            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->firstname = $request->s_firstname;
             $shipping->lastname = $request->s_lastname;
            $shipping->email = $request->s_email;
            $shipping->mobile = $request->s_mobile;
            $shipping->line1 = $request->s_line1;
            $shipping->line2 = $request->s_line2;
            $shipping->city = $request->s_city;
            $shipping->province = $request->s_province;
            $shipping->country = $request->s_country;
            $shipping->zipcode = $request->s_zipcode;
            $shipping->save();
        }

        if ($request->paymentmode == 'cod') {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
        } else {
            // for online payment
            session([
                "_token" => null,
                'firstname' => Auth::user()->name,
                'amount' => str_replace(',', '', $order->total),
                'hash' => null,
                'key' => env('PAYU_MERCHANT_KEY'),
                'productinfo' => implode('and', $productinfo),
                'udf1'=> $order->id . '|' . Auth::user()->id,
                'udf2'=> 'product',
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone,
                'service_provider' => 'payu_paisa',
                'furl' => route('payumoney-cancel'),
                'surl' => route('payumoney-success')
            ]);
            return  redirect()->route('payu.pay');
        }
        session(['order_id' => $order->id]);
        $coin = new CoinController();
        $coin->storeCoin(Auth::user()->id, $order->id, $transaction->id, $total_amount);
        try {
            if ($request->paymentmode == 'cod') {

                $details = [
                    'title' => 'Order Confirmation Mail from quicksecureindia.com',
                ];
                $message = new OtpController();
                 $order->phone;
                 $order_id='ORD00000'.$order->id;
                 $message->orderMassage($this->mobile, $order_id);
                 try{
                    Mail::to($request->email)->send(new \App\Mail\Ordermail($details));
                 }catch(Exception $e){
                    
                 }
            }
            DB::table('cart_product')->where('user_id', Auth::user()->id)->delete();
        } catch (Exception $e) {
        }

        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
        session()->forget('final_amount_after_coupon');



        if (!Auth::check()) {
            return redirect()->route('login');
        } else if ($this->thankyou) {
            return redirect()->route('user.orders');
        } else if (!session()->get('checkout')) {
            return redirect()->route('product.cart');
        }
    }

    public function verifyForCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else if ($this->thankyou) {
            return redirect()->route('thankyou');
        } else if (!session()->get('checkout')) {
            return redirect()->route('product.cart');
        }
    }
    function Redeem_coin($flag)
    {
        if ($flag == 'yes') {
        } else {
        }
    }

    public function render()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
        } else {
            $user_id = 0;
        }

        $this->verifyForCheckout();
        $balance_coin = DB::table('coin')->where('user_id', $user_id)->sum('gain') - DB::table('coin')->where('user_id', $user_id)->sum('use');
        // $address = DB::table('orders')->where('user_id',$user_id)->orderBy('id', 'DESC')->take(6)->get();
        $address = DB::table('orders')->select(['firstname', 'lastname', 'mobile', 'email', 'line1', 'line2', 'city', 'province', 'country', 'zipcode', 'user_id'])->distinct()->where('user_id', $user_id)->orderBy('id', 'DESC')->take(6)->get();
        return view('livewire.checkout-component', ['address' => $address, 'balance_coin' => $balance_coin])->layout("layouts.base");
    }


    public function edit_address($id)
    {
        $order= DB::table('orders')->find($id);

        return $order;
    }
}
