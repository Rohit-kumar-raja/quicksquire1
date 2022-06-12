<x-adminlayout>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h2>order</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"> order</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div>
        {{-- @include('livewire.admin.order.insert') --}}
        <div class="container" style="padding:30px 0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="row">
                                <div class="col-md-10">
                                    <i class="fas fa-list"> All order</i>

                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#exampleModal">Add New
                                    </a>

                                </div>
                            </div>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif

                                @if (session('store'))
                                    <div class="alert alert-success">
                                        {{ session('store') }}
                                    </div>
                                @endif
                                @if (session('delete'))
                                    <div class="alert alert-danger">
                                        {{ session('delete') }}
                                    </div>
                                @endif
                                @if (session('update'))
                                    <div class="alert alert-success">
                                        {{ session('update') }}
                                    </div>
                                @endif
                                @if (session('status'))
                                    <div class="alert alert-secondary">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @if (session('status1'))
                                    <div class="alert alert-success">
                                        {{ session('status1') }}
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
                                            <th>Traking id</th>
                                            <th>status</th>
                                            <th>Details</th>
                                            <th>Edit</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $order)
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
                                                <td>{{ $order->traking_id ?? '' }}</td>
                                                <td>{{ $order->status }}</td>

                                                <td>
                                                    <a href="{{ route('admin.orderdetails', ['order_id' => $order->id]) }}"
                                                        class="btn btn-info btn-sm">Details</a>
                                                </td>
                                              

                                                <td>
                                                    <a href="{{ route('admin.orders.edit', $order->id) }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="#" onclick="delete{{ $order->id }}()"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                                <script>
                                                    function delete{{ $order->id }}() {
                                                        if (confirm('Are you sure, You want to delete this SubCategory?')) {
                                                            window.location.replace("{{ route('admin.orders.destroy', $order->id) }}")
                                                        }
                                                    }
                                                </script>
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
    </div>


</x-adminlayout>
