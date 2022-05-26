@if(Cart::instance('wishlist')->count() > 0)
<i class=" fa fa-heart"></i> <span class="index">{{(Cart::instance('wishlist')->count())}} item</span>
@endif
<li><a href="{{route('product.wishlist')}}">My Wishlist</a></li>