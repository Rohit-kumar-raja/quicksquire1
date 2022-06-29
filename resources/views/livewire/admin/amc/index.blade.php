<x-adminlayout>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h2>amc</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"> Amc</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div>
        @include('livewire.admin.amc.insert')
        <div class="container" style="padding:30px 0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="row">
                                <div class="col-md-10">
                                    <i class="fas fa-list"> All Amc</i>

                                </div>
                            
                            </div>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

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
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Bill</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Dealar name</th>
                                            <th>Duration</th>
                                            <th>Date</th>
                                            <th>item_type</th>
                                            <th>purchase_year</th>
                                            <th>item_category</th>
                                            <th>brand_name</th>
                                            <th>package_name</th>
                                            <th>qty</th>
                                            <th>basic_price</th>
                                            <th>gst</th>
                                            <th>tot_amt</th>
                                            <th>Address/Others</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $amc)
                                            <!-- Button trigger modal -->


                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter{{ $amc->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">
                                                                Address</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            PinCode : {{ $amc->pin_code }}
                                                            <hr>
                                                            City : {{ $amc->city1 }}
                                                          <hr>
                                                            State : {{ $amc->state1 }}
                                                            <hr>
                                                            Address : {{ $amc->address }}
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5>Payment Details</h5>
                                                            <hr>
                                                            Payment Option : {{ $amc->payment_option }}
                                                            <hr>
                                                            Payment Remarks : {{ $amc->payment_remarks }}
                                                            <hr>
                                                         
                                                        </div>
                                                      
                                                    </div>
                                                </div>
                                            </div>



                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><iframe src="{{ asset('assets/pages/img/amcs') }}/{{ $amc->image }}"
                                                        width="100"> </iframe></td>
                                                <td>{{ $amc->customer_name }}</td>
                                                <td>{{ $amc->mob_no }}</td>
                                                <td>{{ $amc->email }}</td>
                                                <td>{{ $amc->dealer_name }} </td>
                                                <td>{{ $amc->no_year }} Year</td>
                                                <td>{{ $amc->sale_dt }}</td>

                                                <td>{{ $amc->item_type }}</td>
                                                <td>{{ $amc->purchase_year }}</td>
                                                <td>{{ $amc->item_category }}</td>
                                                <td>{{ $amc->brand_name }}</td>
                                                <td>{{ $amc->package_name }}</td>
                                                <td>{{ $amc->qty }}</td>
                                                <td>{{ $amc->basic_price }}</td>
                                                <td>{{ $amc->gstamt }}</td>
                                                <td>{{ $amc->tot_amt }}</td>

                                                <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#exampleModalCenter{{ $amc->id }}">
                                                        <i class="fas fa-eye" aria-hidden="true"></i>
                                                    </button></td>


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
