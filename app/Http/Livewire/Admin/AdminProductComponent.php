<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;


class AdminProductComponent extends Component
{
    use WithPagination;

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        // if ($product->image) {
        //     unlink('assets/pages/img/products' . '/' . $product->image);
        // }
        // if ($product->images) {
        //     $images = explode(',', $product->images);
        //     foreach ($images as $image) {
        //         if ($image) {
        //             unlink('assets/pages/img/products' . '/' . $image);
        //         }
        //     }
        // }
        $product->delete();
        session()->flash('message', 'Product Deleted Successfully');
    }
    public function render()
    {
        $products = Product::all();
        return view('livewire.admin.products.admin-product-component', ['products' => $products])->layout('layouts.dashboard');
    }
}
