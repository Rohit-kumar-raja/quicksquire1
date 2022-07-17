<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Origanl Bill | Quick Secure India Pvt Ltd. </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <style>
        td,
        th,
        tr {
            padding: 0 !important;
            text-align: center;
        }
    </style>
    <div class="container mt-4">
        <div class="row">
            <div class="col-6">
                <h3>Quick Secure India Pvt Ltd. </h3>
                <div class="col-12">
                    Holding No-2, Ramdas Bhatta, Main Road<br> Adjecent to Brajdham Mandir, near Dhobhi Ghat<br>
                    Bistupur, Jamshedpur-831001, Jharkhand.<br> Phone: 000-000-0000 <br>Website:
                    www.quicksecureindia.com

                </div>
            </div>
            <div class="col-6">
                <h5 style="color: rgb(2, 168, 197);">INVOICE</h5>
                <div class="col-12">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th scope="row">DATE</th>
                                <td scope="row">{{ date('d/m/Y', strtotime($data->created_at)) }} </td>
                            </tr>
                            <tr>
                                <th scope="col">ORDER ID </th>
                                <td scope="col">ODR00000{{ $data->id }} </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h5 style="color: rgb(2, 168, 197);">Bill To</h5>
                <div class="col-12">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th scope="row">Name </th>
                                <td scope="row">{{ $data->firstname }} {{ $data->lastname }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Street Address </th>
                                <td scope="col">{{ $data->line1 }} {{ $data->line2 }} </td>
                            </tr>
                            <tr>
                                <th scope="col">City </th>
                                <td scope="col">{{ $data->city }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Province </th>
                                <td scope="col">{{ $data->province }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Phone </th>
                                <td scope="col">{{ $data->mobile }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @php
                $shipping_address = DB::table('shippings')
                    ->where('order_id', $data->id)
                    ->first();
                
            @endphp

            <div class="col-6">
                <h5 style="color: rgb(2, 168, 197);">Ship To</h5>
                <div class="col-12">
                    @if ($shipping_address != '')
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th scope="row">Name </th>
                                    <td scope="row">{{ $shipping_address->firstname }}
                                        {{ $shipping_address->lastname }}</td>
                                </tr>

                                <tr>
                                    <th scope="col">Street Address </th>
                                    <td scope="col">{{ $shipping_address->line1 }}
                                        {{ $shipping_address->line2 }} </td>
                                </tr>
                                <tr>
                                    <th scope="col">City </th>
                                    <td scope="col">{{ $shipping_address->city }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Province </th>
                                    <td scope="col">{{ $shipping_address->province }}</td>
                                </tr>

                                <tr>
                                    <th scope="col">Phone </th>
                                    <td scope="col">{{ $shipping_address->mobile }} </td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th scope="row">Name </th>
                                    <td scope="row">{{ $data->firstname }} {{ $data->lastname }}</td>
                                </tr>

                                <tr>
                                    <th scope="col">Street Address </th>
                                    <td scope="col">{{ $data->line1 }} {{ $data->line2 }} </td>
                                </tr>
                                <tr>
                                    <th scope="col">City </th>
                                    <td scope="col">{{ $data->city }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Province </th>
                                    <td scope="col">{{ $data->province }}</td>
                                </tr>

                                <tr>
                                    <th scope="col">Phone </th>
                                    <td scope="col">{{ $data->mobile }} </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr style="background-color: rgb(14, 5, 65); color:aliceblue;">
                            <th scope="row">DESCRIPTION </th>
                            <th scope="row">QUANTITY </th>
                            <th scope="row">AMOUNT </th>
                        </tr>
                        @php
                            $order_item = DB::table('order_items')
                                ->where('order_id', $data->id)
                                ->get();
                            
                        @endphp
                        @foreach ($order_item as $item)
                            @php
                                $product = DB::table('products')->find($item->product_id);
                            @endphp
                            <tr>
                                <td scope="col">{{ $product->name }} </td>
                                <td scope="col">{{ $item->quantity }} </td>
                                <td scope="col">{{ $product->sale_price }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                {{-- <p style="background-color: rgb(14, 5, 65); color: aliceblue; text-align: center;"> OTHER COMMENTS </p>
                <div class="row ">
                    <div class="col-12 ">
                        <p>Blank area to place content related to invoice</p>
                    </div>
                </div> --}}

            </div>
            <div class="col-6 ">

                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th scope="row">Sub total : </th>
                            <td scope="row">{{ $data->subtotal }}</td>
                        </tr>


                        <tr>
                            <th scope="col">Taxable : </th>
                            <td scope="row">{{ $data->subtotal }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Tax rate(%) :</th>
                            <td scope="col">include all taxes </td>
                        </tr>
                        <tr>
                            <th scope="col">TOTAL :</th>
                            <td scope="col">{{ $data->subtotal }} </td>
                        </tr>
                        <tr>
                            <th scope="col">Payble Amount :</th>
                            <td scope="col">{{ $data->total }} </td>
                        </tr>
                    </tbody>
                </table>

                <p>Make all checks payable to </p>
                <p style="font-weight: 700; ">Quick Secure India Pvt Ltd. </p>
            </div>
        </div>
        <div class="row ">
            <div class="col-12 mt-5 ">
                <p class="text-center ">If you have any questions about this invoice, please contact </p>

                <a href="# ">
                    <p class="text-center ">@quicksecureindia.com</p>
                </a>

                <p class="text-center " style="font-style: italic; font-weight:700; ">Thank You For Your Business!
                </p>
            </div>
        </div>

        <div class="pb-5 text-center" id="print">
            <button onclick="print_bill()" class="btn btn-primary btn-sm"> print </button>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js "
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2 " crossorigin="anonymous ">
    </script>
</body>

</html>

<script>
    print();
    function print_bill() {
        document.getElementById('print').style.display = "none";
        print();
        window.location.reload();
    }
</script>
