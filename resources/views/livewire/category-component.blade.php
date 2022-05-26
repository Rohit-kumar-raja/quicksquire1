<!-- Body BEGIN -->
<style>
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

<body class="ecommerce">

    <div class="title-wrapper">
        <div class="container">
            <div class="container-inner">
                <h1><span>#</span> CATEGORY</h1>
                <em>Over 4000 Items are available here</em>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="#">Product Category</a></li>
                <li class="active">{{ $category_name }}</li>
            </ul>
            <div class="row">
                <div class="col-lg-12"></div>
            </div>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-md-3 col-sm-5">
                    <ul class="list-group margin-bottom-25 sidebar-menu">
                        @foreach ($categories as $category)
                            <li
                                class="list-group-item clearfix dropdown {{ count($category->subCategories) > 0 ? 'has-child-cate' : '' }} ">
                                <a href="{{ route('product.category', ['category_slug' => $category->slug]) }}"
                                    class="collapsed">
                                    <i class="fa fa-angle-right"></i>
                                    {{ $category->name }}
                                </a>
                                @if (count($category->subCategories) > 0)
                                    <ul class="dropdown-menu">
                                        @foreach ($category->subCategories as $scategory)
                                            <li class="list-group-item clearfix dropdown">
                                                <a
                                                    href="{{ route('product.category', ['category_slug' => $category->slug, 'scategory_slug' => $scategory->slug]) }}">
                                                    <i class="fa fa-angle-right"></i>
                                                    {{ $scategory->name }}
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                @endif
                                <!-- <ul class="dropdown-menu" style="display:block;">
                                    <li class="list-group-item dropdown clearfix active {{ count($category->subCategories) > 0 ? 'has-child-cate' : '' }}">
                                        @if (count($category->subCategories) > 0)
@foreach ($category->subCategories as $scategory)
<a href="{{ route('product.category', ['category_slug' => $category->slug, 'scategory_slug' => $scategory->slug]) }}" class="collapsed"><i class="fa fa-angle-right"></i> {{ $scategory->name }} </a>
@endforeach
@endif
                                    </li>
                                </ul> -->
                            </li>
                        @endforeach

                        <div class="sidebar-filter margin-bottom-25">
                            <h2>Filter</h2>
                            <h3>Availability</h3>
                            <div class="checkbox-list">
                                <label><input type="checkbox"> Not Available (3)</label>
                                <label><input type="checkbox"> In Stock (26)</label>
                            </div>

                            <h3>Price <span class="text-info"></span></h3>
                            <div id="slider" wire:ignore></div>
                        </div>
                </div>

                <!-- <div class="sidebar-products clearfix">
                        <h2>Bestsellers</h2>
                        <div class="item">
                            <a href="shop-item.php"><img src="{{ asset('assets/pages/img/products/k1.jpg') }}" alt="Some Shoes in Animal with Cut Out"></a>
                            <h3><a href="shop-item.php">Some Shoes in Animal with Cut Out</a></h3>
                            <div class="price">$31.00</div>
                        </div>
                        <div class="item">
                            <a href="shop-item.php"><img src="assets/pages/img/products/k4.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                            <h3><a href="shop-item.php">Some Shoes in Animal with Cut Out</a></h3>
                            <div class="price">$23.00</div>
                        </div>
                        <div class="item">
                            <a href="shop-item.php"><img src="assets/pages/img/products/k3.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                            <h3><a href="shop-item.php">Some Shoes in Animal with Cut Out</a></h3>
                            <div class="price">$86.00</div>
                        </div>
                    </div> -->

                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->

                @php
                    $witems = Cart::instance('wishlist')
                        ->content()
                        ->pluck('id');
                    
                @endphp
                <div class="col-md-9 col-sm-7">
                    <div class="row list-view-sorting clearfix">
                        <div class="col-md-2 col-sm-2 list-view">
                            <a href="javascript:;"><i class="fa fa-th-large"></i></a>
                            <a href="javascript:;"><i class="fa fa-th-list"></i></a>
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="pull-right">
                                <label class="control-label">Show:</label>
                                <select id="item" class="form-control input-sm text-capitalize"
                                    onchange="filter_change()">
                                    <option value="12" selected="selected">12</option>
                                    @if (Session::has('pagesize'))
                                        <option value="{{ session('pagesize') }}">{{ session('pagesize') }}
                                        </option>
                                    @endif
                                    <option value="12">12</option>
                                    <option value="24">24</option>
                                    <option value="48">48</option>
                                    <option value="96">96</option>
                                    <option value="200">200</option>
                                </select>
                            </div>
                            <div class="pull-right">
                                <label class="control-label">Sort&nbsp;By:</label>
                                <select id="sorting" class="form-control input-sm text-capitalize"
                                    onchange="filter_change()">
                                    @if (Session::has('sorting'))
                                        <option value="{{ session('sorting') }}"> Sort by {{ session('sorting') }}
                                        </option>
                                    @endif
                                    <option value="default">Default sorting </option>
                                    <!-- <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sorting by average rating</option> -->
                                    <option value="new">Sort by new</option>
                                    <option value="low to high">Sort by price: low to high</option>
                                    <option value="high to low">Sort by price: high to low</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- BEGIN PRODUCT LIST -->
                    <div class="row product-list">
                        @foreach ($products as $product)
                            <!-- PRODUCT ITEM START -->
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <div class="product-item">
                                    <div class="pi-img-wrapper">
                                        <img src="{{ asset('assets/pages/img/products') }}/{{ $product->image }}"
                                            class="img-responsive" alt="{{ $product->name }}">
                                        <div>
                                            <a href="{{ asset('assets/pages/img/products') }}/{{ $product->image }}"
                                                class="btn btn-default fancybox-button">Zoom</a>
                                            <a href="#product-pop-up"
                                                class="btn btn-default fancybox-fast-view">View</a>
                                        </div>
                                    </div>
                                    <h3><a
                                            href="{{ route('product.details', ['slug' => $product->slug]) }}">{{ substr($product->name, 0, 40) }}</a>
                                    </h3>
                                    <div class="pi-price">₨ {{ $product->sale_price }} <strike
                                            class="dull">₨ {{ $product->regular_price }}</strike></div>

                                    <?php
                                    $discout = (($product->regular_price - $product->sale_price) / $product->regular_price) * 100;
                                    ?>
                                    <a href="{{ route('addcart', $product->id) }}"
                                        class="btn btn-default add2cart">Add
                                        to cart
                                    </a>

                                    <div class="product-wish">
                                        <div class="row">
                                            <div class="col-3 mt-2">
                                                <strong
                                                    class=" bg-success text-white p-2">{{ (int) $discout }}%&nbsp;off</strong>
                                            </div>
                                        </div>

                                        <div class="col-9 wishlist-mt">

                                        </div>
                                        @if ($witems->contains($product->id))
                                            <a href="{{ route('wishlist.remove', $product->id) }}"><i
                                                    class="fa fa-heart fill-heart"></i></a>
                                        @else
                                            <a href="{{ route('wishlist.add', $product->id) }}"><i
                                                    class="fa fa-heart-o"></i></a>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        @endforeach
                        <!-- PRODUCT ITEM END -->
                    </div>
                    <!-- END PRODUCT LIST -->
                    <!-- BEGIN PAGINATOR -->
                    <div class="row">
                        <!-- <div class="col-md-4 col-sm-4 items-info">Items 1 to 9 of 10 total</div> -->
                        <div class="col-md-8 col-sm-8 pagination pull-right">
                            @if ($products->hasPages())
                                <div class="pagination-wrapper pagination pull-right">
                                    {{ $products->links('pagination::bootstrap-4') }}
                                </div>
                            @endif
                            <!-- <ul class="pagination pull-right">
                                <li><a href="javascript:;">&laquo;</a></li>
                                <li><a href="javascript:;">1</a></li>
                                <li><span>2</span></li>
                                <li><a href="javascript:;">3</a></li>
                                <li><a href="javascript:;">4</a></li>
                                <li><a href="javascript:;">5</a></li>
                                <li><a href="javascript:;">&raquo;</a></li>
                            </ul> -->
                        </div>
                    </div>
                    <!-- END PAGINATOR -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>

    <script>
       function filter_change() {
            var item = document.getElementById('item').value;
            var sorting = document.getElementById('sorting').value;
            window.location.replace(window.location.href + "?sorting=" + sorting + '&pagesize=' + item)
        }
    </script>
</body>
<!-- END BODY -->
