<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="col-md-6">
                            All Slides
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.addslider') }}" class="btn btn-primary pull-right">Add New</a>
                        </div>
                    </div>
                    <div class="panel-heading">
                        @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session()->get('message') }}
                        </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->subtitle }}</td>
                                    <td>
                                        <img src="{{asset('assets/pages/img/sliders')}}/{{$slider->image}}" alt="" width="120">
                                    </td>
                                    <td>
                                        {{$slider->status == 1 ? 'Active' : 'Inactive'}}
                                    </td>
                                    <td>{{ $slider->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="#" wire:click.prevent="deleteSlide({{$slider->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>

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