<div>

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
                        <table id="example" class=" display table table-striped table-bordered dataTable no-footer">
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
                    {{-- <div class="p-2 text-right">
                        {{ $products->links('pagination::bootstrap-4') }}
                       </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            initComplete: function() {
                var api = this.api();

                // For each column
                api
                    .columns()
                    .eq(0)
                    .each(function(colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        $(cell).html('<input type="text" placeholder="' + title + '" />');

                        // On every keypress in this input
                        $(
                                'input',
                                $('.filters th').eq($(api.column(colIdx).header()).index())
                            )
                            .off('keyup change')
                            .on('change', function(e) {
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr =
                                '({search})'; //$(this).parents('th').find('select').val();

                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != '' ?
                                        regexr.replace('{search}', '(((' + this.value +
                                            ')))') :
                                        '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();
                            })
                            .on('keyup', function(e) {
                                e.stopPropagation();

                                $(this).trigger('change');
                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
            },
        });
    });
    if ($(api.column(colIdx).header()).index() >= 0) {
     $(cell).html('<input type="text" placeholder="' + title + '"/>');
}
</script>
