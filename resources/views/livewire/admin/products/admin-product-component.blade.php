<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

        div.dataTables_wrapper div.dataTables_paginate {
            margin: 0;
            white-space: nowrap;
            text-align: right;
            display: none;
        }

    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row p-2">
                            <div class="col-md-10">
                                <i class="fas fa-list"></i>
                                All Products
                            </div>
                      <div class="col-md-2">
                                <a href="{{ route('admin.addproduct') }}" class="btn btn-primary btn-sm">Add New</a>
                            </div> 
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session()->has('message'))
                            <div class="alert alert-success">
                                {{ Session()->get('message') }}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered dataTable no-footer">
                            <thead class=" text-primary">
                                <tr>
                                    <th>S.no</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('assets/pages/img/products') }}/{{ $product->image }}"
                                                width="60" /></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->stock_status }}</td>
                                        <td>{{ $product->regular_price }}</td>
                                        <td>{{ $product->sale_price }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.editproduct', ['product_slug' => $product->slug]) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#"
                                                onclick="confirm('Are you sure, You want to delete this product?') || event.stopImmediatePropagation()"
                                                class="btn btn-danger btn-sm"
                                                wire:click.prevent="deleteProduct({{ $product->id }})">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                      
                    </div>
                    <div class="p-2 text-right">
                        {{ $products->links('pagination::bootstrap-4') }}
                       </div>
                </div>
            </div>
        </div>
    </div>
</div>

