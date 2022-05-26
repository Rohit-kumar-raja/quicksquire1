<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="review-item clearfix">
                    <div class="review-item-submitted">
                        <h2>Add Review For</h2>

                        <strong>{{$orderItem->product->name}}</strong>
                        <!-- <em>30/12/2013 - 07:37</em> -->
                        <div class="rateit" data-rateit-value="5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                    </div>
                </div>
                <!-- BEGIN FORM-->
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}

                </div>
                @endif
                <form wire:submit.prevent="addReview" action="#" class="reviews-form" role="form">
                    <h2>Write a review</h2>

                    <div class="form-group">
                        <label for="review">Review <span class="require">*</span></label>
                        <textarea class="form-control" rows="8" id="review" wire:model="comment"></textarea>
                    </div>
                    @error('comment')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="email">Rating</label>
                        <input type="range" value="4" step="0.25" id="backing5" wire:model="rating">
                        <div class="rateit" data-rateit-backingfld="#backing5" data-rateit-resetable="false" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                        </div>
                    </div>
                    @error('rating')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="padding-top-20">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>