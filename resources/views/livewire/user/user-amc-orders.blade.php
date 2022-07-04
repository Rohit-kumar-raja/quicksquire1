
<x-layout>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-heading">
                <div class="panel-heading">
                    <h2>All amc's <i class="fas fa-history"></i></h2>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered " id="example">
                        <thead class=" text-primary" >
                            <tr>
                                <th>Order Id</th>
                                <th>package name</th>
                                <th>basic price</th>
                                <th>total amount</th>
                                <th>qty</th>
                                <th>sale date</th>
                                <th>item type</th>
                                <th>purchase year</th>
                                <th>item category</th>
                                <th>brand_name</th>
                                <th>no year</th>
                                <th>pin code</th>
                                <th>city</th>
                                <th>state</th>
                                <th>payment remarks</th>
                                <th>payment option</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $amc)
                                <tr>
                                    <td>AMCORD00000{{ $amc->id }}</td>
                                    <td>{{ $amc->package_name }}</td>
                                    <td>{{ $amc->basic_price }}</td>
                                    <td>{{ $amc->tot_amt }}</td>
                                    <td>{{ $amc->qty }}</td>
                                    <td>{{ $amc->sale_dt }}</td>
                                    <td>{{ $amc->item_type }}</td>
                                    <td>{{ $amc->purchase_year }}</td>
                                    <td>{{ $amc->item_category }}</td>
                                    <td>{{ $amc->brand_name }}</td>
                                    <td>{{ $amc->no_year }}</td>
                                    <td>{{ $amc->pin_code }}</td>
                                    <td>{{ $amc->city1 }}</td>
                                    <td>{{ $amc->state1 }}</td>
                                    <td>{{ $amc->payment_remarks }}</td>
                                    <td>{{ $amc->payment_option }}</td>


                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<style>
    th{
        text-transform: capitalize;
    }
</style>