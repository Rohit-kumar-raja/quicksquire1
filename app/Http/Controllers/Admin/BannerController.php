<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = DB::table('home_banners')->orderByDesc('id')->get();;
        return view('livewire.admin.banner.index', ['data' => $banner,]);
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
        $image_name = '';
        $id =   DB::table('home_banners')->insertGetId($request->except('_token'));

        if ($request->file('image')) {
            $image = $request->file('image');
            $destinationPath = 'assets/pages/img/banners/';
            $image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);
        }
        DB::table('home_banners')
            ->where('id', $id)
            ->update(['image' => $image_name]);
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $status =  DB::table('home_banners')->find($id);
        if ($status->status == 1) {
            DB::table('home_banners')->where('id', $id)->update(['status' => '0']);
        } else {

            DB::table('home_banners')->where('id', $id)->update(['status' => '1']);
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
        $data = DB::table('home_banners')->find($id);
        return view('livewire.admin.banner.update', ["data" => $data]);
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

        if ($request->file('image')) {
            $image_name = DB::table('home_banners')->find($id);
            $image_name = $image_name->image;
            $image = $request->file('image');
            $destinationPath = 'assets/pages/img/banners/';
            $image->move($destinationPath, $image_name);
        }
        $result = DB::table('home_banners')
            ->where('id', $request->id)
            ->update($request->except(['_token', 'id', 'image']));
        return redirect()->route('admin.banner')->with('update', 'Data Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image_name = DB::table('home_banners')->find($id);
        $image_name = $image_name->image;
        if (file_exists(public_path('assets/pages/img/banners/' . $image_name))) {
            unlink(public_path('assets/pages/img/banners/' . $image_name));
        }
        DB::table('home_banners')->delete($id);
        return redirect()->back()->with('delete', 'Data Deleted successfully');
    }
}
