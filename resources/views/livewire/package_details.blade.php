<x-guest-layout>




    <!-- Body BEGIN -->
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate-custom.css') }}" />

    <body class="ecommerce ">
        <style>
            .text-red-600 {
                color: red;
            }

            .un-color {
                background-color: #133d81 !important;
                margin-top: 5px
            }

            .card-title {
                margin-top: 10px !important;
                margin-left: 10px !important;
            }

            label {
                margin-top: 10px
            }

            input {
                margin-top: 8px;
            }
        </style>


        <section>
            <div class="container">
                <div class="row margin-bottom-40">
                    <div class="col-md-12">
                        <h1>Terms & Conditions</h1>
                        <div class="content-page">
                            <p><img src="{{ asset('assets/pages/img/img1.jpg') }}" alt="About us"
                                    class="img-responsive">
                            </p>
                            <h2>QSIPL SERVICE</h2>

                            <p>a. Use of QSIPL Services on a Product. To use certain QSIPL Services on a Product, you
                                must have your own QSIPL.in account, be logged in to your account on the Product, and
                                have a valid payment method associated with your account. </p>
                            <br>
                            b. Use of the QSIPL Site. Except as provided in this section, you may use the QSIPL website
                            only on your Product. For additional terms that apply to the QSIPL web site, see the
                            Additional QSIPL terms contained in the quicksecureindia.com Conditions of Use and the terms
                            contained in the Legal section of the Settings menu of the QSIPL Services on your Product or
                            the QSIPL App. QSIPL web site licensed under an open source license is governed solely by
                            the terms of that open source license

                        </div>
                    </div>
                    <!-- END CONTENT -->
                    <!-- starting form -->
                    <div class="col-lg-12">

                        <x-jet-validation-errors class="mb-4" />


                        <div class="card p-3">
                            <form role="form" method="POST" action="insert-amc-data.php" name="frmForm"
                                id="frmForm">

                                <input type="hidden" name="txtDealerName" id="txtDealerName" value="18">

                                <div class="card un-color">
                                    <h5 class="card-title ml-5  text-white"> Basic Details for package buy </h5>
                                </div>




                                <div class="row">

                                    <div class="col-sm-4">
                                        <label for="txtPackageName">Package Name</label>
                                        <input type="text" value="{{ $data->package_name }}" class="form-control"
                                            name="txtPackageName" readonly required>
                                    </div>



                                    <div class="col-sm-4">
                                        <label for="txtPriceRange">Price Range</label>
                                        <input type="text" class="form-control"
                                            value="{{ $data->price_from }} -  {{ $data->proce_to }}"
                                            id="txtPriceRange" name="txtPriceRange" value="" readonly="">
                                    </div>



                                    <div class="col-sm-4">
                                        <label for="txtDate">Date</label>
                                        <input readonly type="date" value="{{ date('Y-m-d') }}"
                                            class="form-control " id="txtDate" name="txtDate" value="27-06-2022"
                                            autocomplete="off">
                                    </div>





                                    <div class="col-sm-4">
                                        <label for="txtItemType">Item Type</label>
                                        <select class="form-control" name="txtItemType" id="txtItemType">
                                            <option value="-" selected="">--Select--</option>
                                            <option value="New">New</option>
                                            <option value="Old">Old</option>
                                        </select>
                                    </div>



                                    <div class="col-sm-4">
                                        <label for="txtPurchaseYear">Purchase Year</label>
                                        <input type="date" class="form-control" id="txtPurchaseYear"
                                            name="txtPurchaseYear" autocomplete="off">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="txtItemCategory">Item Category</label>
                                        <select class="form-control" name="txtItemCategory" id="txtItemCategory">
                                            <option value="-" selected="">--Select--</option>
                                            <option value="Laptop">Laptop</option>
                                            <option value="Desktop">Desktop</option>
                                            <option value="Assembled Pc">Assembled Pc</option>
                                            <option value="Gaming PC">Gaming PC</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="txtBrandName">Brand Name</label>
                                        <select class="form-control" name="" id="txtBrandName">
                                            <option value="NA">- Select -</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->brandname }}</option>
                                            @endforeach

                                        </select>
                                    </div>




                                    <div class="col-sm-4">
                                        <label for="txtItemDescription">Item
                                            Description</label>
                                        <textarea class="form-control " id="txtItemDescription" name="txtItemDescription" rows="3"></textarea>
                                    </div>



                                    <div class="col-sm-4">
                                        <label for="txtYrofAMC">Year of AMC</label>
                                        <select class="form-control" name="txtYrofAMC" id="txtYrofAMC">
                                            <option value="-" selected="">--Select--</option>
                                            <option value="1">1 Yr</option>
                                            <option value="2">2 Yr</option>
                                            <option value="3">3 Yr</option>
                                            <option value="5">5 Yr</option>
                                        </select>
                                    </div>







                                    <div class="col-sm-4">
                                        <label for="txtQTY">QTY</label>
                                        <input type="text" class="form-control " id="txtQTY" name="txtQTY"
                                            onchange="calcu()">
                                    </div>


                                    <div class="col-sm-4">
                                        <label for="txtPrice">Price</label>
                                        <input value="{{ $data->basic_price }}" type="text"
                                            class="form-control " id="txtPrice" name="txtPrice" onchange="calcu()"
                                            value="" readonly="">
                                    </div>







                                    <div class="col-sm-4">
                                        <label for="txtGST">GST</label>
                                        <input type="text" class="form-control " value="18" id="txtGST"
                                            name="txtGST" onchange="calcu()" value="" readonly="">
                                    </div>


                                    <div class="col-sm-4">
                                        <label for="txtGSTAmt">GST Amount</label>
                                        <input type="text" class="form-control"
                                            value="{{ $data->total_price - $data->basic_price }}" id="txtGSTAmt"
                                            name="txtGSTAmt" readonly="">
                                    </div>


                                    <div class="col-sm-4">
                                        <label for="txtTotAmt">Total Amt</label>
                                        <input type="text" class="form-control " id="txtTotAmt" name="txtTotAmt"
                                            readonly="">
                                    </div>







                                    <div class="col-sm-4">
                                        <label for="txtRemarks">Remarks</label>
                                        <textarea class="form-control " id="txtRemarks" name="txtRemarks" rows="3"></textarea>
                                    </div>








                                    <div class="col-sm-4">
                                        <label for="txtCustomerName">Customer Name</label>
                                        <input type="text" class="form-control " id="txtCustomerName"
                                            name="txtCustomerName">
                                    </div>



                                    <div class="col-sm-4">
                                        <label for="txtMobileNo">Mobile No.</label>
                                        <input type="text" class="form-control " id="txtMobileNo"
                                            name="txtMobileNo">
                                    </div>





                                    <div class="col-sm-4">
                                        <label for="txtEMail">E-Mail</label>
                                        <input type="email" class="form-control " id="txtEMail" name="txtEMail">
                                    </div>



                                    <div class="col-sm-4">
                                        <label for="txtAddress">Address</label>
                                        <input type="text" class="form-control " id="txtAddress"
                                            name="txtAddress">
                                    </div>






                                    <div class="col-sm-4">
                                        <label for="txtPinCode">Pin Code</label>
                                        <input type="text" class="form-control " id="txtPinCode"
                                            name="txtPinCode">
                                    </div>



                                    <div class="col-sm-4">
                                        <label for="txtCity">City</label>
                                        <input type="text" class="form-control " id="txtCity" name="txtCity">
                                    </div>


                                    <div class="col-sm-4">
                                        <label for="txtState">State</label>
                                        <input type="text" class="form-control " id="txtState" name="txtState">
                                    </div>

                                </div>
                                <div class="col-md-12 mt-5 ">
                                    <label for="terms">
                                        <input type="checkbox" name="" id="terms" required=""> &nbsp;
                                        Accept our all <a href="" class="text-un" data-toggle="modal"
                                            data-target="#exampleModal">Terms &amp; Conditions</a>
                                    </label>
                                </div>
                                <div class=" text-center">


                                    <button type="submit" name="submit" class="btn btn-success">&nbsp; &nbsp;
                                        Submit
                                        &nbsp; &nbsp;</button>
        
                                </div>
                        </div>
                       
                    </div>
                    </form>
                </div>
            </div>
        </section>

        <script type="text/javascript">
            function calcu() {
                var price1 = document.getElementById("txtPrice").value;
                var gstper = document.getElementById("txtGST").value;

                var qt = document.getElementById("txtQTY").value;

                if (document.getElementById("txtQTY").value == "") {
                    qt = 0;
                }

                if (document.getElementById("txtGST").value == "") {
                    gstper = 0;
                }

                var amt = price1 * qt;
                var gstamt = (amt * gstper) / 100;

                document.getElementById("txtGSTAmt").value = gstamt;
                document.getElementById("txtTotAmt").value = (+amt) + (+gstamt);
            }
        </script>
    </body>
    <!-- END BODY -->
</x-guest-layout>
