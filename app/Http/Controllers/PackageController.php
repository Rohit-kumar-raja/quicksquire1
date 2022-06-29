<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    DB::connection('mysql1')->table('tbl_amc_sale')->insert($request->except('_token'));
  }

  public function show(){
    $data=DB::connection('mysql1')->table('tbl_amc_sale')->get();
    return view('livewire.admin.amc.index',['data'=>$data]);
  }

}
