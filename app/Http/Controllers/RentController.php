<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    function index()
    {
        return view('rentform');
    }
    public function store(Request $request)
    {
        try {
            $id = DB::table('rents')->insertGetId($request->except('_token'));
            if ($request->file('image')) {
                DB::table('rents')->where('id', $id)->update(['image' => $this->insert_image($request->file('image'), 'rents')]);
            }
            return back()->with('success', 'Your Request successfully sent we are conneting soon');
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function show()
    {
        $rent = DB::table('rents')->orderByDesc('id')->get();
        return view('livewire.admin.rent.index', ['data' => $rent]);
    }

    public function rentHistoryForUser()
    {
        $rent = DB::table('rents')->where('email', Auth::user()->email)->where('phone', Auth::user()->phone)->orderByDesc('id')->get();
        return view('livewire.user.user-rent-orders', ['data' => $rent]);
    }
}
