<style>
    .form-width {
        width: 75px;
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
                <li><a href="#">Store</a></li>
                <li class="active">Product Category</li>
            </ul>

            <div class="row">
                <div class="col-lg-12"></div>
            </div>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-md-3 col-sm-5">
                    <h2>All Category</h2>
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

                            </li>
                        @endforeach
                    </ul>


                    <div class="sidebar-filter margin-bottom-25">
                        <h2>Filter</h2>
                        <h3>Brand</h3>
                        <div class="checkbox-list">
                            @foreach ($brands as $brand)
                                <label><input onclick="filter_change()" value="{{ $brand }}" class="brands"
                                        type="checkbox" @if (in_array($brand, explode(',', session('brand')))) checked @endif>
                                    {{ $brand }} </label>
                            @endforeach
                        </div>

                        {{-- filter featur byes --}}

                        <h3>Feature </h3>
                        <div class="checkbox-list">
                            @foreach ($features as $feature)
                                <label><input onclick="filter_change()" value="{{ $feature }}" class="features"
                                        type="checkbox" @if (in_array($feature, explode(',', session('feature')))) checked @endif>
                                    {{ $feature }} </label>
                            @endforeach
                        </div>

                        {{-- filter feature byes --}}

                        <h3>Price</h3>
                        <p>
                            <label for="amount">Range:</label>
                        <div class="row">
                            <div class="col-4">
                                <input value="{{ session('min_amount') }}" type="text" id="min"
                                    placeholder="Min" class="form-control form-control-sm form-width" name="min">
                            </div>

                            <div class="col-4">
                                <input type="text" value="{{ session('max_amount') }}" id="max"
                                    placeholder="Max" class="form-control form-control-sm form-width" name="max">
                            </div>

                            <div class="col-4">
                                <button onclick="filter_change()" class="btn btn-default">GO</button>
                            </div>
                        </div>
                        </p>
                        <div id="slider-range"></div>
                    </div>
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
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

                                    @if (Session::has('pagesize'))
                                        <option value="{{ session('pagesize') }}">{{ session('pagesize') }}
                                        </option>
                                    @else
                                        <option value="12" selected="selected">12</option>
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
                    <!-- BEGIN PRODUCT LIST -->
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
                    <div class="row product-list">
                        @php
                            $witems = Cart::instance('wishlist')
                                ->content()
                                ->pluck('id');
                            
                        @endphp
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
                                            href="{{ route('product.details', ['slug' => $product->slug]) }}">{{ substr($product->name, 0, 35) }}</a>
                                    </h3>
                                    <div class="pi-price">₨ {{ $product->sale_price }} <strike class="dull">₨
                                            {{ $product->regular_price }}</strike></div>
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
                                    {{ $products->appends(['search' => session('search'), 'pagesize' => '12', 'sorting' => 'asc'])->links('pagination::bootstrap-4') }}
                                </div>
                            @endif

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
            var brand_name = new Array();
            var feature_name = new Array();

            var brand_array = document.getElementsByClassName('brands');
            var feature_array = document.getElementsByClassName('features');

            for (i = 0; i < brand_array.length; i++) {
                if (brand_array[i].checked == true) {
                    brand_name.push(brand_array[i].value)
                }
            }

            for (j = 0; j < feature_array.length; j++) {
                if (feature_array[j].checked == true) {
                    feature_name.push(feature_array[j].value)
                }
            }

            brand_name = brand_name.join(',');
            feature_name = feature_name.join(',');
            var item = document.getElementById('item').value;
            var sorting = document.getElementById('sorting').value;
            var min = document.getElementById('min').value;
            var max = document.getElementById('max').value;
            window.location.replace(window.location.href + '&pagesize=' + item + "&sorting=" + sorting + '&min=' + min +
                '&max=' + max + "&brand=" + brand_name + "&feature=" + feature_name);
        }
    </script>

</body>
<!-- END BODY -->
