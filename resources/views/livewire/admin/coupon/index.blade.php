<x-adminlayout>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h2>Wallet</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"> Wallet</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div>
        @include('livewire.admin.wallet.insert')
        <div class="container" style="padding:30px 0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="row">
                                <div class="col-md-10">
                                    <i class="fas fa-list"> All Wallet</i>

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
                                            Category
                                        </th>
                                        <th>
                                            Cart Value
                                        </th>
                                        <th>
                                            Coin Gain By %
                                        </th>

                                        <th>
                                            Coin Redeem By %
                                        </th>

                                        <th>Flat Coin Gain</th>
                                        <th>Flat Coin Redeem</th>

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
                                        @foreach ($wallets as $wallet)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>

                                                <td>

                                                    {{ DB::table('categories')->find($wallet->category_id)->name ?? '' }}

                                                </td>

                                                <td>
                                                    {{ $wallet->min }} - {{ $wallet->max }}
                                                </td>

                                                <td>
                                                    {{ $wallet->gain_by_per }}
                                                </td>


                                                <td>
                                                    {{ $wallet->redeem_by_per }}
                                                </td>

                                                <td>
                                                    {{ $wallet->flat_gain }}
                                                </td>


                                                <td>
                                                    {{ $wallet->flat_use }}
                                                </td>
                                     
                                                <td><a href="{{ route('admin.wallet.status', $wallet->id) }}"
                                                        class="btn @if ($wallet->status == 1) btn-success btn-sm @endif btn-secondary  btn-sm">
                                                        @if ($wallet->status == 1)
                                                            Active
                                                        @else
                                                            Deactive
                                                        @endif
                                                    </a>
                                                </td>

                                                <td>
                                                    <a href="{{ route('admin.wallet.edit', $wallet->id) }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="#" onclick="delete{{ $wallet->id }}()"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                                <script>
                                                    function delete{{ $wallet->id }}() {
                                                        if (confirm('Are you sure, You want to delete this SubCategory?')) {
                                                            window.location.replace("{{ route('admin.wallet.destroy', $wallet->id) }}")
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
