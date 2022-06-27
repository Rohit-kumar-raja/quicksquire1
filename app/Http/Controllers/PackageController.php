<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller

{
  public function index()
  {
    $package=DB::connection('mysql1')->table('tbl_amc')->get();
    return view('livewire.package',['packages'=>$package]);
  }

  public function details($id)
  {

    $package=DB::connection('mysql1')->table('tbl_amc')->find($id);
    $brand=DB::connection('mysql1')->table('tbl_brand')->get();

    return view('livewire.package_details',['data'=>$package,'brands'=>$brand]);
  }
}
