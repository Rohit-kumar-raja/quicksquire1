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
                        <h1>Buy AMC Now</h1>
                        <div class="content-page">
                            <!--<p><img src="{{ asset('assets/pages/img/img1.jpg') }}" alt="About us"-->
                            <!--        class="img-responsive">-->
                            <!--</p>-->
                            <h2>QSIPL Terms of use</h2>

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
                            <form method="POST" action="{{ route('amc.package.buy') }}" name="frmForm"
                                enctype="multipart/form-data" id="frmForm">
                                @csrf
                                <input required type="hidden" name="dealer_name" id="txtDealerName" value="web">
                                <input required type="hidden" name="staffid" id="txtDealerName"
                                    value="prince range {{ $data->price_from }} -  {{ $data->proce_to }}">

                                <div class="card un-color">
                                    <h5 class="card-title ml-5  text-white"> Basic Details for package buy </h5>
                                </div>
                                <div class="row">

                                    <div class="col-sm-4">
                                        <label for="txtPackageName">Package Name</label>
                                        <input required type="text" value="{{ $data->package_name }}"
                                            class="form-control" name="package_name" readonly required>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="txtPriceRange">Price Range</label>
                                        <input type="text" class="form-control"
                                            value="{{ $data->price_from }} -  {{ $data->proce_to }}"
                                            id="txtPriceRange" value="" readonly="">
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="txtDate">Date</label>
                                        <input required readonly type="date" value="{{ date('Y-m-d') }}"
                                            class="form-control " id="txtDate" name="sale_dt" value="27-06-2022"
                                            autocomplete="off">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="txtItemType"> Select Product </label>
                                        <select onchange="chengeOrder(this.value)" class="form-control" name="item_type"
                                            id="txtItemType">
                                            <option disabled selected="">--Select--</option>
                                            @foreach ($orders as $order)
                                                @php
                                                    $order_item = DB::table('order_items')
                                                        ->where('order_id', $order->id ?? '')
                                                        ->get();
                                                @endphp
                                                @foreach ($order_item as $item)
                                                    @php
                                                        $order_item_p = DB::table('products')
                                                            ->where('sale_price', '>', '10000')
                                                            ->find($item->product_id ?? '');
                                                    @endphp
                                                    @if ($order_item_p != '')
                                                        <option value="{{ $order->id ?? '' }}">
                                                            {{ $order_item_p->name ?? '' }}
                                                    </option>
                                                @endif
                                                @endforeach

                                            @endforeach
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="orderid">Order id</label>
                                        <input required type="text" class="form-control" id="orderid"
                                            name="orderid" placeholder="Enter your product order id" autocomplete="off">
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="purchase_year">Purchase Year</label>
                                        <input required type="date" class="form-control" id="purchase_year"
                                            name="purchase_year" autocomplete="off">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="cat_name">Item Category</label>
                                        <select class="form-control" name="item_category" id="cat_name">
                                            <option disabled>--Select--</option>
                                            <option value="Laptop">Laptop</option>
                                            <option value="Desktop">Desktop</option>
                                            <option value="Assembled Pc">Assembled Pc</option>
                                            <option value="Gaming PC">Gaming PC</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="brand_name">Brand Name</label>
                                        <select class="form-control" name="brand_name" id="brand_name">
                                            <option disabled>- Select -</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->brandname }}">{{ $brand->brandname }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="txtItemDescription">Item
                                            Description</label>
                                        <textarea class="form-control " id="txtItemDescription" name="item_description" rows="3"></textarea>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="txtYrofAMC">Year of AMC</label>
                                        <select aria-readonly="true" class="form-control" name="no_year"
                                            id="txtYrofAMC">
                                            <option value="{{ $data->duration }}">{{ $data->duration }} Year
                                            </option>

                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="txtQTY">QTY</label>
                                        <input readonly required value="1" type="text" class="form-control "
                                            id="txtQTY" name="qty" onkeyup="calcu()">
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="txtPrice">Price</label>
                                        <input required value="{{ $data->basic_price }}" type="text"
                                            class="form-control " id="txtPrice" name="basic_price"
                                            onchange="calcu()" value="" readonly="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="txtGST">GST</label>
                                        <input required type="text" class="form-control " value="18"
                                            id="txtGST" name="gst" onchange="calcu()" value=""
                                            readonly="">
                                    </div>


                                    <div class="col-sm-4">
                                        <label for="txtGSTAmt">GST Amount</label>
                                        <input required type="text" class="form-control"
                                            value="{{ $data->total_price - $data->basic_price }}" id="txtGSTAmt"
                                            name="gstamt" readonly="">
                                    </div>


                                    <div class="col-sm-4">
                                        <label for="txtTotAmt">Total Amt</label>
                                        <input required type="text" class="form-control " id="txtTotAmt"
                                            name="tot_amt" readonly="">
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="txtRemarks">Remarks</label>
                                        <textarea class="form-control " id="txtRemarks" name="remarks" rows="3"></textarea>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="txtCustomerName">Customer Name</label>
                                        <input required readonly value="{{ Auth::user()->name }}" type="text"
                                            class="form-control " id="txtCustomerName" name="customer_name">
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="txtMobileNo">Mobile No.</label>
                                        <input required readonly value="{{ Auth::user()->phone }}" type="text"
                                            class="form-control " maxlength="10" id="txtMobileNo" name="mob_no">
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="txtEMail">E-Mail</label>
                                        <input required readonly value="{{ Auth::user()->email }}" type="email"
                                            class="form-control " id="txtEMail" name="email">
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="txtAddress">Address</label>
                                        <input required type="text" class="form-control " id="txtAddress"
                                            name="address">
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="txtPinCode">Pin Code</label>
                                        <input required type="text" class="form-control " id="pin_code"
                                            name="pin_code">
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="txtCity">City</label>
                                        <input required type="text" class="form-control " id="txtCity"
                                            name="city1">
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="txtState">State</label>
                                        <input required type="text" class="form-control " id="txtState"
                                            name="state1">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="txtState">Orignal Bill </label>
                                        <input accept="application/pdf" required type="file"
                                            title="Product orignal bill" class="form-control " id="txtState"
                                            name="image">
                                    </div>

                                </div>
                                <div class="col-md-12 mt-5 ">
                                    <label for="terms">
                                        <input required type="checkbox" name="" id="terms"
                                            required=""> &nbsp;
                                        Accept our all <a href="" class="text-un" data-toggle="modal"
                                            data-target="#exampleModal">Terms &amp; Conditions</a>
                                    </label>
                                </div>
                                <div class=" text-center">


                                    <button type="submit" class="btn btn-success">&nbsp; &nbsp;
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


            function chengeOrder(data) {
                if (data != 'others') {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        var object_data = JSON.parse(this.responseText)

                        document.getElementById('orderid').value = 'ORD00000' + object_data.id
                        document.getElementById('orderid').setAttribute('readonly', true);
                        document.getElementById('purchase_year').value = object_data.created_at;
                        document.getElementById('purchase_year').setAttribute('readonly', true);
                        document.getElementById('cat_name').getElementsByTagName('option')[0].value = object_data.cat_name
                        document.getElementById('cat_name').setAttribute('readonly', true);
                        document.getElementById('brand_name').getElementsByTagName('option')[0].value = object_data.brand
                        document.getElementById('brand_name').setAttribute('readonly', true);

                    }
                    xmlhttp.open("GET", "/amc/packages/order/" + data);
                    xmlhttp.send();
                } else {
                    document.getElementById('orderid').removeAttribute('readonly', true);
                    document.getElementById('purchase_year').removeAttribute('readonly', true);
                    document.getElementById('cat_name').removeAttribute('readonly', true);
                    document.getElementById('brand_name').removeAttribute('readonly', true);

                }
            }
        </script>
    </body>
    <!-- END BODY -->
</x-guest-layout>
