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

        .border-right-2 {
            border-right: solid 2px gray;
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
                    <div class="row mb-5 ">
                        <div class="col-sm-6 card ">
                            <div class="summary ">
                                <div class="summary-item payment-method">
                                    <div class="row">
                                        <div class="col-4">
                                            <h4 class="title-box border-right-2 p-4 ">Payment Method</h4>
                                        </div>
                                        <div class="col-8">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h4 class="title-box pt-4  "> <i class="fas fa-coins"></i> Redeem
                                                        Coin <small class="text-success text-capitalize font-14 ">
                                                            Balance - <span
                                                                id="balance_coin">{{ $balance_coin }}</span></small>
                                                    </h4>
                                                </div>
                                                <div class="col-5"> <button type="button"
                                                        onclick="coin_calclulator()"
                                                        class="btn btn-primary btn-sm mt-2">Use Coin</button> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="summary-info"><span class="title"><i class="fas fa-truck"></i> Cash On
                                            Delivery(COD)</span>
                                    </p>
                                    <p class="summary-info"><span class="title"><i class="fas fa-credit-card"></i>
                                            Onlie Payment (Credit Card, Debit Card,
                                            Upi )</span>
                                    </p>
                                    <div class="choose-payment-methods">
                                        <label class="payment-method">
                                            <input name="paymentmode" id="payment-method-bank" value="cod"
                                                type="radio">
                                            <span>Cash On Delivery</span>
                                            <span class="payment-desc">Order Now Pay on Delivery.</span>
                                        </label>

                                        <label class="payment-method">
                                            <input name="paymentmode" id="paypal" value="online" type="radio">
                                            <span>Online</span>
                                            <span class="payment-desc">You can pay with your credit Or Debit card or
                                                UPI</span>
                                        </label>
                                        @error('paymentmode')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @if (Session::has('checkout'))
                                        <span id="coin_use" class="p-3 "> You save using coin : -<span
                                                class="text-success"><span
                                                    id="used_coins">{{ session('coin_use') }}</span> <i
                                                    class="fas fa-coins"></i> </span> </span>
                                        <p class="summary-info grand-total p-3 "><span>Grand Total</span> <span
                                                class="grand-total-price">₨ <span
                                                    id="total_price">{{ Session::get('final_amount_after_coupon') ??  Session::get('checkout')['total'] }}</span>
                                            </span>
                                        </p>
                                    @endif
                                    <!-- <a href="thankyou.html" class="btn btn-primary">Place order now</a> -->
                                    <div class="p-4">
                                        <button type="submit" class="btn btn-primary ">Place order now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card">
                            <div class="summary-item shipping-method">
                                <h4 class="title-box f-title p-4 "> <i class="fa fa-location-arrow"
                                        aria-hidden="true"></i>
                                    Shipping Last Address</h4>
                                @foreach ($address as $add)
                                    <?php $order_id = DB::table('orders')
                                        ->where('firstname', $add->firstname)
                                        ->where('lastname', $add->lastname)
                                        ->where('mobile', $add->mobile)
                                        ->where('email', $add->email)
                                        ->where('line1', $add->line1)
                                        ->where('line2', $add->line2)
                                        ->where('city', $add->city)
                                        ->where('province', $add->province)
                                        ->where('country', $add->country)
                                        ->where('zipcode', $add->zipcode)
                                        ->where('user_id', $add->user_id)
                                        ->first();
                                    ?>
                                    <input id="address" name="address" type="radio"
                                        value="{{ $order_id->id }}">
                                    <input type="hidden" name="coin_on" id="coin_on">
                                    <strong>{{ $add->firstname . ' ' . $add->lastname }}</strong> - <span>
                                        {{ $add->mobile }}</span><br>
                                    <p> &nbsp; &nbsp;
                                        &nbsp;{{ $add->line1 . ' ' . $add->line2 . ' ' . $add->city . ', ' . $add->province . ', ' . $add->country }}-&nbsp;
                                        &nbsp; &nbsp;{{ $add->zipcode }}</p>
                                @endforeach

                            </div>
                        </div>
                    </div>

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
                                    <p class="row-in-form ">
                                        <label class="checkbox-field">
                                            <input onclick="d_address()" class="text-primary" name="different-add"
                                                value="1" type="checkbox">
                                            <span class="text-dark">Ship to a different address?</span>
                                        </label>
                                    </p>
                                </div>
                            </div>

                        </div>

                        <div id="d_address" style="display: none" class="col-md-12">
                            <div class="wrap-address-billing">
                                <h3 class="box-title">Shipping Address</h3>
                                <div class="billing-address">
                                    <p class="row-in-form">

                                        <input type="hidden" name="" id="ship_to_different">

                                        <label for="s_firstname">first name<span>*</span></label>
                                        <input type="text" name="s_firstname" placeholder="Your name">
                                        @error('s_firstname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="s_lastname">last name<span>*</span></label>
                                        <input type="text" name="s_lastname" placeholder="Your last name">
                                        @error('s_lastname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="s_email">Email Addreess:</label>
                                        <input type="email" name="s_email" placeholder="Type your email">
                                        @error('s_email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="s_mobile">Phone number<span>*</span></label>
                                        <input type="number" name="s_mobile" placeholder="10 digits format">
                                        @error('s_mobile')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="s_line1">line1:</label>
                                        <input type="text" name="s_line1"
                                            placeholder="Street at apartment number">
                                        @error('s_line1')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="s_city">line2:</label>
                                        <input type="text" name="s_city"
                                            placeholder="Street at apartment number">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="s_country">Country<span>*</span></label>
                                        <input type="text" name="s_country" placeholder="United States">
                                        @error('s_country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="s_zipcode">Postcode / ZIP:</label>
                                        <input type="number" name="s_zipcode" placeholder="Your postal code">
                                        @error('s_zipcode')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="s_province">Province<span>*</span></label>
                                        <input type="text" name="s_province" placeholder="Province">
                                        @error('s_province')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="s_city">Town / City<span>*</span></label>
                                        <input type="text" name="s_city" placeholder="City name">
                                        @error('s_city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                </div>
                            </div>
                        </div>

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

<script>
   document.getElementById('coin_use').style.display = 'none';
    total_price = document.getElementById('total_price').innerText;

    function coin_calclulator() {
        x = document.getElementById('coin_use')
        balance_coin = document.getElementById('balance_coin').innerText
        used_coins = document.getElementById('used_coins').innerText;
        var remaining_coin = Number(balance_coin) - Number(used_coins);
        if (x.style.display === "none") {
            total_price = total_price.replace(",", "")
            if (remaining_coin > 0) {
                document.getElementById('balance_coin').innerText = remaining_coin;
                document.getElementById('total_price').innerText = Number(total_price) - Number(used_coins);
                document.getElementById('coin_on').value = "yes";
                x.style.display = "block";
            }
        } else {

            balance_coin = document.getElementById('balance_coin').innerText
            used_coins = document.getElementById('used_coins').innerText
            document.getElementById('balance_coin').innerText = Number(balance_coin) + Number(used_coins)
            document.getElementById('total_price').innerText = total_price;
            document.getElementById('coin_on').value = "no";
            x.style.display = "none";
        }
    }


    function d_address() {
        var element = document.getElementById('d_address');
        if (element.style.display == "none") {
            element.style.display = "block"
            document.getElementById('ship_to_different').name = "ship_to_different";
            document.getElementById('ship_to_different').value = "1";

        } else {
            document.getElementById('ship_to_different').name = "";
            document.getElementById('ship_to_different').value = "0";
            element.style.display = "none"

        }
    }
</script>
