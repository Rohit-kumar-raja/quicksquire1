<?php

namespace App\Http\Controllers;

use App\Http\Livewire\ShopComponent;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    function login(Request $request)
    {
        try {
            if (is_numeric($request->email)) {
                // for phone number with login
                $user =  User::where('phone', $request->email)->first();
            } else {
                // for email id with login 
                $user =  User::where('email', $request->email)->first();
            }
            // checking the password exits or not 
            if (Hash::check($request->password, $user->password)) {
                session(['utype' => $user->utype]);
                Auth::login($user);
                if ($user->utype == 'ADM') {
                    return redirect()->route('admin.dashboard');
                } else {

                    // insert the all product into the cart
                    $product_id = DB::table('cart_product')->where('user_id', $user->id)->get();
                    $cart_controller = new CartController();
                    foreach ($product_id as $pro) {
                        $cart_controller->store($pro->product_id);
                    }

                    $product_wishlist_id = DB::table('wishlist_product')->where('user_id', $user->id)->get();
                    $wishlist_controller = new ShopComponent();
                    foreach ($product_wishlist_id as $pro) {
                        $wishlist_controller->add($pro->product_id);
                    }


                    return redirect()->route(RouteServiceProvider::HOME);
                }
            } else {
                return redirect()->back()->withErrors('Record not matched with our record');
            }
        } catch (Exception $e) {
            return redirect()->back()->withErrors('Record not matched with our record');
        }
    }



    function loginWithOtp(Request $request)
    {
        try {
            if (is_numeric($request->email)) {
                // for phone number with login
                $user =  User::where('phone', $request->email)->where('status','1')->first();
            } else {
                // for email id with login 
                $user =  User::where('email', $request->email)->where('status','1')->first();
            }
            if ($user != '') {
                try {
                    $otp_send = new OtpController();
                    session(['user_data'=> $user]);
                    $otp_send->optSend($user->phone);
                    $details = [
                        'title' => 'Mail from quicksecureindia.com',
                    ];
                    Mail::to($request->email)->send(new \App\Mail\OtpSend($details));
                    return redirect()->route('login.with.verify');
                } catch (Exception $e) {
                    return redirect()->back()->withErrors('Record not matched with our record');
                }
            } else {
                return redirect()->back()->withErrors('Record not matched with our record');
            }
        } catch (Exception $e) {
            return redirect()->back()->withErrors('Record not matched with our record');
        }
    }

    function loginWithOtpVerify(Request $request)
    {
        if (session('otp') == $request->otp) {
            Auth::login(session('user_data'));
            return redirect('/');
        }else{
            return redirect()->route('login')->withErrors('Please Enter correct otp');

        }
    }
}
