<x-adminlayout>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h2>Rent</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"> Rent</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div>
        @include('livewire.admin.rent.insert')
        <div class="container" style="padding:30px 0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="row">
                                <div class="col-md-10">
                                    <i class="fas fa-list"> All Rent</i>

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
                                            <th>Bill</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Duration</th>
                                            <th>Ram</th>
                                            <th>Storage Type</th>
                                            <th>Storage</th>
                                            <th>Os Type</th>
                                            <th>Date</th>
                                            <th>Address/Others</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $rent)
                                            <!-- Button trigger modal -->


                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter{{ $rent->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">
                                                                Address</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            PinCode : {{ $rent->pincode }}
                                                            <hr>
                                                            City : {{ $rent->city }}
                                                            <hr>
                                                            District : {{ $rent->district }}
                                                            <hr>
                                                            State : {{ $rent->state }}
                                                            <hr>
                                                            Address : {{ $rent->address }}
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5>Others Details</h5>
                                                            <hr>
                                                
                                                          
                                                            Mouse : {{ $rent->mouse }}
                                                            <hr>
                                                            Keyboard : {{ $rent->keyboard }}
                                                            <hr>
                                                         
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>



                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset('assets/pages/img/rents') }}/{{ $rent->image }}"
                                                        width="50"></td>
                                                <td>{{ $rent->name }}</td>
                                                <td>{{ $rent->phone }}</td>
                                                <td>{{ $rent->email }}</td>
                                                <td>{{ $rent->duration }} days</td>
                                                <td>{{ $rent->ram_size }} GB</td>
                                                <td>{{ $rent->storage_type }}</td>
                                                <td>{{ $rent->storage_size }} GB</td>
                                                <td>{{ $rent->system_type }}</td>
                                                <td>{{ $rent->created_at }}</td>
                                                <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#exampleModalCenter{{ $rent->id }}">
                                                        <i class="fas fa-eye" aria-hidden="true"></i>
                                                    </button></td>


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
