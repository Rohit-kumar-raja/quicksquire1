<div class="top-cart-block">
    <div class="top-cart-info">
        @if(Cart::instance('cart')->count() > 0)
        <a href="javascript:void(0);" class="top-cart-info-count">{{Cart::count()}}</a>

        <a href="javascript:void(0);" class="top-cart-info-value">{{Cart::subtotal()}}</a>
        @endif
    </div>
    <i class="fa fa-shopping-cart"></i>
    <!-- Cart COntent Start -->
    <div class="top-cart-content-wrapper">
        <div class="top-cart-content">

            <div class="text-right">
                <a href="{{route('product.cart')}}" class="btn btn-success">View Cart</a>
                <a href="{{route('checkout')}}" class="btn btn-primary">Checkout</a>
            </div>
        </div>
    </div>
</div>