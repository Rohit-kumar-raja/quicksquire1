<div>
    <style>
        .choose-payment-methods .payment-method input[type=radio]+span::after {
            content: "\f00c";
            font-family: FontAwesome;
            display: block;
            font-size: 12px;
            top: -1px;
            left: -20px;
            position: absolute;
            opacity: 0;
            filter: alpha(opacity=0);
            color: red !important;
            line-height: 20px;
            font-weight: 400;
        }

    </style>
    <!--main area-->
    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">home</a></li>
                    <li class="item-link"><a href="/shop" class="link">Shop</a></li>
                    <li class="item-link active"><span>Checkout</span></li>
                </ul>
            </div>
            <div class=" main-content-area">
                <form action="{{ route('checkout.placeOrder') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wrap-address-billing">
                                <h3 class="box-title">Billing Address</h3>
                                <div class="billing-address">
                                    <p class="row-in-form">
                                        <label for="fname">first name<span>*</span></label>
                                        <input type="text" name="firstname" placeholder="Your name">
                                        @error('firstname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="lastname">last name<span>*</span></label>
                                        <input type="text" name="lastname" placeholder="Your last name">
                                        @error('lastname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="email">Email Addreess:</label>
                                        <input type="email" name="email" placeholder="Type your email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="mobile">Phone number<span>*</span></label>
                                        <input type="text" name="mobile" placeholder="10 digits format">
                                        @error('mobile')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add">line1:</label>
                                        <input type="text" name="line1" placeholder="Street at apartment number">
                                        @error('line1')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add">line2:</label>
                                        <input type="text" name="add" placeholder="Street at apartment number">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="country">Country<span>*</span></label>
                                        <input type="text" name="country" placeholder="United States">
                                        @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="zipcode">Postcode / ZIP:</label>
                                        <input type="number" name="zipcode" placeholder="Your postal code">
                                        @error('zipcode')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="city">Province<span>*</span></label>
                                        <input type="text" name="province" placeholder="Province">
                                        @error('province')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="city">Town / City<span>*</span></label>
                                        <input type="text" name="city" placeholder="City name">
                                        @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form fill-wife">
                                        <label class="checkbox-field">
                                            <input name="different-add" value="1" type="checkbox">
                                            <span>Ship to a different address?</span>
                                        </label>
                                    </p>
                                </div>
                            </div>

                        </div>
                        @if ($ship_to_different)
                            <div class="col-md-12">
                                <div class="wrap-address-billing">
                                    <h3 class="box-title">Shipping Address</h3>
                                    <div class="billing-address">
                                        <p class="row-in-form">
                                            <label for="fname">first name<span>*</span></label>
                                            <input type="text" name="fname" placeholder="Your name">
                                            @error('s_firstname')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </p>
                                        <p class="row-in-form">
                                            <label for="lname">last name<span>*</span></label>
                                            <input type="text" name="lname" placeholder="Your last name">
                                            @error('s_lastname')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </p>
                                        <p class="row-in-form">
                                            <label for="email">Email Addreess:</label>
                                            <input type="email" name="email" placeholder="Type your email">
                                            @error('s_email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </p>
                                        <p class="row-in-form">
                                            <label for="phone">Phone number<span>*</span></label>
                                            <input type="number" name="phone" placeholder="10 digits format">
                                            @error('s_mobile')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </p>
                                        <p class="row-in-form">
                                            <label for="add">line1:</label>
                                            <input type="text" name="add" placeholder="Street at apartment number">
                                            @error('s_line1')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </p>
                                        <p class="row-in-form">
                                            <label for="add">line2:</label>
                                            <input type="text" name="add" placeholder="Street at apartment number">
                                        </p>
                                        <p class="row-in-form">
                                            <label for="country">Country<span>*</span></label>
                                            <input type="text" name="country" placeholder="United States">
                                            @error('s_country')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </p>
                                        <p class="row-in-form">
                                            <label for="zip-code">Postcode / ZIP:</label>
                                            <input type="number" name="zip-code" placeholder="Your postal code">
                                            @error('s_zipcode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </p>
                                        <p class="row-in-form">
                                            <label for="city">Province<span>*</span></label>
                                            <input type="text" name="province" placeholder="Province">
                                            @error('s_province')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </p>
                                        <p class="row-in-form">
                                            <label for="city">Town / City<span>*</span></label>
                                            <input type="text" name="city" placeholder="City name">
                                            @error('s_city')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="summary summary-checkout">
                        <div class="summary-item payment-method">
                            <h4 class="title-box">Payment Method</h4>
                            <p class="summary-info"><span class="title">Check / Money order</span></p>
                            <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                            <div class="choose-payment-methods">
                                <label class="payment-method">
                                    <input name="paymentmode" id="payment-method-bank" value="cod" type="radio">
                                    <span>Cash On Delivery</span>
                                    <span class="payment-desc">Order Now Pay on Delivery.</span>
                                </label>
                                <label class="payment-method">
                                    <input name="paymentmode" id="payment-method-visa" value="card" type="radio">
                                    <span>Credit / Dedit Card</span>
                                    <span class="payment-desc">There are many variations of passages of Lorem Ipsum
                                        available</span>
                                </label>
                                <label class="payment-method">
                                    <input name="paymentmode" id="paypal" value="paypal" type="radio">
                                    <span>Paypal</span>
                                    <span class="payment-desc">You can pay with your credit</span>
                                    <span class="payment-desc">card if you don't have a paypal account</span>
                                </label>
                                @error('paymentmode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @if (Session::has('checkout'))
                                <p class="summary-info grand-total"><span>Grand Total</span> <span
                                        class="grand-total-price">₨{{ Session::get('checkout')['total'] }}</span></p>
                            @endif
                            <!-- <a href="thankyou.html" class="btn btn-primary">Place order now</a> -->
                            <button type="submit" class="btn btn-primary">Place order now</button>
                        </div>
                        <div class="summary-item shipping-method">
                            <h4 class="title-box f-title">Shipping method</h4>
                            <p class="summary-info"><span class="title">Flat Rate</span></p>
                            <p class="summary-info"><span class="title">Fixed ₨0</span></p>

                        </div>
                    </div>
                </form>
            </div>
            <!--end main content area-->
        </div>
        <!--end container-->
    </main>
    <!--main area-->
</div>
