<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="review-item clearfix">
                    <div class="review-item-submitted">
                        <h2>Add Review For</h2>

                        <strong>{{ $orderItem->product->name }}</strong>
                        <!-- <em>30/12/2013 - 07:37</em> -->
                        <div class="rateit" data-rateit-value="5" data-rateit-ispreset="true"
                            data-rateit-readonly="true"></div>
                    </div>
                </div>
                <!-- BEGIN FORM-->
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}

                    </div>
                @endif
                <form action="{{ route('user.review.add') }}" class="reviews-form" method="POST" role="form">
                   @csrf
                    <h2>Write a review</h2>

                    <div class="form-group">
                        <label for="review">Review <span class="require">*</span></label>
                        <textarea class="form-control" rows="8" name="comment"></textarea>
                    </div>
                    @error('comment')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <input type="hidden" value="{{ $orderItem->id }}" name="order_item_id">
                        <input type="hidden" value="{{ $orderItem->product->id }}" name="product_id">
                        <input type="hidden" value="" id="start_total" name="rating">
                        <div class="font-20 text-warning">
                            <label class="text-success" for="email">Rating</label>
                            <i onclick="star(1)" class="far fa-star"></i>
                            <i onclick="star(2)" class="far fa-star"></i>
                            <i onclick="star(3)" class="far fa-star"></i>
                            <i onclick="star(4)" class="far fa-star"></i>
                            <i onclick="star(5)" class="far fa-star"></i>
                        </div>

                        <div class="rateit" data-rateit-backingfld="#backing5" data-rateit-resetable="false"
                            data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
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

<script>
    function star(star) {
        var add_star = document.getElementsByClassName('fa-star')
      document.getElementById('start_total').value=star
        for (i = 0; i < star; i++) {
            add_star[i].classList.add("fas")
        }
        for (i = 0; i < 5-star; i++) {
            add_star[i+star].classList.remove("fas")
        }
    }
</script>
