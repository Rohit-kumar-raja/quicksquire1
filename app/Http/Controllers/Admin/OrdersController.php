<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExportCanceledorder;
use App\Exports\ExportDeliveredOrders;
use App\Exports\ExportDispachedOrder;
use App\Exports\ExportNewOrder;
use App\Exports\Exportorder;
use App\Exports\ExportPanddingOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('orders')->orderByDesc('id')->get();

        return view('livewire.admin.orders.index', ['data' => $orders]);
    }
    public function canceled()
    {
        $orders = DB::table('orders')->where('status', 'canceled')->orderByDesc('id')->get();
        return view('livewire.admin.orders.canceled', ['data' => $orders]);
    }

    public function delivered()
    {
        $orders = DB::table('orders')->where('status', 'delivered')->orderByDesc('id')->get();
        return view('livewire.admin.orders.delivered', ['data' => $orders]);
    }

    public function padding()
    {
        $orders = DB::table('orders')->where('status', 'padding')->orderByDesc('id')->get();

        return view('livewire.admin.orders.padding', ['data' => $orders]);
    }
    public function ordered()
    {
        $orders = DB::table('orders')->where('status', 'ordered')->orderByDesc('id')->get();

        return view('livewire.admin.orders.ordered', ['data' => $orders]);
    }
    public function dispatched()
    {
        $orders = DB::table('orders')->where('status', 'dispatched')->orderByDesc('id')->get();

        return view('livewire.admin.orders.dispatched', ['data' => $orders]);
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
        DB::table('orders')->insert($request->except('_token'));
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
        $status =  DB::table('orders')->find($id);
        if ($status->status == 1) {
            DB::table('orders')->where('id', $id)->update(['status' => '0']);
        } else {

            DB::table('orders')->where('id', $id)->update(['status' => '1']);
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
        $data = DB::table('orders')->find($id);
        $categories = DB::table('categories')->orderByDesc('id')->get();
        return view('livewire.admin.orders.update', ['data' => $data, 'categories' => $categories]);
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
        $result = DB::table('orders')
            ->where('id', $id)
            ->update($request->except(['_token', 'id']));
        return redirect()->route('admin.orders')->with('update', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('orders')->delete($id);
        return redirect()->back()->with(['delete' => 'orders Delete successfully']);
    }


    function exportOrders($type)
    {
        if ($type == "new") {
            return Excel::download(new ExportNewOrder, 'new-order.xlsx');
        } else if ($type == "pending") {
            return Excel::download(new ExportPanddingOrder, 'pending-order.xlsx');
        } else if ($type == "dispatched") {
            return Excel::download(new ExportDispachedOrder, 'despatched-order.xlsx');
        } else if ($type == "canceled") {
            return Excel::download(new ExportCanceledorder, 'canceled-order.xlsx');
        } else if ($type == "delivered") {
            return Excel::download(new ExportDeliveredOrders, 'delivered-order.xlsx');
        } else {
            return Excel::download(new Exportorder, 'all-order.xlsx');
        }
    }

    function dateFilter(Request $request)
    {
        $type = $request->type;
        $from=$request->from;
        $to =$request->to;
        session(['to'=>$to,'from'=>$from]);

        if ($type == "new") {
            $orders = DB::table('orders')->whereBetween('created_at',[$from,$to])->where('status', 'ordered')->orderByDesc('id')->get();
            return view('livewire.admin.orders.ordered', ['data' => $orders]);
        } else if ($type == "pending") {
            $orders = DB::table('orders')->whereBetween('created_at',[$from,$to])->where('status', 'padding')->orderByDesc('id')->get();

            return view('livewire.admin.orders.padding', ['data' => $orders]);
        } else if ($type == "dispatched") {
            $orders = DB::table('orders')->whereBetween('created_at',[$from,$to])->where('status', 'dispatched')->orderByDesc('id')->get();

            return view('livewire.admin.orders.dispatched', ['data' => $orders]);
        } else if ($type == "canceled") {
            $orders = DB::table('orders')->whereBetween('created_at',[$from,$to])->where('status', 'canceled')->orderByDesc('id')->get();
            return view('livewire.admin.orders.canceled', ['data' => $orders]);
        } else if ($type == "delivered") {
            $orders = DB::table('orders')->whereBetween('created_at',[$from,$to])->where('status', 'delivered')->orderByDesc('id')->get();
            return view('livewire.admin.orders.delivered', ['data' => $orders]);
        } else {
            $orders = DB::table('orders')->whereBetween('created_at',[$from,$to])->orderByDesc('id')->get();
            return view('livewire.admin.orders.index', ['data' => $orders]);
        }

        dd($request);
    }
}
