<body class="ecommerce">
    <style>
        .bootstrap-touchspin-up,
        .quantity-down {
            display: none !important;

        }
    </style>
    <!-- Header END -->

    <div class="main">
        <div class="container">
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <div id="logo" style="display: none" class="p-4 text-center">
                        <h2>Quick Secure India Pvt Ltd.
                        </h2>
                        <p>Holding No-2, Ramdas Bhatta, Main Road Adjecent to Brajdham Mandir, near Dhobhi Ghat</p>
                        <p> Bistupur, Jamshedpur-831001, Jharkhand.
                        </p>
                        <p> <strong>Phone</strong>: [1800-309-7011], <strong>Website</strong>: www.quicksecureindia.com
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <h1>Shopping cart</h1>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-7"> <input type="text" value="{{session('pincode')}}" id="pincode" name="pincode"
                                        placeholder="Enter pincode" class="form-control form-control-sm"></div>
                                <div class="col-sm-2 mt-1"> <button onclick="btnPincode()"
                                        class="btn btn-sm btn-primary">check</button> </div>
                            </div>
                            <small class="text-success" id="code_data"></small>
                        </div>
                    </div>

                    <div class="goods-page">
                        <div class="goods-data clearfix">
                            <div class="table-wrapper-responsive">
                                @if (Cart::instance('cart')->count() > 0)
                                    <table summary="Shopping cart">
                                        @if (Session::has('success_message'))
                                            <div class="alert alert-success">
                                                <strong>Success</strong>{{ Session::get('success_message') }}
                                            </div>
                                        @endif

                                        @if (Cart::instance('cart')->count() > 0)
                                            <tr>
                                                <th class="goods-page-image">Image</th>
                                                <th class="goods-page-description">Description</th>
                                                {{-- <th class="goods-page-ref-no">SKU</th> --}}
                                                <th class="goods-page-quantity">Quantity</th>
                                                <th class="goods-page-price">Unit price</th>
                                                <th class="goods-page-total" colspan="2">Total</th>
                                            </tr>
                                            @foreach (Cart::instance('cart')->content() as $item)
                                                <tr>
                                                    <td class="goods-page-image">
                                                        <a
                                                            href="{{ route('product.details', ['slug' => $item->model->slug]) }}"><img
                                                                src="{{ asset('assets/pages/img/products') }}/{{ $item->model->image }}"
                                                                alt="{{ $item->model->name }}"></a>
                                                    </td>
                                                    <td class="goods-page-description">
                                                        <h3><a
                                                                href="{{ route('product.details', ['slug' => $item->model->slug]) }}">{{ $item->model->name }}</a>
                                                        </h3>

                                                    </td>
                                                    {{-- <td class="goods-page-ref-no">
                                                        {{ $item->model->SKU }}
                                                    </td> --}}
                                                    <td class="goods-page-quantity">
                                                        <div class="product-quantity">
                                                            <input id="product-quantity" type="text"
                                                                value="{{ $item->qty }}" data-max="100"
                                                                pattern="[0-9]*" readonly
                                                                class="form-control form-control-sm">

                                                            <a href="{{ route('product.decrease', $item->rowId) }}"
                                                                class="decrease me-1 btn-default p-2">
                                                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="{{ route('product.increase', $item->rowId) }}"
                                                                class=" increase btn-default  p-2">
                                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                            </a>
                                                        </div>

                                                    </td>
                                                    <td class="goods-page-price">
                                                        <strong><span>₨</span>{{ $item->price }}</strong>
                                                    </td>
                                                    <td class="goods-page-total">
                                                        <strong><span>₨</span>{{ $item->subtotal }}</strong>
                                                    </td>
                                                    <td class="del-goods-col">
                                                        <a class="del-goods"
                                                            href="{{ route('product.del', $item->rowId) }}"></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                    </table>
                                @else
                                    <div class="text-center" style="padding: 30px 0;">
                                        <h1>Your cart is Empty </h1>
                                        <p>Add items to it now</p>
                                        <a href="{{ route('product.search') }}"
                                            class="btn btn-success text-white">Shop
                                            Now</a>
                                    </div>
                                @endif
                            </div>

                            <div class="shopping-total">
                                <ul>
                                    <li>
                                        <em>Sub total</em>
                                        <strong
                                            class="price"><span>₨</span>{{ Cart::instance('cart')->subtotal() }}</strong>
                                    </li>
                                    <li>
                                        <em>Tax</em>
                                        <!--<strong class="price"><span>₨</span>{{ Cart::instance('cart')->tax() }}</strong>-->
                                        <strong class="price"><span></span><i style="font-size:17px;">All Taxes
                                                included</i></strong>
                                    </li>
                                    <li class="shopping-total-price">
                                        <em>Coin </em>
                                        <?php
                                        
                                        ?>
                                        <strong class="text-success">+{{ $coin_gain }} <i class="fas fa-coins    "></i> </strong>
                                    </li>
                                    <li class="shopping-total-price">
                                        <em>Total</em>
                                        <strong
                                            class="price"><span>₨</span>{{ Cart::instance('cart')->subtotal() }}</strong>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <a class="btn btn-default" href="{{ route('product.search') }}">Continue shopping <i
                                class="fa fa-shopping-cart"></i>
                        </a>
                        @auth
                            <a class="btn-primary print" onclick="print_pdf()" href="#"><img
                                    style="width: 154px; margin-top: -15px;"
                                    src="{{ asset('assets/pages/img/icons/pdf.png') }}" alt="">
                            </a>
                        @else
                            <a class="btn-primary print" href="{{ route('login') }}"><img
                                    style="width: 154px; margin-top: -15px;"
                                    src="{{ asset('assets/pages/img/icons/pdf.png') }}" alt="">
                            </a>
                        @endauth

                        <a href="#" id="checkout1" onclick="checkpincode()" class="btn btn-primary text-white">Checkout
                            <i class="fa fa-check"></i> </a>
                        <small id="checkpincode"></small>

                        <a href="{{ route('checkout') }}" style="display: none" id="checkout"
                            class="btn btn-primary text-white">Checkout <i class="fa fa-check"></i>
                        </a>
                    </div>
                </div>
                <!-- END CONTENT -->
            @else
                <div class="text-center" style="padding: 30px 0;">
                    <h1>Your cart is Empty </h1>
                    <p>Add items to it now</p>
                    <a href="{{ route('product.search') }}" class="btn btn-success text-white">Shop Now</a>
                    @endif
                </div>
            </div>
            </table>
            <!-- END SIDEBAR & CONTENT -->


        </div>
    </div>
    <style>
        @media print {
            a[href]:after {
                content: none !important;
            }
        }
    </style>
    <script>
        function print_pdf() {
            var l = document.getElementsByClassName('increase');

            console.log(l.length);
            for (i = 0; i < l.length; i++) {
                document.getElementsByClassName('increase')[i].style.display = "none";
                document.getElementsByClassName('decrease')[i].style.display = "none";
                document.getElementsByClassName('goods-page-ref-no')[i].style.display = "none";


            }
            document.getElementById('logo').style.display = "block"
            document.getElementsByClassName('header')[0].style.display = "none"
            document.getElementsByClassName('pre-header')[0].style.display = "none"
            document.getElementsByClassName('steps-block ')[0].style.display = "none"
            document.getElementsByClassName('pre-footer')[0].style.display = "none"
            document.getElementsByClassName('footer')[0].style.display = "none"
            document.getElementsByClassName('print')[0].style.display = "none"
            document.getElementsByClassName('pull-right')[1].style.display = "none"
            document.getElementsByClassName('btn')[5].style.display = "none"
            document.getElementsByClassName('btn')[6].style.display = "none"
            document.getElementsByClassName('btn-default')[0].style.display = "none"
            document.getElementsByClassName('btn-default')[1].style.display = "none"
            document.getElementById('feedback').style.display = "none"
            document.getElementById('feedback1').style.display = "none"

            document.getElementsByTagName('th')[2].style.display = "none";
            document.getElementsByTagName('td')[2].style.display = "none";





            print();
            document.getElementById('logo').style.display = "none"

            window.location.reload();
        }

        function reload_data() {
            window.location.reload();
        }

        function btnPincode() {
            pincode = document.getElementById('pincode').value
            if (pincode.length == 6) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    document.getElementById('pincode').style.borderColor = 'green';
                    if (this.responseText == 'no') {
                        document.getElementById('code_data').innerHTML =
                            "<span class='text-danger'>Delivery not Available in this pincode - " + pincode + "</span>";
                        document.getElementById('checkout').style.display = "none";
                        document.getElementById('checkout1').style.display = "block";

                    } else {
                        document.getElementById('code_data').innerHTML = this.responseText;
                        document.getElementById('checkout').style.display = "block";
                        document.getElementById('checkout1').style.display = "none";

                    }
                }
                xmlhttp.open("GET", "{{ route('product.details.pincode') }}/" + pincode);
                xmlhttp.send();
            } else {
                document.getElementById('pincode').style.borderColor = 'red';
            }
            return this.responseText;
        }

        function checkpincode() {
            pincode = document.getElementById('pincode').value
            info = btnPincode(pincode)
            if (pincode.length == 6 && info != 'no') {
                document.getElementById('checkout').style.display = "block";
                document.getElementById('checkout1').style.display = "none";

            } else {
                alert("Please Enter Pincode")
                document.getElementById('checkout').style.display = "none";
                document.getElementById('checkout1').style.display = "block";


            }
        }
    </script>

</body>
