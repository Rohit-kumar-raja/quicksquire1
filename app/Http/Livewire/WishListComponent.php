<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Exception;
use Illuminate\Support\Facades\DB;
class WishListComponent extends Component
{
    public function removeFromWishlist($product_id)
    {
    dd($product_id);
     
        foreach (Cart::instance('wishlist')->content() as $witem) {
            if ($witem->id == $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emit('wishlist-count-component', 'refreshComponent');
                return redirect()->to('/wishlist');
            }
        }
    }

    public function moveProductFromWishlistToCart($rowId)
    {

        $item = Cart::instance('wishlist')->get($rowId);
        try {
            DB::table('wishlist_product')->where('product_id',$item->id)->delete();
        } catch (Exception $e) {
        }

        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
        $this->emitTo('cart-count-component', 'refreshComponent');
        return  redirect()->route('product.cart');
    }



    public function render()
    {
        return view('livewire.wish-list-component')->layout('layouts.base');
    }
}
