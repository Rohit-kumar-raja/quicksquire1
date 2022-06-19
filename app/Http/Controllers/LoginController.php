<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

                    return redirect()->route(RouteServiceProvider::HOME);
                }
            } else {
                return redirect()->back()->withErrors('Record not matched with our record');
            }
        } catch (Exception $e) {
            return redirect()->back()->withErrors('Record not matched with our record');
        }
    }



    function login_otp(Request $request)
    {
    }
}
