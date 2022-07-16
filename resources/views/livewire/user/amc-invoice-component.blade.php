<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<section class="content p-2">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div >
                        <div id="printableArea">
                            <table  class="table table-bordered" >
                                <tbody>
                                    <tr>
                                        <td colspan="6" align="center">
                                            <h3>Quick Secure India Pvt Ltd.</h3>

                                            Holding No-2, Ramdas Bhatta, Main Road
                                            Adjecent to Brajdham Mandir, near Dhobhi Ghat<br>
                                            Bistupur, Jamshedpur-831001, Jharkhand.<br>
                                            <strong>Phone:</strong> [000-000-0000],
                                            <strong>Website:</strong> www.quicksecureindia.com
                                            <hr>

                                        </td>
                                    </tr>



                                    <tr>

                                        <td><strong>AMC Order id </strong></td>
                                        <td><strong>:</strong></td>
                                        <td valign='center'>AMCORD00000{{ $data->id }}</td>

                                        <td><strong>Date </strong></td>
                                        <td><strong>:</strong></td>
                                        <td valign='center'>{{ date('d/m/Y', strtotime($data->sale_dt)) }}</td>

                                    </tr>

                                    <tr>
                                        <td><strong>Purchase Year </strong></td>
                                        <td><strong>:</strong></td>
                                        <td>{{ $data->purchase_year }}</td>
                                        <td><strong>Item Category </strong></td>
                                        <td><strong>:</strong></td>
                                        <td>{{ $data->item_category }}</td>
                                    </tr>

                                    <tr>
                                        <td><strong>Brand Name </strong></td>
                                        <td><strong>:</strong></td>
                                        <td>{{ $data->brand_name }}</td>
                                        <td><strong>Description </strong></td>
                                        <td><strong>:</strong></td>
                                        <td>{{ $data->item_description }}</td>
                                    </tr>

                                    <tr>
                                        <td><strong>Package Name </strong></td>
                                        <td><strong>:</strong></td>
                                        <td>{{ $data->package_name }}</td>
                                        <td><strong>Year for AMC </strong></td>
                                        <td><strong>:</strong></td>
                                        <td>{{ $data->no_year }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>QTY </strong></td>
                                        <td><strong>:</strong></td>
                                        <td>{{ $data->qty }}</td>

                                        <td><strong>Price </strong></td>
                                        <td><strong>:</strong></td>
                                        <td>{{ $data->basic_price }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>GST % </strong></td>
                                        <td><strong>:</strong></td>
                                        <td>{{ $data->gst }}</td>

                                        <td><strong>Total Amount </strong></td>
                                        <td><strong>:</strong></td>
                                        <td>{{ $data->tot_amt }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan='4'>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan='4'>
                                            <h3>Customer Detail</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Customer Name </strong></td>
                                        <td><strong>:</strong></td>
                                        <td>{{ $data->customer_name }}</td>

                                        <td><strong>Contact No. </strong></td>
                                        <td><strong>:</strong></td>
                                        <td>{{ $data->mob_no }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>E-Mail </strong></td>
                                        <td><strong>:</strong></td>
                                        <td>{{ $data->email }}</td>

                                        <td><strong>Address </strong></td>
                                        <td><strong>:</strong></td>
                                        <td>{{ $data->address }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>City </strong></td>
                                        <td><strong>:</strong></td>
                                        <td>{{ $data->city1 }}</td>

                                        <td><strong>State </strong></td>
                                        <td><strong>:</strong></td>
                                        <td>{{ $data->state1 }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Pin Code </strong></td>
                                        <td><strong>:</strong></td>
                                        <td>{{ $data->pin_code }}</td>

                                        <td><strong>Bill Copy </strong></td>
                                        <td><strong>:</strong></td>
                                        <td>
                                            <a href='{{ asset('assets/pages/img/amc') . '/' . $data->image }}'
                                                class='btn btn-success btn-sm' target='_blank'>Download</a>

                                        </td>
                                    </tr>

                                    <tr>

                                      <td colspan="10">
                                          <h5>Payment Details</h5>
                                        <hr>
                                        <div class="row">

                                            <div class="col-sm-4">
                                                Payment Option : {{ $data->payment_option }}
                                            </div>
                                            <div class="col-sm-4">
                                                Payment Remarks : {{ $data->payment_remarks }}
                                            </div>
                                            <hr>



                                            <?php $pay = (object) json_decode($data->payment_attachment); ?>
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
                                      </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <!--<button id="myBtn">Open Modal</button>-->

                        <!-- The Modal -->
                        <div id="myModal" class="modal">

                            <!-- Modal content -->


                        </div>


                   <div class="text-center" id="print">
                    <a href="#" class="btn btn-success btn-sm" onclick="print_form()">Print</a>
                   </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
  function print_form(){
    document.getElementById('print').style.display="none";
    print();
    window.location.reload();
  }
</script>