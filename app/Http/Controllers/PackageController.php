<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    return view('livewire.package_details', ['data' => $package, 'brands' => $brand]);
  }

  function buy(Request $request)
  {

    try {
      $id =  DB::connection('mysql1')->table('tbl_amc_sale')->insertGetId($request->except('_token'));
      DB::connection('mysql1')->table('tbl_amc_sale')->where('id', $id)->update(['image' => $this->insert_image($request->file('image'), 'amc')]);
    } catch (Exception $e) {
      return back()->withErrors($e->getMessage());
    }
    session([
      "_token" => null,
      'firstname' => $request->customer_name,
      'amount' => $request->tot_amt,
      'hash' => null,
      'key' => env('PAYU_MERCHANT_KEY'),
      'productinfo' => $request->package_name .'|'.$id,
      'email' => $request->email,
      'phone'=>$request->mob_no,
      'service_provider'=>'payu_paisa',
      'furl'=>route('payumoney-cancel'),
      'surl'=>route('payumoney-success')
    ]);
    return  redirect()->route('payu.pay');
    
  
  }

  public function show()
  {
    $data = DB::connection('mysql1')->table('tbl_amc_sale')->orderByDesc('id')->get();
    return view('livewire.admin.amc.index', ['data' => $data]);
  }
}
