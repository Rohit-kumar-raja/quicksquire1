<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $coin_gain = 0;
        $cart_amount = 0;
        $cart_amount =  Cart::instance('cart')->subtotal();
        $cart_amount = (int)str_replace(',', '', $cart_amount);
        $coin_values =  DB::table('wallet')->get();
        foreach ($coin_values as $coin_value) {
            $coin_check =   $coin_value->gain_by_per ?? 0;
            if ($coin_check > 0) {
                if ($cart_amount >= $coin_value->min && $cart_amount <= $coin_value->max) {
                    $coin_gain =  $cart_amount *  $coin_value->gain_by_per / 100;
                    $coin_redeem = $cart_amount *  $coin_value->redeem_by_per / 100;
                }
            } else {
                if ($cart_amount >= $coin_value->min && $cart_amount <= $coin_value->max) {
                    $coin_gain = $coin_value->flat_gain ?? 0;
                    $coin_redeem = $coin_value->flat_use ?? 0;
                }
            }
        }
        session(['coin_gain' => $coin_gain, 'coin_use' => $coin_redeem]);


        return view('livewire.cart-component', ['coin_gain' => $coin_gain])->layout('layouts.base');
    }
}
