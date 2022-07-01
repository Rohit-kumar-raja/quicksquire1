<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\PinCodeImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
class PincodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pincode = DB::table('pincode')->orderByDesc('id')->paginate(10);
        $categories = DB::table('categories')->orderByDesc('id')->get();;
        return view('livewire.admin.pincode.index', ['data' => $pincode, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('pincode')->insert($request->except('_token'));
        return redirect()->back()->with(["success" => "Data added Successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function status($id)
    {
        $status =  DB::table('pincode')->find($id);
        if ($status->status == 1) {
            DB::table('pincode')->where('id', $id)->update(['status' => '0']);
        } else {

            DB::table('pincode')->where('id', $id)->update(['status' => '1']);
        }
        if ($status->status == 1) {
            return redirect()->back()->with('status', 'Status Deactivated successfully');
        } else {
            return redirect()->back()->with('status1', 'Status activated successfully');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('pincode')->find($id);
        $categories = DB::table('categories')->orderByDesc('id')->orderByDesc('id')->get();;;
        return view('livewire.admin.pincode.update', ['data' => $data, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = DB::table('pincode')
            ->where('id', $id)
            ->update($request->except(['_token', 'id']));
        return redirect()->route('admin.pincode')->with('update', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pincode')->delete($id);
        return redirect()->back()->with(['delete' => 'pincode Delete successfully']);
    }


    public function import( Request $request){
        Excel::import(new PinCodeImport, $request->file('file')->store('temp'));
        return redirect()->back()->with(['store'=>"Data Successfully Imported"]);
    }




}
