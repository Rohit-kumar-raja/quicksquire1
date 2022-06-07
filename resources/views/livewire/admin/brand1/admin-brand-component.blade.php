<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{route('admin.brand')}}" class="btn btn-success">All Brands</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addbrand')}}" class="btn btn-primary pull-right">Add New Brand</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                        @endif
                        <table class="table table-striped table-bordered dataTable no-footer">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Brand Name
                                    </th>
                                    <th>
                                        Brand Image
                                    </th>
                                    <th>
                                        Slug
                                    </th>

                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                <tr>
                                    <td>
                                        {{ $brand->id }}
                                    </td>
                                    <td>
                                        {{ $brand->brand_name }}
                                    </td>
                                    <td>
                                        <img src="{{asset('assets/pages/img/brands')}}/{{$brand->brand_image}}" alt="" width="100">
                                    <td>
                                    <td>
                                        {{ $brand->brand_slug }}
                                    </td>
                                    <td>
                                        <a href="" wire:click.prevent="deleteBrand({{$brand->id}})"><i class="fa fa-times fa-2x text-denger"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                        </table>
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>