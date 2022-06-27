<div class="pre-header">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li>

                        <a style="font-size: 23px;font-weight: 900;" class='pop-outin' href=""><i
                                class="fa fa-phone"></i>TollFree: <span>+91 9031200930</span></a>

                    </li>
                    <!-- BEGIN CURRENCIES -->
                    <!--  <li class="shop-currencies">
                        <a href="javascript:void(0);">€</a>
                        <a href="javascript:void(0);">£</a>
                        <a href="javascript:void(0);" class="current">$</a>
                    </li> -->
                    <!-- END CURRENCIES -->
                    <!-- BEGIN LANGS -->

                    <!-- END LANGS -->
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
            <style>
                /* crops animations that exceeds one line area */

                /* subtle zoom to attention and then back */
                .pop-outin {
                    animation: 1s anim-popoutin ease infinite;
                }

                @keyframes anim-popoutin {
                    0% {
                        color: #fff;
                        transform: scale(0);
                        opacity: 0;
                        text-shadow: 0 0 0 rgba(0, 0, 0, 0);
                    }

                    25% {
                        color: red;
                        transform: scale(2);
                        opacity: 1;
                        text-shadow: 3px 10px 5px rgba(0, 0, 0, 0.5);
                    }

                    50% {
                        color: #ffeb00;
                        transform: scale(1);
                        opacity: 1;
                        text-shadow: 1px 0 0 rgba(0, 0, 0, 0);
                    }

                    100% {
                        /* animate nothing to add pause at the end of animation */
                        transform: scale(1);
                        opacity: 1;
                        text-shadow: 1px 0 0 rgba(255, 255, 255, 0);
                    }
                }
            </style>
            <!-- BEGIN TOP BAR MENU -->
            <style>
                span.index {
                    background-color: grey;
                    padding: 0px 4px;
                }

                i.fa.fa-heart {
                    color: red;
                }
            </style>
            <div class="col-md-6 col-sm-6 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                    <!-- <li><a href="#">My Account</a></li> -->
                    @livewire('wishlist-count-component')
                    {{-- <li><a href="/checkout">Checkout</a></li> --}}


                    @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->utype === 'ADM')
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#"
                                        href="javascript:;">
                                        <i class="fas fa-user-cog"></i> ({{ Auth::user()->name }})
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                        <li>
                                            <a href="{{ route('admin.categories') }}">Categories</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.order') }}">All Orders</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.products') }}">All Products</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.homecategories') }}">Manage Home Category</a>
                                        </li>


                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        </li>
                                        <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                            @else
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#"
                                        href="javascript:;">
                                        <i class="fas fa-user-circle"></i> ({{ Auth::user()->name }})
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                        <li><a href="{{ route('user.profile') }}">My Profile</a></li>
                                        <li><a href="{{ route('user.orders') }}">My Orders</a></li>

                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        </li>
                                        <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                            @endif
                        @else
                            <li><a href="{{ route('login') }}">Log In</a></li>


                        @endif
                        @endif


                    </ul>

                </div>
                <!-- END TOP BAR MENU -->

            </div>
        </div>
    </div>
    <!-- END TOP BAR -->


    <!-- BEGIN HEADER -->
    <div class="header">
        <div class="container">
            <a class="site-logo" href="{{ route('index') }}"><img
                    src="{{ asset('assets/corporate/img/logos/qs_full_logo (2).png') }}" alt="Metronic Shop UI"></a>

            <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

            <!-- BEGIN CART -->
            @livewire('cart-count-component')
            <!--END CART -->

            <!-- BEGIN NAVIGATION -->
            <div class="header-navigation">
                <ul>
                    <li>
                        <a href="{{ route('index') }}">Home </a>
                    </li>
                    <li>
                        @livewire('mega-menu-component')
                    </li>
                    <li><a href="{{ route('amc.package') }}">AMC'S</a></li>
                    <li><a href="{{ route('rent') }}">Rent</a></li>
                    <li><a href="https://quicksecureindia.com/product-category/peripherals">Accessories</a></li>
                    <!--<li class="dropdown dropdown100 nav-catalogue">-->
                    <!--    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">-->
                    <!--        Rent-->

                    <!--    </a>-->
                    <!--<ul class="dropdown-menu">-->
                    <!--    <li>-->
                    <!--        <div class="header-navigation-content">-->
                    <!--            <div class="row">-->
                    <!--                <div class="col-md-3 col-sm-4 col-xs-6">-->
                    <!--                    <div class="product-item">-->
                    <!--                        <div class="pi-img-wrapper">-->
                    <!--                            <a href="shop-item.php"><img src="assets/pages/img/products/model4.jpg" class="img-responsive" alt="Berry Lace Dress"></a>-->
                    <!--                        </div>-->
                    <!--                        <h3><a href="shop-item.php">Berry Lace Dress</a></h3>-->
                    <!--                        <div class="pi-price">$29.00</div>-->
                    <!--                        <a href="shop-shopping-cart.php" class="btn btn-default add2cart">Add to cart</a>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--                <div class="col-md-3 col-sm-4 col-xs-6">-->
                    <!--                    <div class="product-item">-->
                    <!--                        <div class="pi-img-wrapper">-->
                    <!--                            <a href="shop-item.php"><img src="assets/pages/img/products/model3.jpg" class="img-responsive" alt="Berry Lace Dress"></a>-->
                    <!--                        </div>-->
                    <!--                        <h3><a href="shop-item.php">Berry Lace Dress</a></h3>-->
                    <!--                        <div class="pi-price">$29.00</div>-->
                    <!--                        <a href="shop-shopping-cart.php" class="btn btn-default add2cart">Add to cart</a>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--                <div class="col-md-3 col-sm-4 col-xs-6">-->
                    <!--                    <div class="product-item">-->
                    <!--                        <div class="pi-img-wrapper">-->
                    <!--                            <a href="shop-item.php"><img src="assets/pages/img/products/model7.jpg" class="img-responsive" alt="Berry Lace Dress"></a>-->
                    <!--                        </div>-->
                    <!--                        <h3><a href="shop-item.php">Berry Lace Dress</a></h3>-->
                    <!--                        <div class="pi-price">$29.00</div>-->
                    <!--                        <a href="shop-shopping-cart.php" class="btn btn-default add2cart">Add to cart</a>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--                <div class="col-md-3 col-sm-4 col-xs-6">-->
                    <!--                    <div class="product-item">-->
                    <!--                        <div class="pi-img-wrapper">-->
                    <!--                            <a href="shop-item.php"><img src="assets/pages/img/products/model4.jpg" class="img-responsive" alt="Berry Lace Dress"></a>-->
                    <!--                        </div>-->
                    <!--                        <h3><a href="shop-item.php">Berry Lace Dress</a></h3>-->
                    <!--                        <div class="pi-price">$29.00</div>-->
                    <!--                        <a href="shop-shopping-cart.php" class="btn btn-default add2cart">Add to cart</a>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </li>-->
                    <!--</ul>-->
                    <!--</li>-->
                    <!--<li class="dropdown">-->
                    <!--    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">-->
                    <!--        Accessories-->

                    <!--    </a>-->

                    <!--<ul class="dropdown-menu">-->
                    <!--    <li class="active"><a href="shop-index.html">Home Default</a></li>-->
                    <!--    <li><a href="shop-index-header-fix.html">Home Header Fixed</a></li>-->
                    <!--    <li><a href="shop-index-light-footer.html">Home Light Footer</a></li>-->
                    <!--    <li><a href="shop-product-list.html">Product List</a></li>-->
                    <!--    <li><a href="shop-search-result.html">Search Result</a></li>-->
                    <!--    <li><a href="shop-item.html">Product Page</a></li>-->
                    <!--    <li><a href="shop-shopping-cart-null.html">Shopping Cart (Null Cart)</a></li>-->
                    <!--    <li><a href="shop-shopping-cart.html">Shopping Cart</a></li>-->
                    <!--    <li><a href="shop-checkout.html">Checkout</a></li>-->
                    <!--    <li><a href="shop-about.html">About</a></li>-->
                    <!--    <li><a href="shop-contacts.html">Contacts</a></li>-->
                    <!--    <li><a href="shop-account.html">My account</a></li>-->
                    <!--    <li><a href="shop-wishlist.html">My Wish List</a></li>-->
                    <!--    <li><a href="shop-goods-compare.html">Product Comparison</a></li>-->
                    <!--    <li><a href="shop-standart-forms.html">Standart Forms</a></li>-->
                    <!--    <li><a href="shop-faq.html">FAQ</a></li>-->
                    <!--    <li><a href="shop-privacy-policy.html">Privacy Policy</a></li>-->
                    <!--    <li><a href="shop-terms-conditions-page.html">Terms &amp; Conditions</a></li>-->
                    <!--</ul>-->
                    <!--</li>-->

                    <!-- BEGIN TOP SEARCH -->
                    @livewire('header-search-component')
                    <!-- END TOP SEARCH -->
                </ul>
            </div>
            <!-- END NAVIGATION -->
        </div>
    </div>
    <!-- Header END -->



    <!-- sticky logih button -->
    <div id="feedback">
        <a href="https://partners.quicksecureindia.com/new-reg/dealer-login.php">Dealer Login</a>
    </div>

    <div id="feedback1" style="margin-top:200px;">
        <a href="https://partners.quicksecureindia.com/new-reg/staff-login.php">AMC Login</a>
    </div>

    <!-- employee login -->
    <div id="popup1" class="overlay">
        <div class="popup">
            <div class="div1" style="background:#fff">

                <a class="close" href="#">×</a>

                <div class="content" id="quickenquire">
                    <h3 style="text-align:center">Dealer Login</h3>
                    <form action="#">
                        <label for="name">User Name</label>
                        <input type="text" id="name" name="name">
                        <label for="email">Password</label>
                        <input type="password" id="email" name="email">

                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>




        </div>
    </div>

    <!-- Amc login -->
    <div id="popup2" class="overlay">
        <div class="popup">
            <div class="div1" style="background:#fff">

                <a class="close" href="#">×</a>

                <div class="content" id="quickenquire">
                    <h3 style="text-align:center">AMC Login</h3>
                    <form action="#">
                        <label for="name">User Name</label>
                        <input type="text" id="name" name="name">
                        <label for="email">Password</label>
                        <input type="password" id="email" name="email">

                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>