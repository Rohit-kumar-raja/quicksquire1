<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OtpController;
/**
 * Class PayuMoneyController
 */
class PayuMoneyController extends \InfyOm\Payu\PayuMoneyController
{
    const TEST_URL = 'https://test.payu.in/_payment';
    const PRODUCTION_URL = 'https://secure.payu.in';

    public function intiate_payment(Request $request)
    {
        $key = "7Pylu3";
        $salt = "jwmpm1SAeIRVcsbyPsAQCgpgor1Dnns1";

        $action = 'https://secure.payu.in/_payment';
        $html = '';
        session(['amount' => 1.0]);
        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0) {

            $hash = hash('sha512', $key . '|' . $_POST['txnid'] . '|' . $_POST['amount'] . '|' . $_POST['productinfo'] . '|' . $_POST['firstname'] . '|' . $_POST['email'] . '|||||' . $_POST['udf5'] . '||||||' . $salt);

            $_SESSION['salt'] = $salt; //save salt in session to use during Hash validation in response

            $html = '<form action="' . $action . '" id="payment_form_submit" method="post">
  
			<input type="hidden" id="udf5" name="udf5" value="' . $_POST['udf5'] . '" />
			<input type="hidden" id="surl" name="surl" value="' . route(('payumoneysuccess')) . '" />
			<input type="hidden" id="furl" name="furl" value="' . route('payumoneysuccess') . '" />
			<input type="hidden" id="curl" name="curl" value="' . route(('payumoneysuccess')) . '" />
			<input type="hidden" id="key" name="key" value="' . $key . '" />
			<input type="hidden" id="txnid" name="txnid" value="' . $_POST['txnid'] . '" />
			<input type="hidden" id="amount" name="amount" value="' . session('amount') . '" />
			<input type="hidden" id="productinfo" name="productinfo" value="' . $_POST['productinfo'] . '" />
			<input type="hidden" id="firstname" name="firstname" value="' . $_POST['firstname'] . '" />
			<input type="hidden" id="Lastname" name="Lastname" value="' . $_POST['Lastname'] . '" />
			<input type="hidden" id="Zipcode" name="Zipcode" value="' . $_POST['Zipcode'] . '" />
			<input type="hidden" id="email" name="email" value="' . $_POST['email'] . '" />
			<input type="hidden" id="phone" name="phone" value="' . $_POST['phone'] . '" />
			<input type="hidden" id="address1" name="address1" value="' . $_POST['address1'] . '" />
			<input type="hidden" id="address2" name="address2" value="' . (isset($_POST['address2']) ? $_POST['address2'] : '') . '" />
			<input type="hidden" id="city" name="city" value="' . $_POST['city'] . '" />
			<input type="hidden" id="state" name="state" value="' . $_POST['state'] . '" />
			<input type="hidden" id="country" name="country" value="' . $_POST['country'] . '" />
			<input type="hidden" id="Pg" name="Pg" value="' . $_POST['Pg'] . '" />
			<input type="hidden" id="hash" name="hash" value="' . $hash . '" />
			</form>
			<script type="text/javascript"><!--
				document.getElementById("payment_form_submit").submit();	
			//-->
			</script>';
        }

        //This function is for dynamically generating callback url to be postd to payment gateway. Payment response will be
        //posted back to this url. 

        if ($html) echo $html; //submit request to PayUBiz  

        return view('payumoney.pay');
    }



    public function payumoneySuccess(Request $request)
    {
        $postdata = $request->input();
        $msg = '';
        // $salt = $_SESSION['salt']; //Salt already saved in session during initial request.

        if (isset($postdata['key'])) {

            $key                =   $postdata['key'];
            $salt                =  'jwmpm1SAeIRVcsbyPsAQCgpgor1Dnns1';
            $txnid                 =     $postdata['txnid'];
            $amount              =     $postdata['amount'];
            $productInfo          =     $postdata['productinfo'];
            $firstname            =     $postdata['firstname'];
            $email                =    $postdata['email'];
            $udf5                =   $postdata['udf5'];
            $status                =     $postdata['status'];
            $resphash            =     $postdata['hash'];
            //Calculate response hash to verify	
            $keyString               =      $key . '|' . $txnid . '|' . $amount . '|' . $productInfo . '|' . $firstname . '|' . $email . '|||||' . $udf5 . '|||||';
            $keyArray               =     explode("|", $keyString);
            $reverseKeyArray     =     array_reverse($keyArray);
            $reverseKeyString    =    implode("|", $reverseKeyArray);
            $CalcHashString     =     strtolower(hash('sha512', $salt . '|' . $status . '|' . $reverseKeyString)); //hash without additionalcharges

            //check for presence of additionalcharges parameter in response.
            $additionalCharges  =     "";

            if (isset($postdata["additionalCharges"])) {
                $additionalCharges = $postdata["additionalCharges"];
                //hash with additionalcharges
                $CalcHashString     =     strtolower(hash('sha512', $additionalCharges . '|' . $salt . '|' . $status . '|' . $reverseKeyString));
            }
            //Comapre status and hash. Hash verification is mandatory.
            if ($status == 'success'  && $resphash == $CalcHashString) {


                $order_details =  explode(' ', $postdata['productinfo']);
                $order_id = $order_details[0];
                $user_id = $order_details[1];

                $user = User::find($user_id);
                Auth::login($user);

                if ($postdata['address1'] == 'product') {
                    // call faild product fucntion
                    $this->productSuccess($user_id, $order_id, $postdata);
                    return redirect()->route('user.orders');
                } else if ($postdata['address1'] == 'amc') {
                    $this->amcSuccess($user_id, $order_id, $postdata);
                    return redirect()->route('amc.package.user.history');
                }



                $msg = "Transaction Successful, Hash Verified...<br />";

                //Do success order processing here...
                //Additional step - Use verify payment api to double check payment.
                // if ($this->verifyPayment($key, $salt, $txnid, $status))
                //     $msg = "Transaction Successful, Hash Verified...Payment Verified...";
                // else
                //     $msg = "Transaction Successful, Hash Verified...Payment Verification failed...";
            } else {
                //tampered or failed

                // return  redirect()->route('payu.pay');

                $order_details =  explode(' ', $postdata['productinfo']);
                $order_id = $order_details[0];
                $user_id = $order_details[1];
                $user = User::find($user_id);
                Auth::login($user);

                if ($postdata['address1'] == 'product') {
                    // call faild product fucntion
                    $this->productFaild($user_id, $order_id);
                    return redirect()->route('user.orders');
                } else if ($postdata['address1'] == 'amc') {
                    $this->amcfaild($user_id, $order_id);
                    return redirect()->route('amc.package.user.history');
                }


                $msg = "Payment failed for Hash not verified...";
            }
        } else exit(0);
    }

    //This function is used to double check payment
    function verifyPayment($key, $salt, $txnid, $status)
    {
        $command = "verify_payment"; //mandatory parameter

        $hash_str = $key  . '|' . $command . '|' . $txnid . '|' . $salt;
        $hash = strtolower(hash('sha512', $hash_str)); //generate hash for verify payment request

        $r = array('key' => $key, 'hash' => $hash, 'var1' => $txnid, 'command' => $command);

        $qs = http_build_query($r);
        //for production
        $wsUrl = "https://info.payu.in/merchant/postservice.php?form=2";
        //for test
        // $wsUrl = "https://test.payu.in/merchant/postservice.php?form=2";
        try {
            $c = curl_init();
            curl_setopt($c, CURLOPT_URL, $wsUrl);
            curl_setopt($c, CURLOPT_POST, 1);
            curl_setopt($c, CURLOPT_POSTFIELDS, $qs);
            curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 30);
            curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($c, CURLOPT_SSLVERSION, 6); //TLS 1.2 mandatory
            curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
            $o = curl_exec($c);
            if (curl_errno($c)) {
                $sad = curl_error($c);
                throw new Exception($sad);
            }
            curl_close($c);
            $response = json_decode($o, true);
            if (isset($response['status'])) {
                // response is in Json format. Use the transaction_detailspart for status
                $response = $response['transaction_details'];
                $response = $response[$txnid];

                if ($response['status'] == $status) //payment response status and verify status matched
                    return true;
                else
                    return false;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    // to varifining the payment and updating data
    public function amcSuccess($user_id, $order_id, $postdata)
    {
        DB::connection('mysql1')->table('tbl_amc_sale')
            ->where('id', $order_id)
            ->where('email', $postdata['email'])
            ->update(['payment_option' => "Online", 'payment_remarks' => $postdata['mihpayid'], 'order_status' => 'Successfull', 'payment_attachment' => json_encode($postdata)]);
    }
    public function productSuccess($user_id, $order_id, $postdata)
    {
        try {
            DB::table('transactions')->insert(['user_id' => $user_id, 'order_id' => $order_id, 'mode' => "Online", 'status' => $postdata['status'], 'payu_id' => $postdata['mihpayid'], 'transation_id' => $postdata['txnid'], 'payment_mode' => $postdata['mode']]);

            $message = new OtpController();

            $message->orderMassage($postdata['phone'], $order_id);
        } catch (Exception $e) {
        }
    }
    public function amcfaild($user_id, $order_id)
    {
        try {
            DB::connection('mysql1')->table('tbl_amc_sale')->delete($order_id);
        } catch (Exception $e) {
        }
    }

    public function productFaild($user_id, $order_id)
    {

        DB::table('orders')->where('user_id', $user_id)->delete($order_id);
    }
}
