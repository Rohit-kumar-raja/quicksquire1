<!-- Body BEGIN -->
<div>

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
                        <ul class="list-group margin-bottom-25 sidebar-menu">

                            <!-- <li class="list-group-item clearfix dropdown">
                                <a href="#" class="collapsed">
                                    <i class="fa fa-angle-right"></i>
                                    Brands
                                </a>
                                <ul class="dropdown-menu" style="display:block;">
                                    <li class="list-group-item dropdown clearfix active ">
                                        @foreach ($brands as $brand)
<a href="#" class="collapsed"><i class="fa fa-angle-right"></i> {{ $brand->brand_name }} </a>
@endforeach
                                    </li>
                                </ul>
                            </li> -->

                        </ul>
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
                                                    <a href="{{ route('product.category', ['category_slug' => $category->slug, 'scategory_slug' => $scategory->slug]) }}"
                                                        class="collapsed">
                                                        <i class="fa fa-angle-right"></i>
                                                        {{ $scategory->name }}
                                                    </a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    @endif

                                </li>
                            @endforeach
                            <div class="sidebar-filter margin-bottom-25">
                                <h2>Filter</h2>
                                <h3>Availability</h3>
                     

                                <h3>Price <span class="text-info">${{ $min_price }} -
                                        ${{ $max_price }}</span></h3>
                                <div id="slider" wire:ignore></div>
                            </div>

                            <!-- Category for brand Name -->
                    </div>
                    <!-- <ul>
                        @foreach ($brands as $brand)
<li class="list-group-item clearfix dropdown active">
                            
                            <a href="#" class="collapsed">
                                <i class="fa fa-angle-right"></i>
                                {{ $brand->brand_name }}
                            </a>
                        </li>
@endforeach
                    </ul> -->


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
                                    <select class="form-control input-sm" id="number_item">
                                        <option value="24" selected="selected">12</option>
                                        <option value="25">16</option>
                                        <option value="50">18</option>
                                        <option value="75">20</option>
                                        <option value="100">22</option>
                                    </select>
                                </div>
                                <div class="pull-right">
                                    <label class="control-label">Sort&nbsp;By:</label>
                                    <select class="form-control input-sm" id="sort_data" onchange="filter_data()">
                                        <option value="#" selected="selected">Default sorting
                                        </option>
                                        <!-- <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sorting by average rating</option> -->
                                        <option value="date">Sort by new</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>

                                    </select>
                                </div>
                            </div>
                        </div>

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
                                        <div class="pi-price">₨ {{ $product->sale_price }} <strike
                                                class="dull">₨ {{ $product->regular_price }}</strike></div>


                                        <a href="#" class="btn btn-default add2cart"
                                            wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})">Add
                                            to cart
                                        </a>
                                        <div class="product-wish">
                                            @if ($witems->contains($product->id))
                                                <a href="{{route('wishlist.remove',$product->id)}}"
                                                    ><i
                                                        class="fa fa-heart fill-heart"></i></a>
                                            @else
                                            <a href="{{route('wishlist.add',$product->id)}}"
                                                   ><i
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
        <div id="product-pop-up" style="display: none; width: 700px;">
            <div class="product-page product-pop-up">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-3">
                        <div class="product-main-image">
                            <img src="{{ asset('assets/pages/img/products') }}/{{ $product->image }}"
                                alt="{{ $product->name }}" class="img-responsive">
                        </div>
                        <div class="product-other-images">
                            <a href="javascript:;" class="active"><img alt="{{ $product->name }}"
                                    src="{{ asset('assets/pages/img/products') }}/{{ $product->image }}"></a>
                            <a href="javascript:;"><img alt="{{ $product->name }}"
                                    src="{{ asset('assets/pages/img/products') }}/{{ $product->image }}"></a>
                            <a href="javascript:;"><img alt="{{ $product->name }}"
                                    src="{{ asset('assets/pages/img/products') }}/{{ $product->image }}"></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-9">
                        <h2>{{ $product->name }}</h2>
                        <div class="price-availability-block clearfix">
                            <div class="price">
                                <strong><span>₨{{ $product->regular_price }}</span></strong>
                                <em>₨<span>{{ $product->regular_price }}</span></em>
                            </div>
                            <div class="availability">
                                Availability: <strong>{{ $product->status }}</strong>
                            </div>
                        </div>
                        <div class="description">
                            <p>{!! $product->short_description !!}</p>
                        </div>

                        <div class="product-page-cart">
                            <div class="product-quantity">
                                <input id="product-quantity" type="text" value="1" readonly name="product-quantity"
                                    class="form-control input-sm">
                            </div>
                            <button class="btn btn-primary" type="submit">Add to cart</button>
                            <a href="shop-item.html" class="btn btn-default">More details</a>
                        </div>
                    </div>

                    <div class="sticker sticker-sale"></div>
                </div>
            </div>
        </div>
        <div id="product-pop-up" style="display: none; width: 700px;">
            <div class="product-page product-pop-up">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-3">
                        <div class="product-main-image">
                            <img src="assets/pages/img/products/model7.jpg" alt="Cool green dress with red bell"
                                class="img-responsive">
                        </div>
                        <div class="product-other-images">
                            <a href="javascript:;" class="active"><img alt="Berry Lace Dress"
                                    src="assets/pages/img/products/model3.jpg"></a>
                            <a href="javascript:;"><img alt="Berry Lace Dress"
                                    src="assets/pages/img/products/model4.jpg"></a>
                            <a href="javascript:;"><img alt="Berry Lace Dress"
                                    src="assets/pages/img/products/model5.jpg"></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-9">
                        <h2>Cool green dress with red bell</h2>
                        <div class="price-availability-block clearfix">
                            <div class="price">
                                <strong><span>$</span>47.00</strong>
                                <em>$<span>62.00</span></em>
                            </div>
                            <div class="availability">
                                Availability: <strong>In Stock</strong>
                            </div>
                        </div>
                        <div class="description">
                            <p>Lorem ipsum dolor ut sit ame dolore adipiscing elit, sed nonumy nibh sed euismod laoreet
                                dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.</p>
                        </div>
                        <div class="product-page-options">
                            <div class="pull-left">
                                <label class="control-label">Size:</label>
                                <select class="form-control input-sm">
                                    <option>L</option>
                                    <option>M</option>
                                    <option>XL</option>
                                </select>
                            </div>
                            <div class="pull-left">
                                <label class="control-label">Color:</label>
                                <select class="form-control input-sm">
                                    <option>Red</option>
                                    <option>Blue</option>
                                    <option>Black</option>
                                </select>
                            </div>
                        </div>
                        <div class="product-page-cart">
                            <div class="product-quantity">
                                <input id="product-quantity" type="text" value="1" readonly name="product-quantity"
                                    class="form-control input-sm">
                            </div>
                            <a href="#" class="btn btn-default add2cart"
                                wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})">Add
                                to cart
                            </a>
                            <a href="shop-item.html" class="btn btn-default">More details</a>
                        </div>
                    </div>

                    <div class="sticker sticker-sale"></div>
                </div>
            </div>
        </div>


    </body>
    @push('scripts')
        <script>
            function filter_data(data) {
                sort_data = document.getElementById('sort_data').value;
                number_item = document.getElementById('number_item').value;
          window.location.replace( "/" + sort_data + "/" + number_item)
            }



            var slider = document.getElementById('slider')
            noUiSlider.create(slider, {
                start: [1, 1000],
                connect: true,
                range: {
                    'min': 1,
                    'max': 1000
                },
                pips: {
                    mode: 'steps',
                    stepped: 'true',
                    density: 2
                }
            });

            slider.noUiSlider.on('update', function(values) {
                @this.set('min_price', values[0]);
                @this.set('max_price', values[1]);
            });
        </script>
    @endpush
    <!-- END BODY -->
</div>
