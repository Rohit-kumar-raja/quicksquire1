<x-adminlayout>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h2>Reviews</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"> Reviews</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div>
        {{-- @include('livewire.admin.Reviews.insert') --}}
        <div class="container" style="padding:30px 0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10">
                                    <i class="fas fa-list"> All Reviews</i>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{route('admin.reviews','all')}}" class="btn btn-primary btn-sm">Show all Reviews </a>
                                </div>
                            </div>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
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
                                            users
                                        </th>
                                        <th>
                                            Eamil
                                        </th>
                                        <th>
                                            Phone
                                        </th>
                                     
                                        <th> Created_at </th>
                                        <th> Updated_at </th>
                                        <th> Massage </th>
                                        <th> Delete </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $review)
                                            <?php $users = DB::table('users')->find($review->user_id);
                                            
                                            ?>

                                            @include('livewire.admin.products.show_reviews')
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{ $users->name ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $users->email ?? '' }}
                                                </td>

                                                <td>
                                                    {{ $users->phone ?? '' }}
                                                </td>


                                                <td>
                                                    {{ $users->created_at ?? '' }}
                                                </td>

                                                <td>
                                                    {{ $users->updated_at ?? '' }}
                                                </td>

                                                <td>
                                                    <a class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#exampleModal"> <i class="fas fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="#" onclick="delete{{ $review->id ?? '' }}()"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                                <script>
                                                    function delete{{ $review->id ?? '' }}() {
                                                        if (confirm('Are you sure, You want to delete this SubCategory?')) {
                                                            window.location.replace("{{ route('admin.reviews.destroy', $review->id ?? '') }}")
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
