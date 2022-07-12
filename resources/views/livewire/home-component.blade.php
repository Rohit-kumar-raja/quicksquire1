<style type="text/css">
    .home-page-slider {
        margin-bottom: 50px;
        margin-top: -23px;
    }

    .product-wish {
        position: absolute;
        top: 2%;
        left: 0;
        right: 5%;
        z-index: 99;
        text-align: right;
        padding-top: 0;
    }

    .product-wish .fa {
        color: #cbcbcb;
        font-size: 32px;
    }

    .product-wish .fa:hover {
        color: #ff7007;
    }

    .fill-heart {
        color: #ff7007 !important;
    }

    .dull {
        color: darkgrey !important;
    }

    .wishlist-mt {
        margin-top: -16px
    }
</style>
<section class="home-page-slider">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-0 m-0">
                <div class="owl-carousel owl-carousel8">
                    @foreach ($banners as $banner)
                        <div>
                            <a href="{{ $banner->link }}" class="slider-item">
                                <img src="{{ asset('assets/pages/img/banners') }}/{{ $banner->image }}"
                                    alt="offer-banners" class="img-fluid">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@include('livewire.offers')

@php
$witems = Cart::instance('wishlist')
    ->content()
    ->pluck('id');

@endphp
<div class="container-fluid">
    <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
    <div class="row margin-bottom-40">
        <!-- BEGIN SALE PRODUCT -->
        <div class="col-md-12 sale-product">
            <h2>New Arrivals</h2>
            <div class="owl-carousel owl-carousel5">

                @foreach ($lproducts as $lproduct)
                    <div class="product-item">


                        <div class="pi-img-wrapper">
                            <a href="{{ route('product.details', ['slug' => $lproduct->slug]) }}">
                                <img src="{{ asset('assets/pages/img/products') }}/{{ $lproduct->image }}"
                                    class="img-responsive" alt="{{ $lproduct->name }}">
                            </a>

                            <div>
                                <a href="{{ asset('assets/pages/img/products') }}/{{ $lproduct->image }}"
                                    class="btn btn-default fancybox-button">Zoom</a>
                                <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                            </div>
                        </div>
                        <h3><a href="{{ route('product.details', ['slug' => $lproduct->slug]) }}">{{ substr($lproduct->name, 0, 35) }}
                            </a></h3>
                        <div class="pi-price">₨ {{ $lproduct->sale_price }} <strike class="dull">₨
                                {{ $lproduct->regular_price }}</strike></div>
                        <?php
                        $discout = (($lproduct->regular_price - $lproduct->sale_price) / $lproduct->regular_price) * 100;
                        ?>
                        <a class="btn btn-default add2cart" href="{{ route('addcart', $lproduct->id) }}">Add
                            to cart
                        </a>
                        <!-- <div class="sticker sticker-sale"></div> -->
                        <div class="product-wish">
                            <div class="row">
                                <div class="col-3 mt-2">
                                    <strong
                                        class=" bg-success text-white p-2">{{ (int) $discout }}%&nbsp;off</strong>
                                </div>
                            </div>

                            <div class="col-9 wishlist-mt">

                            </div>
                            @if ($witems->contains($lproduct->id))
                                <a href="{{ route('wishlist.remove', $lproduct->id) }}"><i
                                        class="fa fa-heart fill-heart"></i></a>
                            @else
                                <a href="{{ route('wishlist.add', $lproduct->id) }}"><i
                                        class="fa fa-heart-o"></i></a>
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
        <!-- END SALE PRODUCT -->
    </div>

    <!-- END SALE PRODUCT & NEW ARRIVALS -->

    <!-- adding carousl banner -->
    <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
    <div class="row margin-bottom-40">
        <!-- BEGIN SALE PRODUCT -->
        <div class="col-md-12 sale-product">
            <h2>Great Offers</h2>
            <div class="owl-carousel owl-carousel6">
                @foreach ($sliderss as $slid)
                    <div>
                        <a class="banner-item" href="{{ $slid->link }}">
                            <img src="{{ asset('assets/pages/img/sliders') }}/{{ $slid->image }}"
                                alt="{{ $slid->title }}" class="img-fluid">
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
<!-- end carousel banner -->


<!-- starting offer cards -->
<div class="row margin-bottom-40 p-5">
    <h2>Find the best Offers</h2>
    <div class="col-md-12 sale-product">

        <div class="owl-carousel owl-carousel7">
            @foreach ($coupons as $coupon)
                <div>
                    <div class="banner-item">
                        <a href="{{ $coupon->link }}"><img
                                src="{{ asset('assets/pages/img/coupon') }}/{{ $coupon->images }}"
                                alt="{{ $coupon->coupon_name }}" class="img-fluid"></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


<!-- end offer cards -->

<!-- Begin shop by category tabs area -->
<section style="margin-bottom: 50px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-tab-page-content">
                    <ul id="myTab" class="nav nav-tabs-home sc5">
                        @foreach ($categories as $key => $category)
                            <li id="li{{ $category->id }}" class="{{ $key == 0 ? 'active' : '' }}"><a
                                    class="single-tab" id="{{ $category->id }}" onclick="tab_control(this.id)"
                                    href="#category_{{ $category->id }}"
                                    data-toggle="tab">{{ $category->name }}</a>
                            </li>
                        @endforeach

                    </ul>
                    <div id="myTabContent" class="tab-content">
                        @foreach ($categories as $key => $category)
                            <div class="tab-pane fade in {{ $key == 0 ? 'active' : '' }}"
                                id="category_{{ $category->id }}">
                                <div class="container-fluid">
                                    <div class="row">

                                        <?php
                                        $c_products = DB::table('products')
                                            ->where('category_id', $category->id)
                                            ->paginate(20);
                                        
                                        ?>
                                        @foreach ($c_products as $c_product)
                                            <div class="col-lg-3 col-6 col-xs-6">
                                                <div class="mobile-card">
                                                    <div class="product-item">
                                                        <div class="pi-img-wrapper">
                                                            <a
                                                                href="{{ route('product.details', ['slug' => $c_product->slug]) }}">
                                                                <img src="{{ asset('assets/pages/img/products') }}/{{ $c_product->image }}"
                                                                    class="img-responsive"
                                                                    alt="{{ $c_product->name }}"> </a>
                                                            <div>
                                                                <a href="{{ asset('assets/pages/img/products') }}/{{ $c_product->image }}"
                                                                    class="btn btn-default fancybox-button">Zoom</a>
                                                                <a href="#product-pop-up"
                                                                    class="btn btn-default fancybox-fast-view">View</a>
                                                            </div>
                                                        </div>
                                                        <h3><a
                                                                href="{{ route('product.details', ['slug' => $c_product->slug]) }}">{{ substr($c_product->name, 0, 50) }}</a>
                                                        </h3>
                                                        <div class="pi-price">₨ {{ $c_product->sale_price }}
                                                            <strike class="dull">₨
                                                                {{ $c_product->regular_price }}</strike>
                                                        </div>
                                                        <?php
                                                        $discout = (($c_product->regular_price - $c_product->sale_price) / $c_product->regular_price) * 100;
                                                        ?>
                                                        <a class="btn btn-default add2cart"
                                                            href="{{ route('addcart', $c_product->id) }}">Add
                                                            to cart
                                                        </a>
                                                        {{-- wishlist start --}}
                                                        <div class="product-wish">
                                                            <div class="row">
                                                                <div class="col-3 mt-2">
                                                                    <strong
                                                                        class=" bg-success text-white p-2">{{ (int) $discout }}%&nbsp;off</strong>
                                                                </div>
                                                            </div>

                                                            <div class="col-9 wishlist-mt">

                                                            </div>
                                                            @if ($witems->contains($c_product->id))
                                                                <a
                                                                    href="{{ route('wishlist.remove', $c_product->id) }}"><i
                                                                        class="fa fa-heart fill-heart"></i></a>
                                                            @else
                                                                <a
                                                                    href="{{ route('wishlist.add', $c_product->id) }}"><i
                                                                        class="fa fa-heart-o"></i></a>
                                                            @endif
                                                        </div>
                                                        {{-- wishlist end --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="p-4 text-center "> <a class="btn btn-primary "
                                            href="/product-category/{{ strtolower($category->name) }}"> See all
                                            Products </a> </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="brands">
        <div class="container-fluid">

            <div class="owl-carousel owl-carousel6-brands">
                @foreach ($sliders as $slide)
                    <a href="/search?search={{ $slide->title }}"><img
                            src="{{ asset('assets/pages/img/brands') }}/{{ $slide->image }}"
                            alt="{{ $slide->title }}" title="{{ $slide->title }}"></a>
                @endforeach
            </div>
        </div>

    </div>


</section>


</div>

<script>
    function tab_control(data) {
        //console.log(data);
        sessionStorage.setItem("tab_id", data);
    }

    var single_tab = document.getElementsByClassName('single-tab');
    for (i = 0; i < single_tab.length; i++) {

        if (single_tab[i].id == sessionStorage.getItem('tab_id')) {
            console.log(single_tab[i].id);

            document.getElementsByClassName('single-tab')[i].setAttribute("aria-expanded", 'true');

            document.getElementById('li' + single_tab[i].id).classList.add("active");
            document.getElementById('category_' + single_tab[i].id).classList.add("active");
            document.getElementById('category_' + single_tab[i].id).classList.add("in");


        } else {
            document.getElementById('li' + single_tab[i].id).classList.remove("active");
            document.getElementsByClassName('single-tab')[i].setAttribute("aria-expanded", 'false');
            document.getElementById('category_' + single_tab[i].id).classList.remove("active");
            document.getElementById('category_' + single_tab[i].id).classList.remove("in");

        }
    }
    if (sessionStorage.getItem('tab_id') == null) {
        document.getElementsByClassName('single-tab')[0].setAttribute("aria-expanded", 'true');

        document.getElementById('li' + single_tab[0].id).classList.add("active");
        document.getElementById('category_' + single_tab[0].id).classList.add("active");
        document.getElementById('category_' + single_tab[0].id).classList.add("in");

    }
</script>
