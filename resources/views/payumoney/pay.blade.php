<x-layout>
    <link rel="stylesheet" href="{{ asset('payumoney/payu.css') }}">

    <div class="payfrom card">
        <div class="main-form position-relative  ">
            <div class="infyom-logo">
                <img src="{{ asset('payumoney/infyom-logo.png') }}" alt="infyom logo">
            </div>
            <div class="text-center mb-4 grp-logo">
                <img src="https://sboxcheckout-static.citruspay.com/web/images/payuBanrding.png" alt="paymoney logo"
                    class="logo">
            </div>
            <br />

            <form action="{{ route('payu.pay') }}" id="payment_form" method="post">
                @csrf
                <div class="row p-5">
                    <!-- Contains information of integration type. Consult to PayU for more details.//-->
                    <input class="form-control" type="hidden" id="udf5" name="udf5" value="PayUBiz_PHP7_Kit" />

                    <div class="dv col-sm-4">
                        <span class="text"><label>Transaction/Order ID:</label></span>
                        <span>
                            <!-- Required - Unique transaction id or order id to identify and match
                   payment with local invoicing. Datatype is Varchar with a limit of 25 char. //-->
                            <input readonly class="form-control" type="text" id="txnid" name="txnid"
                                placeholder="Transaction ID" value="<?php echo 'Txn' . rand(1000000000, 9999999999); ?>" />
                        </span>
                    </div>

                    <div class="dv col-sm-4">
                        <span class="text"><label>Amount:</label></span>
                        <span>
                            <!-- Required - Transaction amount of float type. //-->
                            <input readonly class="form-control" type="text" id="amount" name="amount"
                                placeholder="Amount" value="{{ session('amount') }}" />
                        </span>
                    </div>



                    <div class="dv col-sm-4">
                        <span class="text"><label>First Name:</label></span>
                        <span>
                            <!-- Required - Should contain first name of the consumer. Datatype is Varchar with 60 char limit. //-->
                            <input readonly class="form-control" type="text" id="firstname" name="firstname"
                                placeholder="First Name" value="{{ session('firstname') }}" />
                        </span>
                    </div>

                    <div class="dv col-sm-4">
                        <span class="text"><label>Last Name:</label></span>
                        <span>
                            <!-- Should contain last name of the consumer. Datatype is Varchar with 50 char limit. //-->
                            <input readonly class="form-control" type="text" id="Lastname" name="Lastname"
                                placeholder="Last Name" value="{{ session('lastname') }}" />
                        </span>
                    </div>

                    <div class="dv col-sm-4 d-none ">
                        <span class="text"><label>Zip Code:</label></span>
                        <span>
                            <!-- Datatype is Varchar with 20 char limit only 0-9. //-->
                            <input readonly class="form-control" type="text" id="Zipcode" name="Zipcode"
                                placeholder="Zip Code" value="824125" />
                        </span>
                    </div>

                    <div class="dv col-sm-4">
                        <span class="text"><label>Email ID:</label></span>
                        <span>
                            <!-- Required - An email id in valid email format has to be posted. Datatype is Varchar with 50 char limit. //-->
                            <input readonly class="form-control" type="text" id="email" name="email"
                                placeholder="Email ID" value="{{ session('email') }}" />
                        </span>
                    </div>

                    <div class="dv col-sm-4">
                        <span class="text"><label>Mobile/Cell Number:</label></span>
                        <span>
                            <!-- Required - Datatype is Varchar with 50 char limit and must contain chars 0 to 9 only.
                   This parameter may be used for land line or mobile number as per requirement of the application. //-->
                            <input readonly class="form-control" type="text" id="phone" name="phone"
                                placeholder="Mobile/Cell Number" value="{{ session('phone') }}" />
                        </span>
                    </div>

                    <div class="dv col-sm-4 d-none">
                        <span class="text"><label>Address1:</label></span>
                        <span>
                            <input readonly class="form-control" type="text" id="address1" name="address1"
                                placeholder="Address1" value="{{session('udf2')}}" /></span>
                    </div>

                    <div class="dv col-sm-4 d-none">
                        <span class="text"><label>Address2:</label></span>
                        <span>
                            <input class="form-control" type="text" id="address2" name="address2"
                                placeholder="Address2" value="product2" /></span>
                    </div>

                    <div class="dv col-sm-4 d-none ">
                        <span class="text"><label>City:</label></span>
                        <span>
                            <input class="form-control" type="text" id="city" name="city" placeholder="City"
                                value="" /></span>
                    </div>

                    <div class="dv col-sm-4 d-none">
                        <span class="text"><label>State:</label></span>
                        <span><input class="form-control" type="text" id="state" name="state"
                                placeholder="State" value="" /></span>
                    </div>

                    <div class="dv col-sm-4 d-none">
                        <span class="text"><label>Country:</label></span>
                        <span><input class="form-control" type="text" id="country" name="country"
                                placeholder="Country" value="" /></span>
                    </div>

                    <div class="dv col-sm-4 d-none">
                        <span class="text"><label>PG:</label></span>
                        <span>
                            <!-- Not mandatory but fixed code can be passed to Payment Gateway to show default payment
                   option tab. e.g. NB, CC, DC, CASH, EMI. Refer PDF for more details. //-->
                            <input class="form-control" type="text" id="Pg" name="Pg"
                                placeholder="PG" value="{{session('udf2')}}" />
                        </span>
                    </div>

                    <div class="dv col-sm-12">
                        <span class="text"><label>Product Info:</label></span>
                        <span>
                            <!-- Required - Purchased product/item description or SKUs for future reference.
                   Datatype is Varchar with 100 char limit. //-->
                            <input class="form-control" type="hidden" id="productinfo" name="productinfo"
                                placeholder="Product Info" value="{{session('udf1')}}" />
                            <textarea readonly class="form-control" rows="5" type="text" placeholder="Product Info">{{ session('productinfo') }}</textarea>
                        </span>
                    </div>

                </div>

                <div class="text-center p-3"><input class="btn btn-primary" type="submit" id="btnsubmit"
                        name="btnsubmit" value="Pay" />
                </div>
            </form>
        </div>
    </div>
    <style>
        label {
            margin-top: 10px;
        }
    </style>

</x-layout>
