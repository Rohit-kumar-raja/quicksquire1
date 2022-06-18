<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CouponController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupon = DB::table('coupon')->get();
        $categories = DB::table('categories')->get();
        return view('livewire.admin.coupon.index', ['coupons' => $coupon, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $id=  DB::table('coupon')->insertGetId($request->except('_token'));
        if($request->file('images')){
            DB::table('coupon')->update(['images'=>$this->insert_image($request->file('images'),'coupon')]);
        }
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
        $status =  DB::table('coupon')->find($id);
        if ($status->status == 1) {
            DB::table('coupon')->where('id', $id)->update(['status' => '0']);
        } else {

            DB::table('coupon')->where('id', $id)->update(['status' => '1']);
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
        $data = DB::table('coupon')->find($id);
        $categories = DB::table('categories')->get();
        return view('livewire.admin.coupon.update', ['data' => $data, 'categories' => $categories]);
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
        $result = DB::table('coupon')
            ->where('id', $id)
            ->update($request->except(['_token', 'id']));

            if($request->file('images')){
        $this->update_images('coupon',$id,$request->file('images'),'coupon','images');
            }

        return redirect()->route('admin.coupon')->with('update', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('coupon')->delete($id);
        return redirect()->back()->with(['delete' => 'Coupon Delete successfully']);
    }
}
