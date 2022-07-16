<x-layout>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-heading">
                <div class="panel-heading">
                    <h2>All amc's <i class="fas fa-history"></i></h2>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered" id="example">
                        <thead class=" text-primary">
                            <tr>
                                <th>Amc Ordere id</th>
                                <th>Bill</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Order id</th>
                                <th>Dealar name</th>
                                <th>Duration</th>
                                <th>Date</th>
                                <th>item type</th>
                                <th>purchase year</th>
                                <th>item category</th>
                                <th>brand name</th>
                                <th>package name</th>
                                <th>qty</th>
                                <th>basic price</th>
                                <th>gst</th>
                                <th>total Amount</th>
                                <th>Address/Others</th>
                                <th>Invoice</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $amc)
                                <!-- Button trigger modal -->


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter{{ $amc->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    Address</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body ">
                                                <div class="row">
                                                    <div class="col-sm-4 ">
                                                        PinCode : {{ $amc->pin_code }}
                                                    </div>
                                                    <div class="col-sm-4 ">
                                                        City : {{ $amc->city1 }}
                                                    </div>
                                                    <hr>
                                                    <div class="col-sm-4">
                                                        State : {{ $amc->state1 }}
                                                    </div>
                                                    <div class="col-sm-4 ">
                                                        Address : {{ $amc->address }}
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-body">
                                                <h5>Payment Details</h5>
                                                <hr>
                                                <div class="row">

                                                    <div class="col-sm-4">
                                                        Payment Option : {{ $amc->payment_option }}
                                                    </div>
                                                    <div class="col-sm-4">
                                                        Payment Remarks : {{ $amc->payment_remarks }}
                                                    </div>
                                                    <hr>



                                                    <?php $pay = (object) json_decode($amc->payment_attachment); ?>
                                                    <div class="col-sm-4">
                                                        payu id : {{ $pay->mihpayid ?? '' }}
                                                    </div>
                                                    <div class="col-sm-4">
                                                        mode : {{ $pay->mode ?? '' }}

                                                    </div>
                                                    <hr>
                                                    <div class="col-sm-4">
                                                        payment status : {{ $pay->status ?? '' }}
                                                    </div>
                                                    <div class="col-sm-4">
                                                        Transation id : {{ $pay->txnid ?? '' }}

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>



                                <tr>
                                    <td>AMCORD00000{{ $amc->id }}</td>
                                    <td><iframe src="{{ asset('assets/pages/img/amc') }}/{{ $amc->image }}"
                                            width="100"> </iframe></td>
                                    <td>{{ $amc->customer_name }}</td>
                                    <td>{{ $amc->mob_no }}</td>
                                    <td>{{ $amc->email }}</td>
                                    <td>{{ $amc->orderid ?? '' }}</td>

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
                                    <td> <a href="{{ route('amc.package.user.invoice',$amc->id ?? '') }}" class="btn btn-primary"> <i
                                                class="fas fa-print"></i> </a> </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<style>
    th {
        text-transform: capitalize;
    }
</style>
