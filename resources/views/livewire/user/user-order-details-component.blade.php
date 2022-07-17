<div>
    <style>
        .custom {
            font-weight: 700;
            color: blue !important;
            text-decoration: underline;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Ordered Details
                            </div>
                            <div class="col-md-6">
                                <div class="pull-right">
                                    <a href="{{ route('user.orders') }}" class="btn btn-info btn-sm">My Orders</a>
                                    <!-- Button trigger modal -->
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle"> Why cancel this
                                                        product </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('user.order.cancel') }}" method="POST">

                                                    <div class="modal-body">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $order->id }}">
                                                        <textarea name="remark" id="remark" cols="30" rows="10" placeholder="Add remark why cancel the product"></textarea>
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="submit"
                                                            class="btn btn-primary btn-sm ">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end Modal --}}
                                    @if ($order->status == 'ordered')
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModalCenter">
                                            Cancel Order
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table bg-info">
                            <th>Order ID</th>
                            <td>ODR00000{{ $order->id }}</td>
                            <th>Order Date</th>
                            <td>{{ $order->created_at }}</td>
                            <th>Status</th>
                            <td><span class="bg-success">{{ $order->status }}</span></td>
                            @if ($order->status == 'delivered')
                                <th>Delivered Date</th>
                                <td>{{ $order->delivered_date }}</td>
                            @elseif($order->status == 'canceled')
                                <th>Canceled Date</th>
                                <td><span class="bg-danger">{{ $order->canceled_date }}</span></td>
                            @endif
                        </table>
                        @if ($order->traking_id != '')
                            <p> Tranking Id : {{ $order->traking_id }}</p>
                            <p> Consignment No : {{ $order->consignment_name }}</p>
                            <p> Consignment Url : <a href="{{ $order->consignment_url }}">{{ $order->consignment_url }}</a> </p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">
                        <div class="main">
                            <div class="container">
                                <!-- BEGIN SIDEBAR & CONTENT -->
                                <div class="row margin-bottom-40">
                                    <!-- BEGIN CONTENT -->
                                    <div id="logo" style="display: none" class="p-4 text-center">

                                        <h2>Quick Secure India Pvt Ltd.
                                        </h2>
                                        <p>Holding No-2, Ramdas Bhatta, Main Road Adjecent to Brajdham Mandir, near
                                            Dhobhi Ghat</p>
                                        <p> Bistupur, Jamshedpur-831001, Jharkhand.
                                        </p>
                                        <p> <strong>Phone</strong>: [1800-309-7011], <strong>Website</strong>:
                                            www.quicksecureindia.com</p>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">

                                    <h1>Shopping Details</h1>
                                    <div class="goods-page">
                                        <div class="goods-data clearfix">
                                            <div class="table-wrapper-responsive">
                                                <table summary="Shopping cart">
                                                    <tr>
                                                        <th class="goods-page-image">Image</th>
                                                        <th class="goods-page-description">Description</th>
                                                        <th class="goods-page-quantity">Quantity</th>
                                                        <th class="goods-page-price">Unit price</th>
                                                        <th class="goods-page-total" colspan="2">Total</th>

                                                    </tr>
                                                    @foreach ($order->orderItems as $item)
                                                        <tr>
                                                            <td class="goods-page-image">
                                                                <a
                                                                    href="{{ route('product.details', ['slug' => $item->product->slug]) }}"><img
                                                                        src="{{ asset('assets/pages/img/products') }}/{{ $item->product->image }}"
                                                                        alt="{{ $item->product->name }}"></a>
                                                            </td>
                                                            <td class="goods-page-description">
                                                                <h3><a
                                                                        href="{{ route('product.details', ['slug' => $item->product->slug]) }}">{{ $item->product->name }}</a>
                                                                </h3>

                                                            </td>
                                                            <!-- <td class="goods-page-ref-no">
                                                                {{ $item->product->SKU }}
                                                            </td> -->
                                                            <td class="goods-page-quantity">
                                                                <div class="product-quantity">
                                                                    <h5>{{ $item->quantity }}</h5>

                                                                    <!-- <input id="product-quantity" type="text" value="{{ $item->qty }}" data-max="100" pattern="[0-9]*" readonly class="form-control input-sm"> -->
                                                                    <!-- <a href="#" class=" btn quantity-up" wire:click.prevent="increaseQuantity('{{ $item->rowId }}')">+</a>
                                                <a href="#" class="btn btn-increase" wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')">-</a> -->
                                                                </div>

                                                            </td>
                                                            <td class="goods-page-price">
                                                                <strong><span>₨</span>{{ 'Inclusive all taxes' $item->price }}</strong>
                                                            </td>
                                                            <td class="goods-page-total">
                                                                <strong><span>₨</span>{{ $item->price * $item->quantity }}</strong>
                                                            </td>
                                                            @if ($order->status == 'delivered' && $item->rstatus == false)
                                                                <td class="">
                                                                    <strong><span></span>
                                                                        <a href="{{ route('user.review', ['order_item_id' => $item->id]) }}"
                                                                            class="custom">Write Review</a>
                                                                    </strong>
                                                                </td>
                                                            @endif

                                                        </tr>
                                                    @endforeach
                                                </table>


                                            </div>
                                            @php
                                                $rewards = DB::table('coin')
                                                    ->where('order_id', $order->id)
                                                    ->first();
                                            @endphp
                                            <div class="summary">
                                                <div class="order-summary">
                                                    <h4 class="title-box">Order Summary</h4>
                                                    <p class="summary-info"><span class="title">Subtotal</span> <b
                                                            class="index">Rs{{ $order->subtotal }}</b>
                                                    </p>
                                                    <p class="summary-info"><span class="title">Tax</span> <b
                                                            class="index">Rs{{ $order->tax }}</b> </p>
                                                    <p class="summary-info"><span class="title">Shipping</span> <b
                                                            class="index">Free Shipping</b> </p>

                                                    <p class="summary-info text-danger"><span class="title">
                                                            You Saved Using
                                                            Rewards</span>
                                                        <b class="index text-danger "> -{{ $rewards->use ?? '0' }}
                                                            <i class="fas fa-coins" aria-hidden="true"></i> </b>
                                                    </p>
                                                    @if ($rewards->coupon_discount ?? 0 > 0)
                                                        <p class="summary-info text-danger">Copoun<span
                                                                class="title text-primary">
                                                                {{ $rewards->coupon_name ?? '' }}</span>
                                                            <b class="index text-danger ">
                                                                -{{ $rewards->coupon_discount ?? '0' }}
                                                                <i class="fas fa-gift"></i> </b>
                                                        </p>
                                                    @endif
                                                    <p class="summary-info"><span class="title">Total</span>
                                                        <b class="index">Rs{{ $order->total }}</b>
                                                    </p>
                                                    <p class="summary-info text-success"><span class="title">Your
                                                            Rewards</span>
                                                        <b class="index text-success "> +{{ $rewards->gain ?? '0' }}
                                                            <i class="fas fa-coins" aria-hidden="true"></i> </b>
                                                    </p>


                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                {{-- <!-- END CONTENT --> --}}
                                <div class="row">
                                    <div class="col-sm-8"></div>
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <span class="col-4 mt-3 pt-2">
                                                {{-- @if ($order->status == 'delivered') --}}
                                                    <a class="btn-primary btn float-right"
                                                     target="_blank"   href="{{ route('user.orders.finalbill', $order->id) }}"> <i
                                                            class="fas fa-download"></i> Orignal Bil
                                                    </a>
                                                {{-- @endif --}}
                                            </span>
                                            <span class="col-5"><a class="btn-primary print" onclick="print_pdf()"
                                                    href="#"><img style="width: 154px; "
                                                        src="{{ asset('assets/pages/img/icons/pdf.png') }}"
                                                        alt="">
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </table>
                            {{-- <!-- END SIDEBAR & CONTENT --> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="padding: 30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Billing Details
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>Firstname</th>
                            <td>{{ $order->firstname }}</td>
                            <th>Lastname</th>
                            <td>{{ $order->lastname }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $order->mobile }}</td>
                            <th>Email</th>
                            <td>{{ $order->email }}</td>
                        </tr>
                        <tr>
                            <th>Line1</th>
                            <td>{{ $order->line1 }}</td>
                            <th>Line2</th>
                            <td>{{ $order->line2 }}</td>

                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{ $order->city }}</td>
                            <th>Province</th>
                            <td>{{ $order->province }}</td>
                        </tr>
                        <tr>
                            <th>Postal Code</th>
                            <td>{{ $order->zipcode }}</td>
                            <th>Country</th>
                            <td>{{ $order->country }}</td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@php
$shipping = DB::table('shippings')
    ->where('order_id', $order->id)
    ->first();
@endphp
@if ($shipping ?? '' != '')
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Shipping Details
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Firstname</th>
                                <td>{{ $shipping->firstname }}</td>
                                <th>Lastname</th>
                                <td>{{ $shipping->lastname }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $shipping->mobile }}</td>
                                <th>Email</th>
                                <td>{{ $shipping->email }}</td>
                            </tr>
                            <tr>
                                <th>Line1</th>
                                <td>{{ $shipping->line1 }}</td>
                                <th>Line2</th>
                                <td>{{ $shipping->line2 }}</td>

                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{ $shipping->city }}</td>
                                <th>Province</th>
                                <td>{{ $shipping->province }}</td>
                            </tr>
                            <tr>
                                <th>Postal Code</th>
                                <td>{{ $shipping->zipcode }}</td>
                                <th>Country</th>
                                <td>{{ $shipping->country }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="container" style="padding: 30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Transaction
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>Trasnsection Mode</th>
                            <td>{{ $order->transaction->mode ?? 'online' }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $order->transaction->status ?? 'faild' }}</td>
                        </tr>
                        <tr>
                            <th>Trasnsection Date</th>
                            <td>{{ $order->transaction->created_at ?? '' }}</td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<style>
    @media print {
        a[href]:after {
            content: none !important;
        }
    }
</style>
<script>
    function print_pdf() {
        document.getElementById('logo').style.display = "block"
        document.getElementsByClassName('header')[0].style.display = "none"
        document.getElementsByClassName('pre-header')[0].style.display = "none"
        document.getElementsByClassName('steps-block ')[0].style.display = "none"
        document.getElementsByClassName('pre-footer')[0].style.display = "none"
        document.getElementsByClassName('footer')[0].style.display = "none"
        document.getElementsByClassName('print')[0].style.display = "none"
        document.getElementsByClassName('pull-right')[1].style.display = "none"
        document.getElementById('feedback').style.display = "none"
        document.getElementById('topcontrol').style.display = "none"



        print();
        document.getElementById('logo').style.display = "none"

        window.location.reload();
    }
</script>
