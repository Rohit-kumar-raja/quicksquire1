<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Orders
                    </div>
                    <div class="panel-body flex-row flex-nowrap">
                        @if (Session::has('order_message'))
                            <div class="alert alert-success">
                                {{ Session::get('order_message') }}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered dataTable no-footer table-responsive ">
                            <thead>
                                <tr>
                                    <th>OrderId</th>
                                    <!-- <th>Subtotal</th>
                                     <th>Discount</th> -->
                                    <!-- <th>Tax</th> -->
                                    <th>Total</th>
                                    <th>name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Zipcode</th>
                                    <th>Order Date</th>
                                    <th>status</th>
                                    <th >Action</th>
                                    <th >Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>ODR00000{{ $order->id }}</td>
                                        <!-- <td>${{ $order->subtotal }}</td> -->
                                        <!-- <td>${{ $order->discount }}</td> -->
                                        <!-- <td>${{ $order->tax }}</td> -->
                                        <td>₨{{ $order->total }}</td>
                                        <td>{{ $order->firstname . ' ' . $order->lastname }}</td>
                                        <td>{{ $order->mobile }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->zipcode }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ $order->status }}</td>

                                        <td>
                                            <a href="{{ route('admin.orderdetails', ['order_id' => $order->id]) }}"
                                                class="btn btn-info btn-sm">Details</a>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-success btn-sm dropdown-toggle" type="button"
                                                    data-toggle="dropdown">Status
                                                    <!-- <span class="caret"></span> -->
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li> <a href="#"
                                                            wire:click.prevent="updateOrderStatus({{ $order->id }},'delivered')">Delivered</a>
                                                    </li>
                                                    <li> <a href="#"
                                                            wire:click.prevent="updateOrderStatus({{ $order->id }},'cenceled')">Cenceled</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                       
                    </div>
               
                </div>
            </div>
        </div>
    </div>
</div>
