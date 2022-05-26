<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Orders
                    </div>
                    <div class="panel-body flex-row flex-nowrap">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>OrderId</th>
                                    <!-- <th>Subtotal</th> -->
                                    <!-- <th>Discount</th> -->
                                    <!-- <th>Tax</th> -->
                                    <th>Total</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <!-- <th>Mobile</th>
                                    <th>Email</th> -->
                                    <!-- <th>Zipcode</th> -->
                                    <th>status</th>
                                    <th>Order Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <!-- <td>${{$order->subtotal}}</td> -->
                                    <!-- <td>${{$order->discount}}</td> -->
                                    <!-- <td>${{$order->tax}}</td> -->
                                    <td>₨{{$order->total}}</td>
                                    <td>{{$order->firstname}}</td>
                                    <td>{{$order->lastname}}</td>
                                    <!-- <td>{{$order->mobile}}</td>
                                    <td>{{$order->email}}</td> -->
                                    <!-- <td>{{$order->zipcode}}</td> -->
                                    <td>{{$order->status}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                        <a href="{{route('user.orderdetails',['order_id'=>$order->id])}}" class="btn btn-info btn-sm">Details</a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$orders->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>