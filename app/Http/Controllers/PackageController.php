<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller

{
  public function index()
  {
    $package = DB::connection('mysql1')->table('tbl_amc')->get();
    return view('livewire.package', ['packages' => $package]);
  }

  public function details($id)
  {

    $package = DB::connection('mysql1')->table('tbl_amc')->find($id);
    $brand = DB::connection('mysql1')->table('tbl_brand')->get();
    $all_orders = DB::table('orders')->where('user_id', Auth::user()->id)->get();

    return view('livewire.package_details', ['data' => $package, 'brands' => $brand, 'orders' => $all_orders]);
  }

  function buy(Request $request)
  {

    try {
      $id =  DB::connection('mysql1')->table('tbl_amc_sale')->insertGetId($request->except('_token'));
      if ($request->file('image')) {
        DB::connection('mysql1')->table('tbl_amc_sale')->where('id', $id)->update(['image' => $this->insert_image($request->file('image'), 'amc')]);
      }
    } catch (Exception $e) {
      return back()->withErrors($e->getMessage());
    }
    session([
      "_token" => null,
      'firstname' => $request->customer_name,
      'amount' => $request->tot_amt,
      'hash' => null,
      'key' => env('PAYU_MERCHANT_KEY'),
      'productinfo' => $request->package_name,
      'email' => $request->email,
      'phone' => $request->mob_no,
      'udf1' => $id . '|' . Auth::user()->id,
      'udf2' => 'amc',
      'service_provider' => 'payu_paisa',
      'furl' => route('payumoney-cancel'),
      'surl' => route('payumoney-success')
    ]);
    return  redirect()->route('payu.pay');
  }

  public function show()
  {
    $data = DB::connection('mysql1')->table('tbl_amc_sale')->where('dealer_name','web')->orderByDesc('id')->get();
    return view('livewire.admin.amc.index', ['data' => $data]);
  }

  public function packagetHistoryForUser()
  {
    $amc = DB::connection('mysql1')->table('tbl_amc_sale')->where('email', Auth::user()->email)->where('mob_no', Auth::user()->phone)->orderByDesc('id')->get();
    return view('livewire.user.user-amc-orders', ['data' => $amc]);
  }

  public function getOrderDetails($id)
  {
    $all_orders = DB::table('orders')->where('user_id', Auth::user()->id)->where('id', $id)->first();


    $product_id = DB::table('order_items')->where('order_id', $all_orders->id)->first()->product_id;
    $product_info = DB::table('products')->find($product_id);
    $category_name = DB::table('categories')->find($product_info->category_id)->name;

    $all_orders->cat_name = $category_name;
    $all_orders->created_at = date('Y-m-d', strtotime($all_orders->created_at));
    $all_orders->brand = $product_info->brand;
    return $all_orders;
  }
  
  public function invoice($id){
    $amc = DB::connection('mysql1')->table('tbl_amc_sale')->where('email', Auth::user()->email)->where('mob_no', Auth::user()->phone)->where('id',$id)->orderByDesc('id')->first();
    return view('livewire.user.amc-invoice-component', ['data' => $amc]);
  }

}
