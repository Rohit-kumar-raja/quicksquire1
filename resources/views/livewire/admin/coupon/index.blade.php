<x-adminlayout>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h2>Coupon</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"> Coupon</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div>
        @include('livewire.admin.coupon.insert')
        <div class="container" style="padding:30px 0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="row">
                                <div class="col-md-10">
                                    <i class="fas fa-list"> All Coupon</i>

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
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}
                                    </div>
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

                                <table class="table table-striped table-bordered">
                                    <thead class=" text-primary">
                                        <th>
                                            S.No
                                        </th>
                                        <th>Coupon Name</th>
                                        <th>Link</th>
                                        <th>Banner Image</th>
                                        <th>
                                            Category
                                        </th>
                                        <th>
                                            Cart Value
                                        </th>
                                        <th>
                                            Off By %
                                        </th>

                        
                                        <th>Flat Off</th>

                                        <th>
                                            status </th>
                                        <th>
                                            Action 1
                                        </th>
                                        <th>
                                            Action 2
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($coupons as $coupon)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{ $coupon->coupon_name ?? '' }}
                                                </td>
                                                <td>
                                                    <a href=" {{ $coupon->link ?? '' }}">link</a>
                                                </td>
                                               <td>
                                                <img width="120px" src="{{ asset('assets/pages/img/coupon/' . $coupon->images ?? '') }}"
                                                alt="">
                                               </td>

                                                <td>

                                                    {{ DB::table('categories')->find($coupon->category_id)->name ?? '' }}

                                                </td>

                                                <td>
                                                    {{ $coupon->min }} - {{ $coupon->max }}
                                                </td>

                                        


                                                <td>
                                                    {{ $coupon->redeem_by_per }}
                                                </td>



                                                <td>
                                                    {{ $coupon->flat_use }}
                                                </td>

                                                <td><a href="{{ route('admin.coupon.status', $coupon->id) }}"
                                                        class="btn @if ($coupon->status == 1) btn-success btn-sm @endif btn-secondary  btn-sm">
                                                        @if ($coupon->status == 1)
                                                            Active
                                                        @else
                                                            Deactive
                                                        @endif
                                                    </a>
                                                </td>

                                                <td>
                                                    <a href="{{ route('admin.coupon.edit', $coupon->id) }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="#" onclick="delete{{ $coupon->id }}()"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                                <script>
                                                    function delete{{ $coupon->id }}() {
                                                        if (confirm('Are you sure, You want to delete this SubCategory?')) {
                                                            window.location.replace("{{ route('admin.coupon.destroy', $coupon->id) }}")
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
