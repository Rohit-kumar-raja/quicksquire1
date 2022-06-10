<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{

    function register(Request $request)
    {
        if ($request->password === $request->password_confirmation) {
            session(['login_input' => $request->input()]);
            $this->optSend($request->phone);
            return view('auth.varify-mobile-otp');
        }
    }

    function optSend($mobileNumber)
    {
        $otp = rand('100000', '999999');
        session(['otp' => $otp]);
        //Your authentication key
        $authKey = "14107AXVZG4hH18q5f815112P15";
        //Multiple mobiles numbers separated by comma
        $mobileNumber = 7250634942;
        //Sender ID,While usi
        $senderId = "LBSJSR";
        $country = "91";
        $DLT_TE_ID = "1207163497526511297";
        //Your message to send, Add URL encoding here.
        $message = 'Your LABES login OTP code is'  . $otp;
        //Define route 
        $route = "4";
        //Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'country' => $country,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $senderId,
            'DLT_TE_ID' => $DLT_TE_ID,
            'route' => $route
        );
        //API URL
        $url = "http://bulksms.insightinfosystem.com/api/sendhttp.php";
        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
        ));


        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        //get response
        $output = curl_exec($ch);

        //Print error if any
        if (curl_errno($ch)) {
            echo 'error:' . curl_error($ch);
        }
        curl_close($ch);
        //	echo "<script>window.location.href='verify.php'</script>"; 

    }

    function verifyOtp(Request $request)
    {
        $otp = $request->otp;
        if ($otp == session('otp')) {

            $input = session('login_input');
   
           $user=  User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);
            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
        }
    }
}
