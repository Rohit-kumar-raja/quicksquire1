<div class="container">
    <!-- The Modal -->
    <div class="modal fade" id="myModal32">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Exciting discounts! use coupons</h4>
                    <button type="button" class="close" data-dismiss="modal">&times; </button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img
                                src="{{ asset('assets/pages/img/coupon') }}/{{ $coupons[0]->images }}"
                                alt="{{ $coupons[0]->coupon_name }}" class="img-fluid" width="100%">
                            </div>
                            @foreach ($coupons as $coupon)
                            <div class="carousel-item">
                                <img
                                src="{{ asset('assets/pages/img/coupon') }}/{{ $coupon->images }}"
                                alt="{{ $coupon->coupon_name }}" class="img-fluid">
                            </div>
                            @endforeach

                          


                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>

                </div>

                <!-- Modal footer -->
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal32').modal('show');
    });
</script>