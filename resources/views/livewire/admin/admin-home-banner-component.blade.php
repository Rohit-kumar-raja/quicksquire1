<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Banners
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addbanner')}}" class="btn btn-success pull-right">Add New Banner</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($banners as $banner)
                                <tr>
                                    <td>{{$banner->id}}</td>
                                    <td>{{$banner->title}}</td>
                                    <td><img src="{{asset('assets/pages/img/banners')}}/{{$banner->image}}" alt="" width="200"></td>
                                    <td>
                                        @if($banner->status == 1)
                                        <span class="label label-success">Active</span>
                                        @else
                                        <span class="label label-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- delte banner -->
                                        <a href="#" wire:click.prevent="deleteBanner({{$banner->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>