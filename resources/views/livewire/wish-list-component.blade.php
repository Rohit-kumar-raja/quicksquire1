<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="#">Store</a></li>
            <li class="active">My Wish List</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-md-3 col-sm-5">

                <!-- <ul class="list-group margin-bottom-25 sidebar-menu">
                    <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Ladies</a></li>
                    <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Kids</a></li>
                    <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Accessories</a></li>
                    <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sports</a></li>
                    <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Brands</a></li>
                    <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Electronics</a></li>
                    <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Home & Garden</a></li>
                    <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Custom Link</a></li>
                </ul> -->
            </div>
            <!-- END SIDEBAR -->

            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-7">
                <h1>My Wish List</h1>
                <div class="goods-page">
                    @if(Cart::instance('wishlist')->content()->count() > 0)
                    <div class="goods-data clearfix">
                        @foreach(Cart::instance('wishlist')->content() as $item)
                        <div class="table-wrapper-responsive">
                            <table summary="Shopping cart">
                                <tr>
                                    <th class="goods-page-image">Image</th>
                                    <th class="goods-page-description">Name</th>
                                    <th class="goods-page-stock">Stock</th>
                                    <th class="goods-page-price" colspan="2">Unit price</th>
                                </tr>
                                <tr>
                                    <td class="goods-page-image">
                                        <a href="{{route('product.details',['slug'=>$item->model->slug])}}"><img src="{{asset('assets/pages/img/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}"></a>
                                    </td>
                                    <td class="goods-page-description">
                                        <h5><a href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a></h5>

                                    </td>
                                    <td class="goods-page-stock">
                                        {{$item->model->stock_status}}
                                    </td>
                                    <td class="goods-page-price">
                                        <strong><span>$</span>{{$item->model->regular_price}}</strong>
                                    </td>

                                    <td class="del-goods-col">
                                        <a href="#" class="btn btn-default add2cart" wire:click.prevent="moveProductFromWishlistToCart('{{$item->rowId}}')">Move
                                            to cart
                                        </a>
                                        <a class="del-goods" href="#" wire:click.prevent="removeFromWishlist({{$item->model->id}})">&nbsp;</a>
                                        <!-- <a class="add-goods" href="javascript:;">&nbsp;</a> -->
                                    </td>
                                </tr>

                            </table>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            <h5>Your wishlist is empty</h5>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>