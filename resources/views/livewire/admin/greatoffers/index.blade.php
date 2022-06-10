<x-adminlayout>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h2>GreatOffer</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"> GreatOffer</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div>
        @include('livewire.admin.greatoffers.insert')
        <div class="container" style="padding:30px 0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="row">
                                <div class="col-md-10">
                                    <i class="fas fa-list"> All greatoffers</i>

                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#exampleModal">Add New
                                    </a>

                                </div>
                            </div>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                @if (session('store'))
                                    <div class="alert alert-success">
                                        {{ session('store') }}
                                    </div>
                                @endif
                                @if (session('delete'))
                                    <div class="alert alert-danger">
                                        {{ session('delete') }}
                                    </div>
                                @endif
                                @if (session('update'))
                                    <div class="alert alert-success">
                                        {{ session('update') }}
                                    </div>
                                @endif
                                @if (session('status'))
                                    <div class="alert alert-secondary">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @if (session('status1'))
                                    <div class="alert alert-success">
                                        {{ session('status1') }}
                                    </div>
                                @endif
                                <table class="table table-striped table-bordered">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Link</th>
                                            <th>Date</th>
                                            <th>status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $greatoffers)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset('assets/pages/img/sliders') }}/{{ $greatoffers->image }}"
                                                        width="150"></td>
                                                <td>{{ $greatoffers->title }}</td>
                                                <td>{{ $greatoffers->link }}</td>
                                                <td>{{ $greatoffers->created_at }}</td>
                                                <td><a href="{{ route('admin.greatoffers.status', $greatoffers->id) }}"
                                                        class="btn @if ($greatoffers->status == 1) btn-success btn-sm @endif btn-secondary  btn-sm">
                                                        @if ($greatoffers->status == 1)
                                                            Active
                                                        @else
                                                            Deactive
                                                        @endif
                                                    </a>
                                                </td>

                                                <td>
                                                    <a href="{{ route('admin.greatoffers.edit', $greatoffers->id) }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="#" onclick="delete{{ $greatoffers->id }}()"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                                <script>
                                                    function delete{{ $greatoffers->id }}() {
                                                        if (confirm('Are you sure, You want to delete this SubCategory?')) {
                                                            window.location.replace("{{ route('admin.greatoffers.destroy', $greatoffers->id) }}")
                                                        }
                                                    }
                                                </script>
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
    </div>


</x-adminlayout>
