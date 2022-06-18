<x-adminlayout>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h2>pincode</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"> pincode</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div>
        @include('livewire.admin.pincode.insert')
        <div class="container" style="padding:30px 0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="row">
                                <div class="col-md-5">
                                    <i class="fas fa-list"> All pincode</i>

                                </div>
                                <div class="col-5">
                                    <form action="{{ route('admin.pincode.import') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-8"> <input type="file"
                                                    class="form-control form-control-sm " name="file" id="">
                                            </div>
                                            <div class="col-4"> <button type="submit"
                                                    class="btn btn-success btn-sm">submit</button> </div>
                                        </div>
                                    </form>
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
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}
                                    </div>
                                @endif

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
                                        <th>
                                            S.No
                                        </th>
                                        <th>
                                            Pincode
                                        </th>
                                        <th>
                                            City
                                        </th>
                                        <th>
                                            District
                                        </th>

                                        <th>
                                            State
                                        </th>
                                        <th>Country</th>

                                        <th>
                                            status </th>
                                        <th>
                                            Action 1
                                        </th>
                                        <th>
                                            Action 2
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $pincode)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>

                                                <td>

                                                    {{ $pincode->pincode }}

                                                </td>

                                                <td>
                                                    {{ $pincode->city }}
                                                </td>

                                                <td>
                                                    {{ $pincode->district }}
                                                </td>


                                                <td>
                                                    {{ $pincode->state }}
                                                </td>

                                                <td>
                                                    {{ $pincode->country }}
                                                </td>




                                                <td><a href="{{ route('admin.pincode.status', $pincode->id) }}"
                                                        class="btn @if ($pincode->status == 1) btn-success btn-sm @endif btn-secondary  btn-sm">
                                                        @if ($pincode->status == 1)
                                                            Active
                                                        @else
                                                            Deactive
                                                        @endif
                                                    </a>
                                                </td>

                                                <td>
                                                    <a href="{{ route('admin.pincode.edit', $pincode->id) }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="#" onclick="delete{{ $pincode->id }}()"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                                <script>
                                                    function delete{{ $pincode->id }}() {
                                                        if (confirm('Are you sure, You want to delete this SubCategory?')) {
                                                            window.location.replace("{{ route('admin.pincode.destroy', $pincode->id) }}")
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
