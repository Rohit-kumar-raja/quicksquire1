
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-heading">
            <div class="panel-heading">
                <h2>All Orders</h2>
            </div>
            <div class="panel-body">
                <table class="table table-striped" id="example">
                    <thead>
                        <tr>
                            <th>OrderId</th>
                            <th>Name</th>
                            <th>Cart Amount</th>
                            <th>Order Status</th>
                            <th>Phone</th>
                            <th>Order Date</th>
                            <th>payment status</th>
                            <th>Transaction id</th>
                            <th>Tracking id</th>
                            <th>Consignment url</th>
                            <th>Consignment No</th>
                            <th class="text-center">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                @php
                                    $transation_details=DB::table('transactions')->where('order_id',$order->id)->first();
                             @endphp
                                <td>ODR00000{{ $order->id }}</td>
                                <td>{{ $order->firstname }} {{ $order->lastname }}</td>
                                <td>{{ $order->subtotal }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->mobile }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    @if ($order->status == 'delivered')
                                        Success
                                    @else
                                        {{ $transation_details->status ?? '' }}
                                    @endif
                                </td>
                                <td>{{ $transation_details->transation_id ?? '' }}</td>
                                <td> <a href="{{ $order->consignment_url ?? '' }}">{{ $order->traking_id }}</a></td>
                                <td>{{ $order->consignment_url ?? '' }}</td>
                                <td>{{ $order->consignment_name ?? '' }}</td>

                                <td class="text-center">
                                    <a href="{{ route('user.orderdetails', ['order_id' => $order->id]) }}"
                                        class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">