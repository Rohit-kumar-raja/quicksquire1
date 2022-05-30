<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading row">
                        <div class="col-md-19">
                            All Brands
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('admin.addbrand') }}" class="btn btn-success pull-right">Add New Brand</a>
                        </div>

                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered dataTable no-footer table-hover ">
                            <thead>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Link</th>
                                    <th>Date</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('assets/pages/img/brands') }}/{{ $slider->image }}"
                                                width="50"></td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->subtitle }}</td>
                                        <td>{{ $slider->link }}</td>

                                        <td>{{ $slider->created_at }}</td>
                                        <td>{{ $slider->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href="#" wire:click.prevent="deleteSlide({{ $slider->id }})"><i
                                                    class="fa fa-times fa-2x text-denger "></i></a>
                                        </td>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
