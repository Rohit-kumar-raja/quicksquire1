<?php

namespace App\Http\Livewire\User;

use App\Models\OrderItem;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\Component;

class UserReviewComponent extends Component
{
    public $order_item_id;
    public $rating;
    public $comment;
    public $product_id;

    public function mount($order_item_id)
    {
        $this->order_item_id = $order_item_id;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'comment' => 'required',
            'rating' => 'required',
        ]);
    }

    public function addReview( Request $request)
    {
        // $this->validate([
        //     'comment' => 'required',
        //     'rating' => 'required',
        // ]);
        $review = new Review();
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->user_id = Auth::user()->id;
        $review->product_id = $request->product_id;


        $review->order_item_id = $request->order_item_id;
        $review->save();

        $orderItem = OrderItem::find($request->order_item_id);
        $orderItem->rstatus = true;
        $orderItem->save();
        session()->flash('success', 'Review added successfully');
        return redirect()->back();
    }
    public function render()
    {
        $orderItem = OrderItem::find($this->order_item_id);
        return view('livewire.user.user-review-component', ['orderItem' => $orderItem])->layout('layouts.base');
    }
}
