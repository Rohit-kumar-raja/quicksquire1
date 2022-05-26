<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;


class CartComponent extends Component
{


    
    public function increaseQuantity($rowid)
    {
        $product = Cart::instance('cart')->get($rowid);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowid, $qty);
        $this->emit('cart-count-component', 'refreshComponent');
      return redirect()->back();
    }
    public function decreaseQuantity($rowid)
    {
        $product = Cart::instance('cart')->get($rowid);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowid, $qty);
        $this->emit('cart-count-component', 'refreshComponent');
       return redirect()->back();
    }

    public function destroy($rowid)
    {
        Cart::instance('cart')->remove($rowid);
        $this->emit('cart-count-component', 'refreshComponent');
        session()->flash('success_message', 'Item removed from cart');
        return redirect()->route('product.cart');
    }
    public function del($rowid)
    {
        Cart::instance('cart')->remove($rowid);
        $this->emit('cart-count-component', 'refreshComponent');
        session()->flash('success_message', 'Item removed from cart');
        return redirect()->route('product.cart');
    }

    public function checkout()
    {
        if (Auth::check()) {
            return redirect()->route('checkout');
        } else {
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout()
    {
        if (!Cart::instance('cart')->count() > 0) {
            session()->forget('checkout');
            // return redirect()->route('product.cart');
            return;
        }
        if (session()->has('coupon')) {
            session()->put('checkout', [
                'discount' => $this->discount(),
                'subtotal' => $this->subtotalAfterDiscount(),
                'tax' => $this->taxAfterDiscount(),
                'total' => $this->totalAfterDiscount(),
            ]);
        } else {
            session()->put('checkout', [
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total(),
            ]);
        }
    }


    public function render()
    {
        $this->setAmountForCheckout();
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
