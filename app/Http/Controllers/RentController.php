<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentController extends Controller
{
    function index()
    {
        return view('rentform');
    }
    public function store(Request $request)
    {
        DB::table('rents')->insert($request->except('_token'));
        return back()->with('success', 'Your Request successfully sent we are conneting soon');
    }

    public function show(){
        $rent= DB::table('rents')->get();
        return view('livewire.admin.rent.index',['data'=>$rent]);
    }

}
