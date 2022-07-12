<div class="content">
    <style>
        .content {
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .icon-stat {
            display: block;
            overflow: hidden;
            position: relative;
            padding: 15px;
            margin-bottom: 1em;
            background-color: #fff;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .icon-stat-label {
            display: block;
            color: #999;
            font-size: 13px;
        }

        .icon-stat-value {
            display: block;
            font-size: 28px;
            font-weight: 600;
        }

        .icon-stat-visual {
            position: relative;
            top: 22px;
            display: inline-block;
            width: 32px;
            height: 32px;
            border-radius: 4px;
            text-align: center;
            font-size: 16px;
            line-height: 30px;
        }

        .bg-primary {
            color: #fff;
            background: #d74b4b;
        }

        .bg-secondary {
            color: #fff;
            background: #6685a4;
        }

        .icon-stat-footer {
            padding: 10px 0 0;
            margin-top: 10px;
            color: #aaa;
            font-size: 12px;
            border-top: 1px solid #eee;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="icon-stat">
                    <div class="row">
                        <div class="col-xs-8 text-left">
                            <span class="icon-stat-label">Total Coin</span>
                            <span class="icon-stat-value">Rs
                                @foreach ($totalCost as $coast)
                                    <?php $total_amount = $total_amount + (float) str_replace(',', '', $coast->total); ?>
                                @endforeach
                                {{ $total_coin }}
                            </span>
                        </div>
                        <div class="col-xs-4 text-center">
                            <i class="fa-solid fa-coins icon-stat-visual bg-primary"></i>
                        </div>
                    </div>
                    <div class="icon-stat-footer">
                        <i class="fa fa-clock-o"></i> Updated Now
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="icon-stat">
                    <div class="row">
                        <div class="col-xs-8 text-left">
                            <span class="icon-stat-label">Total Purchase</span>
                            <span class="icon-stat-value">{{ $totalPurchase }}</span>
                        </div>
                        <div class="col-xs-4 text-center">
                            <i class="fas fa-shopping-bag icon-stat-visual bg-secondary"></i>
                        </div>
                    </div>
                    <div class="icon-stat-footer">
                        <i class="fas fa-clock-o"></i> Updated Now
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="icon-stat">
                    <div class="row">
                        <div class="col-xs-8 text-left">
                            <span class="icon-stat-label">Total Delivered</span>
                            <span class="icon-stat-value">{{ $totalDelivered }}</span>
                        </div>
                        <div class="col-xs-4 text-center">
                            <i class="fa fa-rupee icon-stat-visual bg-primary"></i>
                        </div>
                    </div>
                    <div class="icon-stat-footer">
                        <i class="fa fa-clock-o"></i> Updated Now
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="icon-stat">
                    <div class="row">
                        <div class="col-xs-8 text-left">
                            <span class="icon-stat-label">Total Canceled</span>
                            <span class="icon-stat-value">{{ $totalCanceled }}</span>
                        </div>
                        <div class="col-xs-4 text-center">
                            <i class="fas fa-shopping-bag icon-stat-visual bg-secondary"></i>
                        </div>
                    </div>
                    <div class="icon-stat-footer">
                        <i class="fa fa-clock-o"></i> Updated Now
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-heading">
            <div class="panel-heading">
                <h2>Latest Order</h2>
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
                                <td>{{ $transation_details->status ?? '' }}</td>
                                <td>{{ $transation_details->transation_id ?? '' }}</td>
                                <td>{{ $order->traking_id }}</td>
                                <td>{{ $order->consignment_name }}</td>
                                <td>{{ $order->consigment_url }}</td>

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
